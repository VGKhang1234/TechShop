<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category): View
    {
        $filters = $request->validate([
            'brand' => ['nullable', 'string', 'max:120'],
            'q' => ['nullable', 'string', 'max:120'],
            'min_price' => ['nullable', 'numeric', 'min:0'],
            'max_price' => ['nullable', 'numeric', 'min:0'],
            'sort' => ['nullable', 'in:popular,rating,price-asc,price-desc,newest'],
        ]);

        $products = Product::active()->with(['category', 'brand', 'images']);

        if ($category->slug !== 'popular') {
            $products->where('category_id', $category->category_id);
        }

        if (!empty($filters['brand'])) {
            $products->whereHas('brand', fn ($query) => $query->where('slug', $filters['brand']));
        }

        if (!empty($filters['q'])) {
            $term = '%' . trim($filters['q']) . '%';
            $products->where(function ($query) use ($term) {
                $query->where('product_name', 'like', $term)
                    ->orWhere('description', 'like', $term)
                    ->orWhere('sku', 'like', $term)
                    ->orWhereHas('brand', fn ($brandQuery) => $brandQuery->where('brand_name', 'like', $term));
            });
        }

        if (isset($filters['min_price'])) {
            $products->where('price', '>=', $filters['min_price']);
        }

        if (isset($filters['max_price'])) {
            $products->where('price', '<=', $filters['max_price']);
        }

        match ($filters['sort'] ?? 'popular') {
            'rating' => $products->orderByDesc('rating'),
            'price-asc' => $products->orderBy('price'),
            'price-desc' => $products->orderByDesc('price'),
            'newest' => $products->orderByDesc('created_at'),
            default => $products->orderByDesc('sold_count'),
        };

        $products = $products->paginate(12)->withQueryString();
        $categories = Category::query()->orderBy('category_name')->get();
        $brands = Brand::query()->whereHas('products', function ($query) use ($category) {
            $query->where('status', 'active');
            if ($category->slug !== 'popular') {
                $query->where('category_id', $category->category_id);
            }
        })->orderBy('brand_name')->get();

        return view('store.categories.show', compact('category', 'categories', 'brands', 'products', 'filters'));
    }
}