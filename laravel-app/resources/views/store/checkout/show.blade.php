@extends('layouts.store')

@section('title', 'Thanh toán | E-Tech')

@section('content')
<main class="store-checkout-page">
    <section class="shop-page-header"><div class="container"><nav class="shop-breadcrumb"><a href="{{ route('cart.index') }}">Giỏ hàng</a> / Thanh toán</nav><h1>Thanh toán</h1><p>Hoàn tất thông tin để nhận đơn hàng.</p></div></section>
    <section class="shop-content"><div class="container">
        @if ($errors->any())<div class="store-notice store-notice-error" role="alert">{{ $errors->first() }}</div>@endif
        <form class="checkout-layout" action="{{ route('checkout.store') }}" method="post">
            @csrf
            <section class="checkout-panel">
                <h2>Thông tin nhận hàng</h2>
                <div class="form-grid">
                    <div class="form-field full"><label for="receiver_name">Họ và tên <span class="required">*</span></label><input class="shop-input" id="receiver_name" name="receiver_name" value="{{ old('receiver_name', $user?->name) }}" autocomplete="name" maxlength="120" required>@error('receiver_name')<small class="auth-error">{{ $message }}</small>@enderror</div>
                    <div class="form-field"><label for="receiver_phone">Số điện thoại <span class="required">*</span></label><input class="shop-input" id="receiver_phone" name="receiver_phone" type="tel" value="{{ old('receiver_phone', $user?->phone) }}" autocomplete="tel" maxlength="20" required>@error('receiver_phone')<small class="auth-error">{{ $message }}</small>@enderror</div>
                    <div class="form-field"><label for="receiver_email">Địa chỉ email</label><input class="shop-input" id="receiver_email" name="receiver_email" type="email" value="{{ old('receiver_email', $user?->email) }}" autocomplete="email" maxlength="190">@error('receiver_email')<small class="auth-error">{{ $message }}</small>@enderror</div>
                    <div class="form-field full"><label for="shipping_address">Địa chỉ giao hàng <span class="required">*</span></label><textarea class="shop-input" id="shipping_address" name="shipping_address" rows="3" maxlength="500" autocomplete="street-address" required>{{ old('shipping_address', $user?->address) }}</textarea>@error('shipping_address')<small class="auth-error">{{ $message }}</small>@enderror</div>
                    <div class="form-field full"><label for="note">Ghi chú đơn hàng</label><textarea class="shop-input" id="note" name="note" rows="2" maxlength="500">{{ old('note') }}</textarea>@error('note')<small class="auth-error">{{ $message }}</small>@enderror</div>
                </div>
                <h3 class="form-section-title">Phương thức thanh toán</h3>
                <div class="payment-options">
                    <label class="payment-option"><input type="radio" name="payment_method" value="bank_transfer" @checked(old('payment_method', 'bank_transfer') === 'bank_transfer')><span><strong>Chuyển khoản ngân hàng</strong><span>Đơn hàng sẽ được xác nhận sau khi thanh toán.</span></span></label>
                    <label class="payment-option"><input type="radio" name="payment_method" value="cod" @checked(old('payment_method') === 'cod')><span><strong>Thanh toán khi nhận hàng</strong><span>Thanh toán cho nhân viên giao hàng.</span></span></label>
                </div>
                <div class="form-field checkout-voucher"><label for="voucher_code">Mã giảm giá</label><input class="shop-input" id="voucher_code" name="voucher_code" value="{{ old('voucher_code') }}" maxlength="50" placeholder="Nhập mã ưu đãi">@error('voucher_code')<small class="auth-error">{{ $message }}</small>@enderror</div>
            </section>
            <aside class="order-summary"><h2>Đơn hàng của bạn</h2>
                <div class="checkout-items">@foreach ($items as $item)<div class="checkout-item"><span>{{ $item->product->product_name }} × {{ $item->quantity }}</span><strong>{{ number_format((float) $item->product->price * $item->quantity, 0, ',', '.') }} đ</strong></div>@endforeach</div>
                <div class="summary-row"><span>Tạm tính</span><strong>{{ number_format($subtotal, 0, ',', '.') }} đ</strong></div>
                <div class="summary-row"><span>Giao hàng</span><span>{{ $subtotal >= 1000000 ? 'Miễn phí' : '30.000 đ' }}</span></div>
                <p class="checkout-voucher-note">Mã giảm giá, nếu hợp lệ, sẽ được áp dụng khi đặt hàng.</p>
                <button class="checkout-submit" type="submit">Đặt hàng</button>
                <a class="checkout-back-link" href="{{ route('cart.index') }}">← Quay lại giỏ hàng</a>
            </aside>
        </form>
    </div></section>
</main>
@endsection