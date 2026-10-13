@extends('layouts.store')

@section('title', 'Giỏ hàng | E-Tech')

@section('content')
<main class="store-cart-page">
    <section class="shop-page-header"><div class="container"><nav class="shop-breadcrumb"><a href="{{ route('home') }}">Trang chủ</a> / Giỏ hàng</nav><h1>Giỏ hàng của bạn</h1><p>Kiểm tra sản phẩm trước khi hoàn tất đơn hàng.</p></div></section>
    <section class="shop-content"><div class="container">
        @if (session('cart_success'))<div class="store-notice store-notice-success" role="status">{{ session('cart_success') }}</div>@endif
        @if ($errors->any())<div class="store-notice store-notice-error" role="alert">{{ $errors->first() }}</div>@endif
        @if ($items->isNotEmpty())
            <div class="cart-layout">
                <section class="cart-panel">
                    <div class="cart-table-head"><span>Sản phẩm</span><span>Đơn giá</span><span>Số lượng</span><span></span></div>
                    @foreach ($items as $item)
                        <article class="cart-item">
                            <div class="cart-product"><a class="cart-product-image" href="{{ route('products.show', ['product' => $item->product->slug]) }}"><img src="{{ asset($item->product->primary_image) }}" alt="{{ $item->product->product_name }}" loading="lazy"></a><div><small>{{ $item->product->category?->category_name }}</small><a class="cart-product-title" href="{{ route('products.show', ['product' => $item->product->slug]) }}">{{ $item->product->product_name }}</a></div></div>
                            <div class="cart-price" data-label="Đơn giá">{{ number_format((float) $item->product->price, 0, ',', '.') }} đ</div>
                            <form class="cart-quantity-form" action="{{ route('cart.update', ['cartItem' => $item->cart_item_id]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <label class="visually-hidden" for="quantity-{{ $item->cart_item_id }}">Số lượng {{ $item->product->product_name }}</label>
                                <input id="quantity-{{ $item->cart_item_id }}" class="shop-input" type="number" name="quantity" min="1" max="{{ min(99, $item->product->stock_quantity) }}" value="{{ $item->quantity }}" data-cart-quantity>
                                <button class="shop-button shop-button-secondary" type="submit">Cập nhật</button>
                            </form>
                            <form action="{{ route('cart.destroy', ['cartItem' => $item->cart_item_id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="remove-item" type="submit" aria-label="Xóa {{ $item->product->product_name }}">×</button>
                            </form>
                        </article>
                    @endforeach
                    <div class="cart-tools"><a class="shop-button shop-button-secondary" href="{{ route('categories.show', ['category' => 'popular']) }}">Tiếp tục mua sắm</a></div>
                </section>
                <aside class="summary-card"><h2>Tóm tắt đơn hàng</h2><div class="summary-row"><span>Tạm tính</span><strong>{{ number_format($subtotal, 0, ',', '.') }} đ</strong></div><div class="summary-row"><span>Phí giao hàng</span><span>Tính tại bước thanh toán</span></div><div class="summary-total"><span>Tổng tạm tính</span><strong>{{ number_format($subtotal, 0, ',', '.') }} đ</strong></div><a class="shop-button" href="{{ route('checkout.show') }}">Tiến hành thanh toán</a><p class="cart-shipping-note">Miễn phí giao hàng cho đơn từ 1.000.000 đ.</p></aside>
            </div>
        @else
            <section class="store-empty cart-empty"><h2>Giỏ hàng đang trống</h2><p>Chọn sản phẩm bạn thích để bắt đầu đặt hàng.</p><a href="{{ route('categories.show', ['category' => 'popular']) }}" class="shop-button">Khám phá sản phẩm</a></section>
        @endif
    </div></section>
</main>
@endsection