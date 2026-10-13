@props(['product'])

<article class="product-shop-card" data-price="{{ $product->price }}" data-brand="{{ $product->brand?->slug ?? '' }}" data-rating="{{ $product->rating }}" data-sales="{{ $product->sold_count }}">
    <div class="card-top-badges">
        @if ($product->old_price && $product->old_price > $product->price)
            <span class="badge-discount">-{{ round((1 - $product->price / $product->old_price) * 100) }}%</span>
        @endif
        @if ($product->stock_quantity === 0)
            <span class="badge-hot">Hết hàng</span>
        @endif
    </div>
    <div class="card-image-box">
        <a href="{{ route('products.show', ['product' => $product->slug]) }}">
            <img src="{{ asset($product->primary_image) }}" alt="{{ $product->product_name }}" loading="lazy">
        </a>
        <div class="card-floating-actions">
            <a href="{{ route('products.show', ['product' => $product->slug]) }}" class="floating-action-btn" aria-label="Xem {{ $product->product_name }}">↗</a>
        </div>
    </div>
    <div class="card-body-content">
        <span class="card-cat-name">{{ $product->category?->category_name }}</span>
        <h3 class="card-product-title"><a href="{{ route('products.show', ['product' => $product->slug]) }}">{{ $product->product_name }}</a></h3>
        <div class="card-rating-row"><span class="card-stars">★★★★★</span><span class="card-reviews-num">{{ number_format((float) $product->rating, 1) }} · {{ $product->review_count }} đánh giá</span></div>
        <div class="card-price-row">
            <span class="card-new-price">{{ number_format((float) $product->price, 0, ',', '.') }} đ</span>
            @if ($product->old_price && $product->old_price > $product->price)
                <span class="card-old-price">{{ number_format((float) $product->old_price, 0, ',', '.') }} đ</span>
            @endif
        </div>
        <div class="card-purchase-actions">
            <a class="card-add-cart-btn card-view-product" href="{{ route('products.show', ['product' => $product->slug]) }}">Chi tiết</a>
            <form action="{{ route('cart.store') }}" method="post" data-cart-add>
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <input type="hidden" name="quantity" value="1">
                <button class="card-add-cart-btn" type="submit" @disabled($product->stock_quantity < 1)>Thêm giỏ</button>
            </form>
        </div>
    </div>
</article>