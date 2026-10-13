@extends('layouts.auth')

@section('title', 'Đăng ký')

@section('content')
<div class="auth-layout">
    <section class="auth-form-panel">
        <div class="auth-kicker">Thành viên E-Tech</div>
        <h1>Tạo tài khoản mới</h1>
        <p class="auth-intro">Đăng ký miễn phí để nhận ưu đãi và mua sắm thuận tiện hơn.</p>
        <form class="auth-form" id="registerForm" action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="auth-field"><label for="registerName">Họ và tên</label><input id="registerName" name="name" type="text" value="{{ old('name') }}" autocomplete="name" maxlength="120" required>@error('name')<small class="auth-error">{{ $message }}</small>@enderror</div>
            <div class="auth-field"><label for="registerEmail">Địa chỉ email</label><input id="registerEmail" name="email" type="email" value="{{ old('email') }}" autocomplete="email" maxlength="190" placeholder="ban@example.com" required>@error('email')<small class="auth-error">{{ $message }}</small>@enderror</div>
            <div class="auth-field"><label for="registerPhone">Số điện thoại <span>(tùy chọn)</span></label><input id="registerPhone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" maxlength="20">@error('phone')<small class="auth-error">{{ $message }}</small>@enderror</div>
            <div class="auth-field"><label for="registerPassword">Mật khẩu</label><div class="auth-password-wrap"><input id="registerPassword" name="password" type="password" autocomplete="new-password" minlength="8" placeholder="Tối thiểu 8 ký tự" required><button type="button" class="auth-password-toggle" data-password-toggle="registerPassword">Hiện</button></div>@error('password')<small class="auth-error">{{ $message }}</small>@enderror</div>
            <div class="auth-field"><label for="registerPasswordConfirmation">Nhập lại mật khẩu</label><div class="auth-password-wrap"><input id="registerPasswordConfirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="8" placeholder="Nhập lại mật khẩu" required><button type="button" class="auth-password-toggle" data-password-toggle="registerPasswordConfirmation">Hiện</button></div></div>
            <div class="auth-form-row"><label class="auth-check"><input type="checkbox" name="terms" value="1" required> <span>Tôi đồng ý với điều khoản dịch vụ</span></label>@error('terms')<small class="auth-error">{{ $message }}</small>@enderror</div>
            <button type="submit" class="auth-submit">Đăng ký tài khoản</button>
            <div class="auth-form-row"><span>Đã có tài khoản?</span><a href="{{ route('login') }}" class="auth-link">Đăng nhập ngay</a></div>
        </form>
    </section>
    <aside class="auth-side"><h2>Ưu đãi dành riêng cho thành viên mới.</h2><p>Chỉ vài bước đơn giản để bắt đầu hành trình mua sắm thiết bị công nghệ cùng E-Tech.</p><div class="auth-benefits"><div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Lưu sản phẩm yêu thích để xem lại</span></div><div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Theo dõi đơn hàng thuận tiện</span></div><div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Mua sắm cùng tài khoản E-Tech</span></div></div></aside>
</div>
@endsection