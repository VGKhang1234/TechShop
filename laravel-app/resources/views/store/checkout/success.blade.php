@extends('layouts.store')

@section('title', 'Đặt hàng thành công | E-Tech')

@section('content')
<main class="container checkout-success-page">
    <section class="checkout-success-panel" role="status">
        <span class="checkout-success-mark" aria-hidden="true">✓</span>
        <span class="store-eyebrow">E-TECH ĐÃ NHẬN ĐƠN</span>
        <h1>Cảm ơn bạn đã đặt hàng</h1>
        <p>Mã đơn hàng <strong>{{ $order->order_code }}</strong></p>
        <div class="checkout-success-totals"><span>Tổng thanh toán</span><strong>{{ number_format((float) $order->total_amount, 0, ',', '.') }} đ</strong><span>Phương thức: {{ $order->payment_method === 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng' }}</span></div>
        <a href="{{ route('home') }}" class="shop-button">Tiếp tục mua sắm</a>
    </section>
</main>
@endsection