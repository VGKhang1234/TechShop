<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Voucher;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function show(): View|RedirectResponse
    {
        $categories = Category::query()->orderBy('category_name')->get();
        $cart = $this->cartService->currentCart(false);
        $items = $cart?->items ?? collect();

        if ($items->isEmpty()) {
            return to_route('cart.index')->withErrors(['cart' => 'Giỏ hàng đang trống.']);
        }

        $subtotal = $items->sum(fn ($item) => (float) $item->product->price * $item->quantity);
        $user = Auth::user();

        return view('store.checkout.show', compact('categories', 'items', 'subtotal', 'user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'receiver_name' => ['required', 'string', 'max:120'],
            'receiver_phone' => ['required', 'string', 'max:20'],
            'receiver_email' => ['nullable', 'email', 'max:190'],
            'shipping_address' => ['required', 'string', 'max:500'],
            'payment_method' => ['required', 'in:bank_transfer,cod'],
            'voucher_code' => ['nullable', 'string', 'max:50'],
            'note' => ['nullable', 'string', 'max:500'],
        ]);

        $order = DB::transaction(function () use ($validated): Order {
            $currentCart = $this->cartService->currentCart(false);
            if (! $currentCart) {
                throw ValidationException::withMessages(['cart' => 'Giỏ hàng đang trống.']);
            }

            $cart = Cart::query()->whereKey($currentCart->cart_id)->where('status', 'active')
                ->lockForUpdate()->first();
            $cartItems = $cart?->items()->lockForUpdate()->get() ?? collect();

            if ($cartItems->isEmpty()) {
                throw ValidationException::withMessages(['cart' => 'Giỏ hàng đang trống.']);
            }

            $products = [];
            $subtotal = 0.0;
            foreach ($cartItems as $cartItem) {
                $product = Product::query()->lockForUpdate()->find($cartItem->product_id);
                if (! $product || $product->status !== 'active' || $product->stock_quantity < $cartItem->quantity) {
                    throw ValidationException::withMessages([
                        'cart' => 'Sản phẩm ' . ($product?->product_name ?? '') . ' không đủ tồn kho. Vui lòng cập nhật giỏ hàng.',
                    ]);
                }

                $products[$cartItem->cart_item_id] = $product;
                $subtotal += (float) $product->price * $cartItem->quantity;
            }

            $subtotal = round($subtotal, 2);
            $voucher = $this->findVoucher($validated['voucher_code'] ?? null, $subtotal);
            $discount = $this->discountFor($voucher, $subtotal);
            $shipping = $subtotal >= 1000000 ? 0 : 30000;
            $total = max(0, round($subtotal - $discount + $shipping, 2));

            $order = Order::query()->create([
                'order_code' => 'ET' . now()->format('ymdHis') . strtoupper(Str::random(5)),
                'user_id' => Auth::id(),
                'voucher_id' => $voucher?->voucher_id,
                'subtotal' => $subtotal,
                'discount_amount' => $discount,
                'shipping_fee' => $shipping,
                'total_amount' => $total,
                'receiver_name' => $validated['receiver_name'],
                'receiver_phone' => $validated['receiver_phone'],
                'receiver_email' => $validated['receiver_email'] ?? null,
                'shipping_address' => $validated['shipping_address'],
                'payment_method' => $validated['payment_method'],
                'order_status' => 'pending',
                'note' => $validated['note'] ?? null,
                'ordered_at' => now(),
            ]);

            foreach ($cartItems as $cartItem) {
                $product = $products[$cartItem->cart_item_id];
                $unitPrice = (float) $product->price;
                OrderItem::query()->create([
                    'order_id' => $order->order_id,
                    'product_id' => $product->product_id,
                    'product_name' => $product->product_name,
                    'quantity' => $cartItem->quantity,
                    'unit_price' => $unitPrice,
                    'line_total' => round($unitPrice * $cartItem->quantity, 2),
                ]);

                $remaining = $product->stock_quantity - $cartItem->quantity;
                $product->stock_quantity = $remaining;
                if ($remaining === 0) {
                    $product->status = 'out_of_stock';
                }
                $product->save();
            }

            Payment::query()->create([
                'order_id' => $order->order_id,
                'method' => $validated['payment_method'],
                'amount' => $total,
                'payment_status' => 'pending',
            ]);

            if ($voucher) {
                $voucher->increment('used_count');
            }

            $cart->update(['status' => 'converted']);

            return $order;
        });

        $request->session()->put('checkout_order_id', $order->order_id);

        return to_route('checkout.success');
    }

    public function success(Request $request): View|RedirectResponse
    {
        $categories = Category::query()->orderBy('category_name')->get();
        $orderId = $request->session()->get('checkout_order_id');
        $order = $orderId ? Order::query()->with('items')->find($orderId) : null;

        if (! $order || ($order->user_id && $order->user_id !== Auth::id())) {
            return to_route('home');
        }

        return view('store.checkout.success', compact('categories', 'order'));
    }

    private function findVoucher(?string $code, float $subtotal): ?Voucher
    {
        if (! $code) {
            return null;
        }

        $voucher = Voucher::query()->where('code', strtoupper(trim($code)))->lockForUpdate()->first();
        if (! $voucher || $voucher->status !== 'active' || $voucher->start_at->isFuture() || $voucher->end_at->isPast()) {
            throw ValidationException::withMessages(['voucher_code' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn.']);
        }

        if ($subtotal < (float) $voucher->min_order_value || ($voucher->usage_limit !== null && $voucher->used_count >= $voucher->usage_limit)) {
            throw ValidationException::withMessages(['voucher_code' => 'Đơn hàng chưa đủ điều kiện áp dụng mã này.']);
        }

        return $voucher;
    }

    private function discountFor(?Voucher $voucher, float $subtotal): float
    {
        if (! $voucher) {
            return 0;
        }

        $discount = $voucher->discount_type === 'percentage'
            ? $subtotal * (float) $voucher->discount_value / 100
            : (float) $voucher->discount_value;

        if ($voucher->max_discount_amount !== null) {
            $discount = min($discount, (float) $voucher->max_discount_amount);
        }

        return round(min($subtotal, $discount), 2);
    }
}