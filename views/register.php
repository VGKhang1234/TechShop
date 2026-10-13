<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký | E-Tech</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-page">
    <header class="auth-header">
        <div class="container">
            <a href="index.html" class="logo auth-logo">
                <div class="logo-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
                <span>E-Tech</span>
            </a>
            <a href="index.html" class="auth-home-link">← Về trang chủ</a>
        </div>
    </header>

    <main class="auth-main">
        <div class="auth-layout">
            <section class="auth-form-panel">
                <div class="auth-kicker">Thành viên E-Tech</div>
                <h1>Tạo tài khoản mới</h1>
                <p class="auth-intro">Đăng ký miễn phí để nhận ưu đãi và mua sắm thuận tiện hơn.</p>
                <form class="auth-form" id="registerForm" novalidate>
                    <div class="auth-field">
                        <label for="registerName">Họ và tên</label>
                        <input id="registerName" name="name" type="text" autocomplete="name" placeholder="Nguyễn Văn A" required>
                    </div>
                    <div class="auth-field">
                        <label for="registerEmail">Địa chỉ email</label>
                        <input id="registerEmail" name="email" type="email" autocomplete="email" placeholder="ban@example.com" required>
                    </div>
                    <div class="auth-field">
                        <label for="registerPhone">Số điện thoại <span>(tùy chọn)</span></label>
                        <input id="registerPhone" name="phone" type="tel" autocomplete="tel" placeholder="0313728397">
                    </div>
                    <div class="auth-field">
                        <label for="registerPassword">Mật khẩu</label>
                        <div class="auth-password-wrap">
                            <input id="registerPassword" name="password" type="password" autocomplete="new-password" placeholder="Tối thiểu 6 ký tự" minlength="6" required>
                            <button type="button" class="auth-password-toggle" data-password-toggle="registerPassword">Hiện</button>
                        </div>
                    </div>
                    <div class="auth-field">
                        <label for="registerConfirmPassword">Nhập lại mật khẩu</label>
                        <div class="auth-password-wrap">
                            <input id="registerConfirmPassword" name="confirmPassword" type="password" autocomplete="new-password" placeholder="Nhập lại mật khẩu" minlength="6" required>
                            <button type="button" class="auth-password-toggle" data-password-toggle="registerConfirmPassword">Hiện</button>
                        </div>
                    </div>
                    <div class="auth-form-row">
                        <label class="auth-check"><input type="checkbox" name="terms" required> <span>Tôi đồng ý với điều khoản dịch vụ</span></label>
                    </div>
                    <p class="auth-message" id="registerMessage" role="alert" aria-live="polite"></p>
                    <button type="submit" class="auth-submit">Đăng ký tài khoản</button>
                    <div class="auth-form-row"><span>Đã có tài khoản?</span><a href="login.html" class="auth-link">Đăng nhập ngay</a></div>
                </form>
            </section>
            <aside class="auth-side">
                <h2>Ưu đãi dành riêng cho thành viên mới.</h2>
                <p>Chỉ vài bước đơn giản để bắt đầu hành trình mua sắm thiết bị công nghệ cùng E-Tech.</p>
                <div class="auth-benefits">
                    <div class="auth-benefit"><span class="auth-benefit-icon">15%</span><span>Giảm đến 15% cho sản phẩm đã kích hoạt</span></div>
                    <div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Lưu sản phẩm yêu thích để xem lại bất cứ lúc nào</span></div>
                    <div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Thanh toán nhanh với thông tin đã lưu</span></div>
                </div>
            </aside>
        </div>
    </main>

    <footer class="auth-footer">© 2026 E-Tech Store. Mua sắm công nghệ thật đơn giản.</footer>
    <script src="js/auth.js"></script>
</body>
</html>
