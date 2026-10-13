<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu | E-Tech</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .intro-page { background: #f8fafc; }
        .intro-hero { padding: 76px 0 88px; background: linear-gradient(135deg, #fff8f5 0%, #f8fafc 58%, #fff 100%); }
        .intro-hero-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 72px; align-items: center; }
        .intro-kicker { color: var(--primary-red); font-size: .82rem; font-weight: 800; letter-spacing: 1.8px; margin-bottom: 14px; }
        .intro-title { color: #111827; font-size: clamp(2.4rem, 4.5vw, 4.2rem); line-height: 1.08; letter-spacing: -1.8px; margin-bottom: 22px; max-width: 620px; }
        .intro-lead { color: var(--muted-text); font-size: 1.02rem; line-height: 1.8; max-width: 560px; margin-bottom: 30px; }
        .intro-hero-image { position: relative; }
        .intro-hero-image::after { content: ''; position: absolute; width: 72%; height: 16%; left: 14%; bottom: 4%; background: rgba(15, 23, 42, .16); filter: blur(25px); border-radius: 50%; z-index: 0; }
        .intro-hero-image img { width: 100%; max-height: 440px; object-fit: cover; position: relative; z-index: 1; border-radius: 4px; box-shadow: 22px 22px 0 #ffc700; }
        .intro-story { padding: 82px 0; background: #fff; }
        .intro-story-grid { display: grid; grid-template-columns: .8fr 1.2fr; gap: 72px; align-items: start; }
        .intro-section-title { color: #111827; font-size: clamp(1.8rem, 3vw, 2.8rem); line-height: 1.15; margin-bottom: 18px; }
        .intro-copy { color: var(--muted-text); line-height: 1.8; margin-bottom: 16px; }
        .intro-stat-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-top: 28px; }
        .intro-stat { padding: 20px; background: #fff8f5; border-left: 3px solid var(--primary-red); }
        .intro-stat strong { display: block; color: var(--primary-red); font-size: 1.8rem; line-height: 1; margin-bottom: 7px; }
        .intro-stat span { color: var(--muted-text); font-size: .8rem; }
        .intro-values { padding: 82px 0; background: #f1f5f9; }
        .intro-centered { text-align: center; max-width: 680px; margin: 0 auto 40px; }
        .intro-value-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
        .intro-value { background: #fff; padding: 28px; border: 1px solid var(--border-color); border-radius: var(--radius-md); transition: var(--transition); }
        .intro-value:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--primary-red); }
        .intro-value-icon { width: 46px; height: 46px; display: grid; place-items: center; background: #fff0ec; color: var(--primary-red); border-radius: 50%; font-size: 1.35rem; margin-bottom: 18px; }
        .intro-value h3 { color: var(--dark-text); font-size: 1.08rem; margin-bottom: 10px; }
        .intro-value p { color: var(--muted-text); font-size: .9rem; line-height: 1.7; }
        .intro-faq { padding: 82px 0 100px; background: #fff; }
        .intro-faq-grid { display: grid; grid-template-columns: .82fr 1.18fr; gap: 55px; align-items: center; }
        .intro-faq-images { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .intro-faq-images img { width: 100%; height: 290px; object-fit: cover; }
        .intro-faq-images img:first-child { margin-top: 42px; }
        .intro-faq-list { display: grid; gap: 10px; }
        .intro-faq-list details { border-bottom: 1px solid var(--border-color); }
        .intro-faq-list summary { cursor: pointer; list-style: none; padding: 18px 34px 18px 0; color: var(--dark-text); font-weight: 700; position: relative; }
        .intro-faq-list summary::-webkit-details-marker { display: none; }
        .intro-faq-list summary::after { content: '+'; position: absolute; right: 3px; top: 14px; color: var(--primary-red); font-size: 1.35rem; font-weight: 400; }
        .intro-faq-list details[open] summary { color: var(--primary-red); }
        .intro-faq-list details[open] summary::after { content: '\2212'; }
        .intro-faq-list details p { color: var(--muted-text); font-size: .9rem; line-height: 1.75; padding: 0 36px 18px 0; }
        @media (max-width: 992px) {
            .intro-hero-grid, .intro-story-grid, .intro-faq-grid { grid-template-columns: 1fr; gap: 42px; }
            .intro-hero-content { text-align: center; }
            .intro-lead { margin-left: auto; margin-right: auto; }
            .intro-hero-image { max-width: 650px; margin: 0 auto; }
            .intro-value-grid { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 600px) {
            .intro-hero, .intro-story, .intro-values, .intro-faq { padding: 54px 0 64px; }
            .intro-title { letter-spacing: -1px; }
            .intro-hero-image img { box-shadow: 10px 10px 0 #ffc700; }
            .intro-value-grid { grid-template-columns: 1fr; }
            .intro-stat-grid { gap: 10px; }
            .intro-faq-images img { height: 210px; }
        }
    </style>
</head>
<body class="intro-page">
<?php $activePage = 'introduction'; include 'header.php'; if (false): ?>
    <div class="announcement-bar">
        <div class="container">
            <span>Đặt hàng trực tuyến gọi cho chúng tôi <strong>0313728397</strong></span>
            <span class="announcement-sep">•</span>
            <span>Giao hàng miễn phí cho đơn hàng trên 1,000,000 đ</span>
            <span class="announcement-sep">•</span>
            <span>Đăng ký tài khoản để được giảm giá -15%</span>
        </div>
    </div>

    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="top-bar-item"><span>Hotline: 0313728397</span></div>
                <div class="top-bar-item"><span>Email: info@themona.global</span></div>
            </div>
            <div class="top-bar-right">
                <div class="top-bar-item"><span>Tiếng Việt / VNĐ</span></div>
                <div class="top-bar-item"><a href="#faq">Hỗ trợ khách hàng</a></div>
            </div>
        </div>
    </div>

    <header class="main-header">
        <div class="container">
            <a href="index.html" class="logo">
                <div class="logo-icon"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
                <span>E-Tech</span>
            </a>
            <div class="header-search">
                <select aria-label="Danh mục tìm kiếm"><option>Tất cả danh mục</option><option>Điện thoại</option><option>Phụ kiện</option></select>
                <input type="text" placeholder="Tìm kiếm sản phẩm công nghệ..." aria-label="Tìm kiếm">
                <button type="button" aria-label="Tìm kiếm"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button>
            </div>
            <div class="header-actions">
                <div class="action-btn"><div class="icon-wrapper"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><div class="action-info"><span class="action-sub">Xin chào</span><span class="action-title">Tài Khoản</span></div></div>
                <div class="action-btn"><div class="icon-wrapper"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg><span class="badge">0</span></div></div>
                <button class="mobile-toggle" id="mobileToggle" aria-label="Mở menu"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>
            </div>
        </div>
    </header>

    <nav class="nav-bar">
        <div class="container">
            <div class="nav-links" id="navLinks">
                <a href="index.html">Trang Chủ</a>
                <a href="introduction.html" class="active">Giới Thiệu</a>
                <a href="popular.html">Sản Phẩm</a>
                <a href="news.html">Tin Tức</a>
                <a href="contact.html">Liên Hệ</a>
            </div>
            <div class="nav-promo">⚡ Giảm giá lên đến 50% cho thành viên mới</div>
        </div>
    </nav>

    <nav class="category-strip">
        <div class="container">
            <div class="category-strip-links">
                <a href="popular.html" class="category-strip-item"><span>☆</span><span>Phổ biến</span></a>
                <a href="phone.html" class="category-strip-item"><span>▣</span><span>Điện thoại</span></a>
                <a href="computer.html" class="category-strip-item"><span>▤</span><span>Máy tính</span></a>
                <a href="accessory.html" class="category-strip-item"><span>⚙</span><span>Phụ kiện</span></a>
                <a href="headphone.html" class="category-strip-item"><span>♬</span><span>Tai nghe</span></a>
                <a href="watch.html" class="category-strip-item"><span>◷</span><span>Smart Watch</span></a>
                <a href="webcam.html" class="category-strip-item"><span>◉</span><span>Web Cam</span></a>
            </div>
            <a href="tel:0313728397" class="category-strip-hotline"><span>☎</span><span>0313728397</span></a>
        </div>
    </nav>

    <?php endif; ?>
    <main>
        <section class="intro-hero">
            <div class="container intro-hero-grid">
                <div class="intro-hero-content">
                    <div class="intro-kicker">GIỚI THIỆU E-TECH</div>
                    <h1 class="intro-title">Những thiết bị công nghệ hàng đầu</h1>
                    <p class="intro-lead">E-Tech là điểm đến dành cho những người yêu công nghệ. Chúng tôi tuyển chọn các sản phẩm chính hãng, hữu ích và hiện đại để mỗi trải nghiệm mua sắm đều trở nên đơn giản, tin cậy và đáng nhớ.</p>
                    <a href="popular.html" class="btn-primary"><span>Khám phá sản phẩm</span><svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
                </div>
                <div class="intro-hero-image"><img src="img/about1.png" alt="Không gian sản phẩm công nghệ E-Tech"></div>
            </div>
        </section>

        <section class="intro-story">
            <div class="container intro-story-grid">
                <div><div class="intro-kicker">CÂU CHUYỆN CỦA CHÚNG TÔI</div><h2 class="intro-section-title">Công nghệ tốt hơn bắt đầu từ lựa chọn đúng</h2></div>
                <div>
                    <p class="intro-copy">Chúng tôi tin rằng một thiết bị tốt không chỉ có thông số ấn tượng, mà còn phải phù hợp với nhịp sống của bạn. Vì vậy, E-Tech tập trung xây dựng danh mục sản phẩm rõ ràng, tư vấn dễ hiểu và dịch vụ đồng hành tận tâm.</p>
                    <p class="intro-copy">Từ điện thoại, máy tính đến phụ kiện và thiết bị thông minh, mỗi sản phẩm đều được lựa chọn với tiêu chí chất lượng, nguồn gốc minh bạch và giá trị sử dụng lâu dài.</p>
                    <div class="intro-stat-grid"><div class="intro-stat"><strong>100%</strong><span>Sản phẩm được chọn lọc</span></div><div class="intro-stat"><strong>24/7</strong><span>Sẵn sàng hỗ trợ khách hàng</span></div></div>
                </div>
            </div>
        </section>

        <section class="intro-values">
            <div class="container"><div class="intro-centered"><div class="intro-kicker">ĐIỀU E-TECH THEO ĐUỔI</div><h2 class="intro-section-title">Mua sắm công nghệ nhẹ nhàng hơn</h2><p class="intro-copy">Ba nguyên tắc tạo nên trải nghiệm mà chúng tôi muốn mang đến mỗi ngày.</p></div>
                <div class="intro-value-grid"><article class="intro-value"><div class="intro-value-icon">✓</div><h3>Chất lượng đáng tin</h3><p>Danh mục được tuyển chọn kỹ để bạn yên tâm về nguồn gốc và hiệu năng sản phẩm.</p></article><article class="intro-value"><div class="intro-value-icon">↗</div><h3>Tư vấn rõ ràng</h3><p>Thông tin dễ hiểu, trung thực và tập trung vào nhu cầu sử dụng thực tế của bạn.</p></article><article class="intro-value"><div class="intro-value-icon">♡</div><h3>Đồng hành tận tâm</h3><p>Đội ngũ E-Tech luôn sẵn sàng hỗ trợ trước, trong và sau khi bạn mua hàng.</p></article></div>
            </div>
        </section>

        <section class="intro-faq" id="faq">
            <div class="container intro-faq-grid">
                <div class="intro-faq-images"><img src="img/faq1.png" alt="Máy ảnh công nghệ"><img src="img/faq2.png" alt="Điện thoại thông minh"></div>
                <div><div class="intro-kicker">CÁC CÂU HỎI VÀ TRẢ LỜI</div><h2 class="intro-section-title">Câu hỏi thường gặp</h2><div class="intro-faq-list"><details open><summary>Cửa hàng của chúng tôi bán những sản phẩm điện tử nào?</summary><p>E-Tech cung cấp điện thoại, laptop, máy tính, tai nghe, phụ kiện, smartwatch, webcam và nhiều thiết bị công nghệ khác.</p></details><details><summary>Làm thế nào để tìm sản phẩm phù hợp?</summary><p>Bạn có thể duyệt theo danh mục hoặc liên hệ hotline để được tư vấn theo nhu cầu, ngân sách và mục đích sử dụng.</p></details><details><summary>Chính sách bảo hành và đổi trả như thế nào?</summary><p>Sản phẩm được hỗ trợ theo chính sách bảo hành của từng thương hiệu. Vui lòng liên hệ chúng tôi để được hướng dẫn chi tiết.</p></details><details><summary>Làm thế nào để liên hệ với dịch vụ khách hàng?</summary><p>Gọi 0313728397 hoặc gửi email đến info@themona.global, đội ngũ E-Tech sẽ phản hồi sớm nhất.</p></details></div></div>
            </div>
        </section>
    </main>

    <?php if (false): ?>
    <footer class="footer-section" id="footer"><div class="container"><div class="footer-grid"><div class="footer-col-about"><a href="index.html" class="logo"><div class="logo-icon"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div><span>E-Tech</span></a><p class="footer-about-text">Với chất lượng hàng đầu, chúng tôi cam kết mang đến cho khách hàng những trải nghiệm tuyệt vời và sự hài lòng tuyệt đối.</p><div class="social-title">Theo dõi</div><div class="social-links"><a href="#" class="social-icon">f</a><a href="#" class="social-icon">◎</a><a href="#" class="social-icon">in</a></div></div><div><h3 class="footer-col-title">Thông tin</h3><ul class="footer-menu"><li><a href="popular.html">Sản phẩm phổ biến</a></li><li><a href="introduction.html">Giới thiệu</a></li><li><a href="#faq">Câu hỏi thường gặp</a></li></ul></div><div><h3 class="footer-col-title">Danh mục</h3><ul class="footer-menu"><li><a href="phone.html">Điện thoại</a></li><li><a href="computer.html">Máy tính</a></li><li><a href="accessory.html">Phụ kiện</a></li></ul></div><div><h3 class="footer-col-title">Liên hệ</h3><div class="contact-detail-item"><strong>Hotline:</strong> 0313728397</div><div class="contact-detail-item"><strong>Email:</strong> info@themona.global</div><div class="contact-detail-item"><strong>Địa chỉ:</strong> 1073/23 Cách Mạng Tháng 8, TP.HCM</div></div></div><div class="footer-bottom"><div>© 2026 E-Tech Store. All Rights Reserved.</div><div>Chính sách bảo mật | Điều khoản dịch vụ</div></div></div></footer>
    <?php endif; include 'footer.php'; ?>
    <button class="back-to-top" id="backToTop" aria-label="Cuộn lên đầu trang"><svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/><polyline points="18 9 12 3 6 9"/></svg></button>
    <script src="js/main.js"></script>
</body>
</html>
