<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | E-Tech</title>
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
                <div class="auth-kicker">Chào mừng trở lại</div>
                <h1>Đăng nhập tài khoản</h1>
                <p class="auth-intro">Đăng nhập để theo dõi đơn hàng và nhận ưu đãi riêng từ E-Tech.</p>
                <form class="auth-form" id="loginForm" novalidate>
                    <div class="auth-field">
                        <label for="loginEmail">Địa chỉ email</label>
                        <input id="loginEmail" name="email" type="email" autocomplete="email" placeholder="ban@example.com" required>
                    </div>
                    <div class="auth-field">
                        <label for="loginPassword">Mật khẩu</label>
                        <div class="auth-password-wrap">
                            <input id="loginPassword" name="password" type="password" autocomplete="current-password" placeholder="Nhập mật khẩu" required>
                            <button type="button" class="auth-password-toggle" data-password-toggle="loginPassword">Hiện</button>
                        </div>
                    </div>
                    <div class="auth-form-row">
                        <label class="auth-check"><input type="checkbox" name="remember"> <span>Ghi nhớ đăng nhập</span></label>
                        <a href="register.html" class="auth-link">Tạo tài khoản mới</a>
                    </div>
                    <p class="auth-message" id="loginMessage" role="alert" aria-live="polite"></p>
                    <button type="submit" class="auth-submit">Đăng nhập</button>
                </form>
            </section>
            <aside class="auth-side">
                <h2>Công nghệ tốt hơn, trải nghiệm dễ hơn.</h2>
                <p>Gia nhập cộng đồng E-Tech để khám phá thiết bị mới và quản lý mọi đơn hàng trong một tài khoản.</p>
                <div class="auth-benefits">
                    <div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Theo dõi trạng thái đơn hàng nhanh chóng</span></div>
                    <div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Nhận ưu đãi lên đến 15% cho thành viên mới</span></div>
                    <div class="auth-benefit"><span class="auth-benefit-icon">✓</span><span>Lưu thông tin mua sắm thuận tiện hơn</span></div>
                </div>
            </aside>
        </div>
    </main>

    <footer class="auth-footer">© 2026 E-Tech Store. Mua sắm công nghệ thật đơn giản.</footer>
    <script src="js/auth.js"></script>
</body>
</html>
