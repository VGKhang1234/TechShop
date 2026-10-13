@extends('layouts.store')

@section('title', $category->category_name . ' | E-Tech')

@section('content')
<main class="container store-category-page">
    <nav class="catalog-breadcrumb" aria-label="Đường dẫn"><a href="{{ route('home') }}">Trang chủ</a><span class="crumb-sep">/</span><span class="crumb-current">{{ $category->category_name }}</span></nav>
    <section class="category-hero">
        <div class="category-hero-info"><span class="category-hero-badge">E-Tech · Hàng chính hãng</span><h1 class="category-hero-title">{{ $category->category_name }}</h1><p class="category-hero-desc">{{ $category->description ?: 'Khám phá sản phẩm công nghệ được tuyển chọn tại E-Tech.' }}</p></div>
        <div class="category-hero-icon" aria-hidden="true">⌕</div>
    </section>

    <div class="catalog-toolbar">
        <div class="catalog-results-count">{{ $products->total() }} sản phẩm</div>
        <form class="store-filter-form" method="get" action="{{ route('categories.show', ['category' => $category->slug]) }}">
            <select class="catalog-sort-select" name="sort" aria-label="Sắp xếp sản phẩm" onchange="this.form.submit()">
                <option value="popular" @selected(($filters['sort'] ?? 'popular') === 'popular')>Phổ biến nhất</option>
                <option value="rating" @selected(($filters['sort'] ?? '') === 'rating')>Đánh giá cao</option>
                <option value="price-asc" @selected(($filters['sort'] ?? '') === 'price-asc')>Giá thấp đến cao</option>
                <option value="price-desc" @selected(($filters['sort'] ?? '') === 'price-desc')>Giá cao đến thấp</option>
                <option value="newest" @selected(($filters['sort'] ?? '') === 'newest')>Mới nhất</option>
            </select>
            <select class="catalog-sort-select" name="brand" aria-label="Lọc theo thương hiệu" onchange="this.form.submit()">
                <option value="">Tất cả thương hiệu</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->slug }}" @selected(($filters['brand'] ?? '') === $brand->slug)>{{ $brand->brand_name }}</option>
                @endforeach
            </select>
            <label class="store-price-filter"><span class="visually-hidden">Giá từ</span><input type="number" name="min_price" min="0" value="{{ $filters['min_price'] ?? '' }}" placeholder="Giá từ"></label>
            <label class="store-price-filter"><span class="visually-hidden">Giá đến</span><input type="number" name="max_price" min="0" value="{{ $filters['max_price'] ?? '' }}" placeholder="Giá đến"></label>
            <button class="store-filter-submit" type="submit">Lọc</button>
            <a class="store-filter-reset" href="{{ route('categories.show', ['category' => $category->slug]) }}">Xóa lọc</a>
        </form>
    </div>

    @if ($products->isNotEmpty())
        <div class="products-catalog-grid store-product-grid" id="catalogProductsGrid">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
        <div class="store-pagination">{{ $products->links() }}</div>
    @else
        <section class="store-empty"><h2>Danh mục này chưa có sản phẩm</h2><p>Thử danh mục khác hoặc quay lại sau.</p><a href="{{ route('home') }}" class="btn-primary"><span>Về trang chủ</span><span aria-hidden="true">→</span></a></section>
    @endif
</main>
@endsection