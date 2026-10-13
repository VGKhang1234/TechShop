@extends('layouts.store')

@section('title', $product->product_name . ' | E-Tech')

@section('content')
@php
    $galleryImages = $product->images->isNotEmpty() ? $product->images : collect([(object) ['image_url' => $product->primary_image, 'alt_text' => $product->product_name]]);
    $discount = $product->old_price > $product->price ? round((1 - $product->price / $product->old_price) * 100) : 0;
@endphp
<main class="product-detail-page">
    <div class="container">
        <nav class="product-breadcrumb" aria-label="Đường dẫn"><a href="{{ route('home') }}">Trang chủ</a><span>/</span><a href="{{ route('categories.show', ['category' => $product->category->slug]) }}">{{ $product->category->category_name }}</a><span>/</span><strong>{{ $product->product_name }}</strong></nav>
        <section class="product-detail-hero">
            <div class="product-gallery">
                <div class="gallery-main">
                    @if ($discount)<span class="gallery-badge">-{{ $discount }}%</span>@endif
                    <img id="productImage" src="{{ asset($product->primary_image) }}" alt="{{ $product->product_name }}">
                </div>
                @if ($galleryImages->count() > 1)
                    <div class="gallery-thumbs">
                        @foreach ($galleryImages as $index => $image)
                            <button class="gallery-thumb {{ $index === 0 ? 'active' : '' }}" data-image="{{ asset($image->image_url) }}" aria-label="Xem ảnh {{ $index + 1 }}"><img src="{{ asset($image->image_url) }}" alt=""></button>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="product-summary">
                <span class="product-eyebrow">{{ $product->brand?->brand_name ?? 'E-TECH' }} · {{ $product->category->category_name }}</span>
                <h1>{{ $product->product_name }}</h1>
                <div class="rating-line"><span class="stars">★★★★★</span><strong>{{ number_format((float) $product->rating, 1) }}</strong><span>{{ $product->review_count }} đánh giá</span><span class="sku-label">SKU: {{ $product->sku }}</span></div>
                <p class="product-lead">{{ $product->description ?: 'Sản phẩm chính hãng được phân phối bởi E-Tech, hỗ trợ bảo hành theo chính sách của nhà sản xuất.' }}</p>
                <div class="price-panel"><span class="sale-price">{{ number_format((float) $product->price, 0, ',', '.') }} đ</span>@if ($discount)<span class="original-price">{{ number_format((float) $product->old_price, 0, ',', '.') }} đ</span><span class="save-tag">Tiết kiệm {{ $discount }}%</span>@endif<small>Đã bao gồm VAT</small></div>
                <div class="stock-row"><span class="stock-dot"></span><strong>{{ $product->stock_quantity > 0 ? 'Còn hàng' : 'Tạm hết hàng' }}</strong>@if ($product->stock_quantity > 0)<span>·</span><span>Còn {{ $product->stock_quantity }} sản phẩm</span>@endif</div>
                <div class="service-points"><div><span class="service-point-icon">↝</span><p><strong>Miễn phí giao hàng</strong><br>Cho đơn từ 1.000.000 đ</p></div><div><span class="service-point-icon">↺</span><p><strong>Đổi trả trong 15 ngày</strong><br>Hỗ trợ tận tâm tại E-Tech</p></div></div>
                <form action="{{ route('cart.store') }}" method="post" class="product-purchase-form" data-cart-add>
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <input type="hidden" name="quantity" id="quantity" value="1">
                    <div class="quantity-control"><button type="button" data-quantity="decrease" aria-label="Giảm số lượng">−</button><output id="quantityOutput">1</output><button type="button" data-quantity="increase" aria-label="Tăng số lượng">+</button></div>
                    <button type="submit" class="add-cart-button" @disabled($product->stock_quantity < 1)>{{ $product->stock_quantity > 0 ? 'Thêm vào giỏ hàng' : 'Tạm hết hàng' }}</button>
                    <button type="submit" class="buy-now-button" name="buy_now" value="1" @disabled($product->stock_quantity < 1)>Mua ngay</button>
                </form>
                <a class="product-continue-link" href="{{ route('categories.show', ['category' => $product->category->slug]) }}">Tiếp tục mua sắm</a>
            </div>
        </section>
        <section class="product-information">
            <div class="info-tabs"><button class="info-tab active" data-tab="description">Mô tả sản phẩm</button><button class="info-tab" data-tab="specifications">Thông tin sản phẩm</button><button class="info-tab" data-tab="reviews">Đánh giá ({{ $product->review_count }})</button></div>
            <div class="tab-content active" id="description"><h2>{{ $product->product_name }}</h2><p>{{ $product->description ?: 'Sản phẩm công nghệ chính hãng, được kiểm tra kỹ trước khi đến tay khách hàng.' }}</p></div>
            <div class="tab-content" id="specifications"><div class="spec-grid"><div><span>Thương hiệu</span><strong>{{ $product->brand?->brand_name ?? 'Đang cập nhật' }}</strong></div><div><span>Mã sản phẩm</span><strong>{{ $product->sku }}</strong></div><div><span>Danh mục</span><strong>{{ $product->category->category_name }}</strong></div><div><span>Tình trạng kho</span><strong>{{ $product->stock_quantity > 0 ? 'Còn hàng' : 'Tạm hết hàng' }}</strong></div></div></div>
            <div class="tab-content" id="reviews"><div class="review-summary"><strong>{{ number_format((float) $product->rating, 1) }} <span>/ 5</span></strong><span class="stars">★★★★★</span><p>{{ $product->review_count }} khách hàng đã đánh giá</p></div></div>
        </section>
        @if ($relatedProducts->isNotEmpty())
            <section class="related-products"><div class="section-heading"><div><span class="product-eyebrow">GỢI Ý CHO BẠN</span><h2>Sản phẩm liên quan</h2></div></div><div class="products-catalog-grid store-product-grid">@foreach ($relatedProducts as $relatedProduct)<x-product-card :product="$relatedProduct" />@endforeach</div></section>
        @endif
    </div>
</main>
@endsection