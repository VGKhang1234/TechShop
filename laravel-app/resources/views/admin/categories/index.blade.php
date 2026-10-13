@extends('admin.layouts.app')

@section('title', 'Quản lý danh mục | E-Tech')
@section('page-title', 'Danh mục')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">CATALOG</p><h1>Danh mục</h1><p class="heading-note">Phân loại sản phẩm trong cửa hàng.</p></div><a class="btn primary" href="{{ route('admin.categories.create') }}">＋ Thêm danh mục</a></div>
    <div class="category-grid admin-category-grid">
        @forelse ($categories as $category)
            <article class="category-card"><span class="category-symbol">◈</span><div class="admin-category-info"><h3>{{ $category->category_name }}</h3><p>{{ number_format($category->products_count) }} sản phẩm</p><small>{{ $category->slug }}</small></div><div class="row-actions"><a class="row-action" title="Sửa" href="{{ route('admin.categories.edit', $category->category_id) }}">✎</a><form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="post" data-confirm-delete="Xóa danh mục {{ $category->category_name }}?">@csrf @method('DELETE')<button class="row-action danger" title="Xóa" type="submit">×</button></form></div></article>
        @empty<div class="admin-empty-cell">Chưa có danh mục.</div>@endforelse
    </div>
    <div class="admin-pagination">{{ $categories->links() }}</div>
</section>
@endsection