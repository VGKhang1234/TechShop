<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CartService
{
    public function currentCart(bool $create = true): ?Cart
    {
        if (Auth::check()) {
            $cart = Cart::query()->where('status', 'active')->where('user_id', Auth::id())
                ->with('items.product.category', 'items.product.images')->first();
        } else {
            $session = request()->session();
            $cartId = $session->get('cart_id');
            $cart = $cartId
                ? Cart::query()->whereKey($cartId)->whereNull('user_id')->where('status', 'active')->first()
                : null;

            if (! $cart) {
                $cart = Cart::query()->where('status', 'active')->where('session_id', $session->getId())->first();
            }

            if ($cart && $cart->session_id !== $session->getId()) {
                Cart::query()->whereKey($cart->cart_id)->update(['session_id' => $session->getId()]);
            }

            if ($cart) {
                $session->put('cart_id', $cart->cart_id);
                $cart->load('items.product.category', 'items.product.images');
            }
        }

        if ($cart || ! $create) {
            return $cart;
        }

        $cart = Cart::query()->create([
            'user_id' => Auth::id(),
            'session_id' => Auth::check() ? null : request()->session()->getId(),
            'status' => 'active',
        ]);

        if (! Auth::check()) {
            request()->session()->put('cart_id', $cart->cart_id);
        }

        return $cart;
    }

    public function itemCount(): int
    {
        return (int) ($this->currentCart(false)?->items->sum('quantity') ?? 0);
    }

    public function add(int $productId, int $quantity): void
    {
        DB::transaction(function () use ($productId, $quantity): void {
            $product = Product::query()->where('status', 'active')->lockForUpdate()->find($productId);
            if (! $product || $product->stock_quantity < 1) {
                throw ValidationException::withMessages(['product' => 'Sản phẩm hiện không còn hàng.']);
            }

            $cart = $this->currentCart();
            $item = $cart->items()->where('product_id', $product->product_id)->lockForUpdate()->first();
            $newQuantity = ($item?->quantity ?? 0) + $quantity;

            if ($newQuantity > $product->stock_quantity) {
                throw ValidationException::withMessages(['quantity' => 'Số lượng vượt quá tồn kho hiện tại.']);
            }

            if ($item) {
                CartItem::query()->whereKey($item->cart_item_id)->update([
                    'quantity' => $newQuantity,
                    'unit_price' => $product->price,
                ]);
            } else {
                CartItem::query()->create([
                    'cart_id' => $cart->cart_id,
                    'product_id' => $product->product_id,
                    'quantity' => $quantity,
                    'unit_price' => $product->price,
                ]);
            }
        });
    }

    public function updateQuantity(int $cartItemId, int $quantity): void
    {
        $cart = $this->currentCart(false);
        $item = $cart?->items()->whereKey($cartItemId)->with('product')->first();

        abort_unless($item, 404);

        if (! $item->product || $item->product->status !== 'active' || $quantity > $item->product->stock_quantity) {
            throw ValidationException::withMessages(['quantity' => 'Số lượng vượt quá tồn kho hiện tại.']);
        }

        CartItem::query()->whereKey($item->cart_item_id)->update([
            'quantity' => $quantity,
            'unit_price' => $item->product->price,
        ]);
    }

    public function remove(int $cartItemId): void
    {
        $cart = $this->currentCart(false);
        $item = $cart?->items()->whereKey($cartItemId)->first();

        abort_unless($item, 404);
        CartItem::query()->whereKey($item->cart_item_id)->delete();
    }

    public function mergeGuestCartIntoUser(User $user, string $sessionId): void
    {
        DB::transaction(function () use ($user, $sessionId): void {
            $sessionCartId = request()->session()->get('cart_id');
            $guestCart = Cart::query()->where('status', 'active')->whereNull('user_id')
                ->where(function ($query) use ($sessionId, $sessionCartId) {
                    $query->where('session_id', $sessionId);
                    if ($sessionCartId) {
                        $query->orWhere('cart_id', $sessionCartId);
                    }
                })
                ->with('items.product')->lockForUpdate()->first();

            if (! $guestCart) {
                return;
            }

            $userCart = Cart::query()->where('status', 'active')->where('user_id', $user->user_id)
                ->with('items')->lockForUpdate()->first();

            if (! $userCart) {
                Cart::query()->whereKey($guestCart->cart_id)->update(['user_id' => $user->user_id, 'session_id' => null]);
                return;
            }

            foreach ($guestCart->items as $guestItem) {
                $product = $guestItem->product;
                if (! $product || $product->status !== 'active') {
                    continue;
                }

                $userItem = $userCart->items->firstWhere('product_id', $guestItem->product_id);
                $quantity = min($product->stock_quantity, ($userItem?->quantity ?? 0) + $guestItem->quantity);

                if ($quantity < 1) {
                    continue;
                }

                if ($userItem) {
                    CartItem::query()->whereKey($userItem->cart_item_id)->update([
                        'quantity' => $quantity,
                        'unit_price' => $product->price,
                    ]);
                } else {
                    CartItem::query()->create([
                        'cart_id' => $userCart->cart_id,
                        'product_id' => $product->product_id,
                        'quantity' => $quantity,
                        'unit_price' => $product->price,
                    ]);
                }
            }

            Cart::query()->whereKey($guestCart->cart_id)->delete();
        });
    }
}