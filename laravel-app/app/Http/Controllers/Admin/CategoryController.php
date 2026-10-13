<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()->withCount('products')->orderBy('category_name')->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.categories.create', ['category' => new Category()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateCategory($request);
        $validated['slug'] = $this->uniqueSlug($validated['slug'] ?? $validated['category_name']);
        Category::query()->create($validated);

        return to_route('admin.categories.index')->with('admin_success', 'Đã thêm danh mục.');
    }

    public function edit(int $category): View
    {
        return view('admin.categories.edit', ['category' => Category::query()->findOrFail($category)]);
    }

    public function update(Request $request, int $category): RedirectResponse
    {
        $category = Category::query()->findOrFail($category);
        $validated = $this->validateCategory($request, $category);
        $validated['slug'] = $this->uniqueSlug($validated['slug'] ?? $validated['category_name'], $category->category_id);
        $category->update($validated);

        return to_route('admin.categories.index')->with('admin_success', 'Đã cập nhật danh mục.');
    }

    public function destroy(int $category): RedirectResponse
    {
        $category = Category::query()->findOrFail($category);

        try {
            $category->delete();
        } catch (QueryException) {
            return back()->withErrors(['delete' => 'Danh mục đang chứa sản phẩm nên không thể xóa. Hãy chuyển sản phẩm sang danh mục khác trước.']);
        }

        return to_route('admin.categories.index')->with('admin_success', 'Đã xóa danh mục.');
    }

    private function validateCategory(Request $request, ?Category $category = null): array
    {
        return $request->validate([
            'category_name' => ['required', 'string', 'max:100', Rule::unique('categories', 'category_name')->ignore($category?->category_id, 'category_id')],
            'slug' => ['nullable', 'string', 'max:120', Rule::unique('categories', 'slug')->ignore($category?->category_id, 'category_id')],
            'description' => ['nullable', 'string', 'max:5000'],
            'image_url' => ['nullable', 'string', 'max:500'],
        ]);
    }

    private function uniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'category';
        $slug = $base;
        $suffix = 2;

        while (Category::query()->where('slug', $slug)->when($ignoreId, fn ($query) => $query->where('category_id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $suffix++;
        }

        return $slug;
    }
}