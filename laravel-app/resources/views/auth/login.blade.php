@extends('layouts.auth')

@section('title', 'Đăng nhập')

@section('content')
<div class="auth-layout">
    <section class="auth-form-panel">
        <div class="auth-kicker">Chào mừng trở lại</div>
        <h1>Đăng nhập tài khoản</h1>
        <p class="auth-intro">Đăng nhập để theo dõi đơn hàng và nhận ưu đãi riêng từ E-Tech.</p>
        <form class="auth-form" id="loginForm" action="{{ route('login.store') }}" method="post">
            @csrf
            <div class="auth-field"><label for="loginEmail">Địa chỉ email</label><input id="loginEmail" name="email" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="ban@example.com" required>@error('email')<small class="auth-error">{{ $message }}</small>@enderror</div>
            <div class="auth-field"><label for="loginPassword">Mật khẩu</label><div class="auth-password-wrap"><input id="loginPassword" name="password" type="password" autocomplete="current-password" placeholder="Nhập mật khẩu" required><button type="button" class="auth-password-toggle" data-password-toggle="loginPassword">Hiện</button></div>@error('password')<small class="auth-error">{{ $message }}</small>@enderror</div>
            <div class="auth-form-row"><a href="{{ route('register') }}" class="auth-link">Tạo tài khoản mới</a></div>
            <button type="submit" class="auth-submit">Đăng nhập</button>
        </form>
    </section>
    <aside class="auth-side"><h2>Công nghệ tốt hơn, trải nghiệm dễ hơn.</h2><p>Gia nhập cộng đồng E-Tech để khám phá thiết bị mới và quản lý mọi đơn hàng trong một tài khoản.</p><div class="auth-benefits"><div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Theo dõi trạng thái đơn hàng nhanh chóng</span></div><div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Nhận ưu đãi dành riêng cho thành viên</span></div><div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Lưu thông tin mua sắm thuận tiện hơn</span></div></div></aside>
</div>
@endsection