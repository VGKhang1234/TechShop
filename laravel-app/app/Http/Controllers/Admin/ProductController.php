<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:120'],
            'category_id' => ['nullable', 'integer', 'exists:categories,category_id'],
            'status' => ['nullable', Rule::in(['active', 'inactive', 'out_of_stock'])],
        ]);

        $products = Product::query()->with(['category', 'brand', 'images'])->latest('product_id');

        if (! empty($filters['q'])) {
            $term = '%' . trim($filters['q']) . '%';
            $products->where(fn ($query) => $query->where('product_name', 'like', $term)->orWhere('sku', 'like', $term));
        }
        if (! empty($filters['category_id'])) {
            $products->where('category_id', $filters['category_id']);
        }
        if (! empty($filters['status'])) {
            $products->where('status', $filters['status']);
        }

        $products = $products->paginate(15)->withQueryString();
        $categories = Category::query()->orderBy('category_name')->get();

        return view('admin.products.index', compact('products', 'categories', 'filters'));
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'categories' => Category::query()->orderBy('category_name')->get(),
            'brands' => Brand::query()->orderBy('brand_name')->get(),
            'product' => new Product(['status' => 'active', 'stock_quantity' => 0]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);
        $imageUrl = $validated['image_url'] ?? null;
        unset($validated['image_url']);
        $validated['slug'] = $this->uniqueSlug($validated['slug'] ?? $validated['product_name']);
        $validated['status'] = $this->normalizeStatus($validated['status'], (int) $validated['stock_quantity']);

        $product = Product::query()->create($validated);
        $this->syncPrimaryImage($product, $imageUrl);

        return to_route('admin.products.index')->with('admin_success', 'Đã thêm sản phẩm.');
    }

    public function edit(int $product): View
    {
        return view('admin.products.edit', [
            'product' => Product::query()->with('images')->findOrFail($product),
            'categories' => Category::query()->orderBy('category_name')->get(),
            'brands' => Brand::query()->orderBy('brand_name')->get(),
        ]);
    }

    public function update(Request $request, int $product): RedirectResponse
    {
        $product = Product::query()->findOrFail($product);
        $validated = $this->validateProduct($request, $product);
        $imageUrl = $validated['image_url'] ?? null;
        unset($validated['image_url']);
        $validated['slug'] = $this->uniqueSlug($validated['slug'] ?? $validated['product_name'], $product->product_id);
        $validated['status'] = $this->normalizeStatus($validated['status'], (int) $validated['stock_quantity']);

        $product->update($validated);
        $this->syncPrimaryImage($product, $imageUrl);

        return to_route('admin.products.index')->with('admin_success', 'Đã cập nhật sản phẩm.');
    }

    public function destroy(int $product): RedirectResponse
    {
        $product = Product::query()->findOrFail($product);

        try {
            $product->delete();
        } catch (QueryException) {
            return back()->withErrors(['delete' => 'Không thể xóa sản phẩm đang nằm trong giỏ hàng. Hãy chuyển sản phẩm sang trạng thái ngừng bán.']);
        }

        return to_route('admin.products.index')->with('admin_success', 'Đã xóa sản phẩm.');
    }

    private function validateProduct(Request $request, ?Product $product = null): array
    {
        return $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:280', Rule::unique('products', 'slug')->ignore($product?->product_id, 'product_id')],
            'sku' => ['required', 'string', 'max:80', Rule::unique('products', 'sku')->ignore($product?->product_id, 'product_id')],
            'category_id' => ['required', 'integer', 'exists:categories,category_id'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,brand_id'],
            'description' => ['nullable', 'string', 'max:10000'],
            'price' => ['required', 'numeric', 'min:0'],
            'old_price' => ['nullable', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'status' => ['required', Rule::in(['active', 'inactive', 'out_of_stock'])],
            'image_url' => ['nullable', 'string', 'max:500'],
        ]);
    }

    private function uniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'product';
        $slug = $base;
        $suffix = 2;

        while (Product::query()->where('slug', $slug)->when($ignoreId, fn ($query) => $query->where('product_id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $suffix++;
        }

        return $slug;
    }

    private function normalizeStatus(string $status, int $stock): string
    {
        return $status === 'active' && $stock === 0 ? 'out_of_stock' : $status;
    }

    private function syncPrimaryImage(Product $product, ?string $imageUrl): void
    {
        if (! $imageUrl) {
            return;
        }

        ProductImage::query()->updateOrCreate(
            ['product_id' => $product->product_id, 'is_primary' => true],
            ['image_url' => $imageUrl, 'alt_text' => $product->product_name, 'sort_order' => 0],
        );
    }
}