<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function home(): View
    {
        $categories = Category::query()->orderBy('category_name')->get();
        $featuredProducts = Product::active()
            ->with(['category', 'brand', 'images'])
            ->orderByDesc('sold_count')
            ->limit(4)
            ->get();
        $newProducts = Product::active()
            ->with(['category', 'brand', 'images'])
            ->whereNotIn('product_id', $featuredProducts->modelKeys())
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('store.home', compact('categories', 'featuredProducts', 'newProducts'));
    }

    public function show(Product $product): View
    {
        abort_unless($product->status === 'active', 404);

        $categories = Category::query()->orderBy('category_name')->get();
        $product->load(['category', 'brand', 'images']);
        $relatedProducts = Product::active()
            ->with(['category', 'brand', 'images'])
            ->where('category_id', $product->category_id)
            ->whereKeyNot($product->getKey())
            ->orderByDesc('sold_count')
            ->limit(4)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::active()
                ->with(['category', 'brand', 'images'])
                ->whereKeyNot($product->getKey())
                ->orderByDesc('sold_count')
                ->limit(4)
                ->get();
        }

        return view('store.products.show', compact('categories', 'product', 'relatedProducts'));
    }

    public function legacyDetail(Request $request): RedirectResponse
    {
        $product = $request->filled('id')
            ? Product::active()->findOrFail($request->integer('id'))
            : Product::active()->orderByDesc('sold_count')->firstOrFail();

        return redirect()->route('products.show', $product->slug, 301);
    }
}