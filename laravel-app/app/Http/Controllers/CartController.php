<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(): View
    {
        $categories = Category::query()->orderBy('category_name')->get();
        $cart = $this->cartService->currentCart(false);
        $items = $cart?->items ?? collect();
        $subtotal = $items->sum(fn ($item) => (float) $item->product->price * $item->quantity);

        return view('store.cart.index', compact('categories', 'cart', 'items', 'subtotal'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,product_id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $this->cartService->add((int) $validated['product_id'], (int) $validated['quantity']);

        if ($request->boolean('buy_now')) {
            return to_route('checkout.show');
        }

        return to_route('cart.index')->with('cart_success', 'Đã thêm sản phẩm vào giỏ hàng.');
    }

    public function update(Request $request, int $cartItem): RedirectResponse
    {
        $validated = $request->validate(['quantity' => ['required', 'integer', 'min:1', 'max:99']]);
        $this->cartService->updateQuantity($cartItem, (int) $validated['quantity']);

        return to_route('cart.index')->with('cart_success', 'Đã cập nhật số lượng.');
    }

    public function destroy(int $cartItem): RedirectResponse
    {
        $this->cartService->remove($cartItem);

        return to_route('cart.index')->with('cart_success', 'Đã xóa sản phẩm khỏi giỏ.');
    }
}