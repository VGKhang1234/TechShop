<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Tech | Cửa Hàng Bán Lẻ Thiết Bị Công Nghệ Hàng Đầu</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php $activePage = 'home'; include 'header.php'; if (false): ?>

    <!-- ==================== TOP ANNOUNCEMENT BAR ==================== -->
    <div class="announcement-bar">
        <div class="container">
            <span>Đặt hàng trực tuyến gọi cho chúng tôi <strong>0313728397</strong></span>
            <span class="announcement-sep">•</span>
            <span>Giao hàng miễn phí cho đơn hàng trên 1,000,000 đ</span>
            <span class="announcement-sep">•</span>
            <span>Đăng ký tài khoản để được giảm giá -15% cho tất cả các sản phẩm đã kích hoạt</span>
        </div>
    </div>

    <!-- ==================== TOP BAR ==================== -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="top-bar-item">
                    <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>Hotline: 0313728397</span>
                </div>
                <div class="top-bar-item">
                    <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <span>Email: info@themona.global</span>
                </div>
            </div>
            <div class="top-bar-right">
                <div class="top-bar-item"><span>Tiếng Việt / VNĐ</span></div>
                <div class="top-bar-item"><a href="#">Hỗ trợ khách hàng</a></div>
                <div class="top-bar-item"><a href="#">Theo dõi đơn hàng</a></div>
            </div>
        </div>
    </div>

    <!-- ==================== MAIN HEADER ==================== -->
    <header class="main-header">
        <div class="container">
            <!-- LOGO -->
            <a href="index.html" class="logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                </div>
                <span>E-Tech</span>
            </a>

            <!-- SEARCH BAR -->
            <div class="header-search">
                <select>
                    <option value="all">Tất cả danh mục</option>
                    <option value="audio">Tai Nghe & Âm Thanh</option>
                    <option value="smartwatch">Đồng Hồ Thông Minh</option>
                    <option value="tv">Smart TV & Camera</option>
                    <option value="gaming">Thiết Bị Gaming & VR</option>
                </select>
                <input type="text" placeholder="Tìm kiếm sản phẩm công nghệ...">
                <button type="button">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </button>
            </div>

            <!-- HEADER ACTIONS -->
            <div class="header-actions">
                <a href="login.html" class="action-btn" aria-label="Đăng nhập tài khoản">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div class="action-info">
                        <span class="action-sub">Xin chào</span>
                        <span class="action-title">Tài Khoản</span>
                    </div>
                </a>

                <div class="action-btn">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        <span class="badge">0</span>
                    </div>
                </div>

                <div class="action-btn">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                        <span class="badge">2</span>
                    </div>
                    <div class="action-info">
                        <span class="action-sub">Giỏ hàng</span>
                        <span class="action-title">1.750.000 đ</span>
                    </div>
                </div>

                <button class="mobile-toggle" id="mobileToggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- NAVIGATION BAR -->
    <nav class="nav-bar">
        <div class="container">
            <div class="nav-links" id="navLinks">
                <a href="#" class="active">Trang Chủ</a>
                <a href="introduction.html">Giới Thiệu</a>
                <a href="product-detail.html">Sản Phẩm</a>
                <a href="news.html">Tin Tức</a>
                <a href="contact.html">Liên Hệ</a>
                <a href="#">Xu Hướng</a>
                <a href="#">Bán Chạy</a>
            </div>
            <div class="nav-promo">
                ⚡ Giảm giá lên đến 50% cho thành viên mới
            </div>
        </div>
    </nav>

    <!-- ==================== CATEGORY NAVIGATION STRIP ==================== -->
    <nav class="category-strip">
        <div class="container">
            <div class="category-strip-links">
                <a href="popular.html" class="category-strip-item">
                    <svg viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                    <span>Phổ biến</span>
                </a>
                <a href="phone.html" class="category-strip-item">
                    <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                    <span>Điện thoại</span>
                </a>
                <a href="computer.html" class="category-strip-item">
                    <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    <span>Máy tính</span>
                </a>
                <a href="accessory.html" class="category-strip-item">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    <span>Phụ kiện</span>
                </a>
                <a href="headphone.html" class="category-strip-item">
                    <svg viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
                    <span>Tai nghe</span>
                </a>
                <a href="watch.html" class="category-strip-item">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="7"/><polyline points="12 9 12 12 13.5 13.5"/><path d="M16.51 17.35l-.35 3.83a2 2 0 0 1-2 1.82H9.83a2 2 0 0 1-2-1.82l-.35-3.83m.01-10.7l.35-3.83A2 2 0 0 1 9.83 1h4.35a2 2 0 0 1 2 1.82l.35 3.83"/></svg>
                    <span>Smart Watch</span>
                </a>
                <a href="webcam.html" class="category-strip-item">
                    <svg viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    <span>Web Cam</span>
                </a>
            </div>
            <a href="tel:0313728397" class="category-strip-hotline">
                <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span>0313728397</span>
            </a>
        </div>
    </nav>

<?php endif; ?>
    <!-- ==================== HERO SECTION ==================== -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-grid">
                <!-- HERO CONTENT -->
                <div class="hero-content">
                    <span class="hero-subtitle">KHÁM PHÁ MỚI MÈ</span>
                    <h1 class="hero-title">Smart Watch</h1>
                    <p class="hero-desc">Electronics stores are renowned for being the first to showcase new gadgets and devices.</p>
                    
                    <!-- COUNTDOWN TIMER -->
                    <div class="countdown-container">
                        <div class="timer-box">
                            <div class="timer-num" id="timer-days">262</div>
                            <div class="timer-label">NGÀY</div>
                        </div>
                        <div class="timer-box">
                            <div class="timer-num" id="timer-hours">17</div>
                            <div class="timer-label">GIỜ</div>
                        </div>
                        <div class="timer-box">
                            <div class="timer-num" id="timer-minutes">09</div>
                            <div class="timer-label">PHÚT</div>
                        </div>
                        <div class="timer-box">
                            <div class="timer-num" id="timer-seconds">45</div>
                            <div class="timer-label">GIÂY</div>
                        </div>
                    </div>

                    <a href="#" class="btn-primary">
                        <span>Mua Ngay</span>
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

                <!-- HERO MEDIA -->
                <div class="hero-media">
                    <div class="hero-badge">
                        <span class="percent">-20%</span>
                        <span class="off">OFF</span>
                    </div>
                    <div class="hero-img-wrapper">
                        <img src="img/12.png" alt="Smart Watch Pro" class="hero-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== SERVICES FEATURE BAR ==================== -->
    <section class="services-section">
        <div class="container">
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    </div>
                    <div>
                        <div class="service-title">Miễn Phí Giao Hàng</div>
                        <div class="service-sub">Từ Đơn Hàng Trên 1,000,000đ</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
                    </div>
                    <div>
                        <div class="service-title">Hỗ Trợ 24/7</div>
                        <div class="service-sub">Nhận Hỗ Trợ Trực Tuyến 24/7</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="12" y1="12" x2="12" y2="12.01"/><path d="M17 9A5 5 0 0 0 7 9"/></svg>
                    </div>
                    <div>
                        <div class="service-title">Hoàn Tiền</div>
                        <div class="service-sub">Hoàn Trả Trong Vòng 15 Ngày</div>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
                    </div>
                    <div>
                        <div class="service-title">Mã Quà Tặng</div>
                        <div class="service-sub">Nhận Mã Khuyến Mãi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== PROMO BANNERS GRID SECTION ==================== -->
    <section class="promo-grid-section">
        <div class="container">
            <div class="promo-top-row">
                <div class="promo-banner-card bg-tab-banner">
                    <div>
                        <div class="sub-price-red">Mua chỉ với 6,000,000 đ</div>
                        <h2 class="promo-card-title">Samsung<br>Galaxy Tab A8</h2>
                        <p class="promo-card-desc">Samsung Galaxy Tab A8 64GB WiFi Grey là máy tính bảng tầm trung</p>
                        <a href="#" class="btn-primary">
                            <span>Mua Ngay</span>
                            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                    <div style="position: relative; text-align: center;">
                        <div class="badge-starburst">
                            <span>-20%</span>
                            <span style="font-size: 0.65rem;">OFF</span>
                        </div>
                        <img src="img/samsung-galaxy-tab-a8-thumb-1-600x600.png" alt="Samsung Galaxy Tab A8" class="promo-card-img">
                    </div>
                </div>

                <div class="promo-banner-card bg-meta-banner">
                    <div>
                        <div class="pill-yellow-tag">Mua ngay chỉ với 4,990,000 đ</div>
                        <h2 class="promo-card-title">Meta Quest 2<br>256GB</h2>
                        <p class="promo-card-desc">Meta là cái tên mới thay thế Oculus</p>
                        <a href="#" class="btn-white">
                            <span>Mua Ngay</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                    <div style="text-align: center;">
                        <img src="img/-q1kinh-thuc-te-ao-oculus-quest-2-min-mobile-q4_result_9f730879c9cd4d63b416244b08208f82_grande.webp" alt="Meta Quest 2 256GB" class="promo-card-img">
                    </div>
                </div>
            </div>

            <div class="promo-bottom-row">
                <div class="promo-small-card bg-card-pink">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="img/AirPods-Max-USBC-Orange-A.png" alt="Apple AirPods Max Space Orange" class="promo-small-img">
                    </div>
                    <div>
                        <div class="tag-sub-pink">Hàng mới về</div>
                        <h3 style="font-size: 1.35rem; font-weight: 800; margin-bottom: 16px;">Apple AirPods Max Space Orange</h3>
                        <a href="#" class="btn-outline-pink">Mua Ngay</a>
                    </div>
                </div>

                <div class="promo-small-card bg-card-green">
                    <div>
                        <div class="pill-green-tag">Ưu đãi hấp dẫn</div>
                        <h3 style="font-size: 1.35rem; font-weight: 800; margin-bottom: 8px;">Apple Smart Watch Pro</h3>
                        <div style="margin-bottom: 16px;">
                            <span class="price-green">6,990,000 đ</span>
                            <span style="text-decoration: line-through; color: var(--muted-text); font-size: 0.9rem; margin-left: 8px;">7,990,000 đ</span>
                        </div>
                        <a href="#" class="btn-dark">
                            <span>Mua Ngay</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                    <div style="text-align: right; margin-top: -10px;">
                        <img src="img/10.png" alt="Apple Smart Watch Pro" class="promo-small-img">
                    </div>
                </div>

                <div class="promo-small-card bg-card-yellow">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="img/mirrorless-camera-fujifilm-x-t5-1500x1500.png" alt="Máy ảnh lấy liền Fujifilm" class="promo-small-img">
                    </div>
                    <div>
                        <div class="tag-sub-pink" style="color: #D97706;">Hàng mới về</div>
                        <h3 style="font-size: 1.35rem; font-weight: 800; margin-bottom: 16px;">Máy ảnh lấy liền Fujifilm</h3>
                        <a href="#" class="btn-outline-pink" style="border-color: #D97706; color: #D97706;">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FEATURED PRODUCTS SECTION (SẢN PHẨM NỔI BẬT) ==================== -->
    <section class="featured-products-section">
        <div class="container">
            <div class="featured-header">
                <div>
                    <div class="section-subtitle">KHUYẾN MÃI LỚN</div>
                    <h2 class="section-title">Sản Phẩm Nổi Bật</h2>
                </div>
                <div class="mini-countdown">
                    <div class="mini-timer-box">20</div>
                    <span>:</span>
                    <div class="mini-timer-box">11</div>
                    <span>:</span>
                    <div class="mini-timer-box">34</div>
                    <span>:</span>
                    <div class="mini-timer-box">59</div>
                </div>
            </div>

            <div class="featured-grid">
                <!-- CARD 1 -->
                <div class="featured-card">
                    <div class="discount-badge">-5%</div>
                    <div class="featured-card-media">
                        <img src="img/9-interactive-vr-headset.webp" alt="Sony PlayStation VR2">
                    </div>
                    <div>
                        <div class="featured-cat">Kính VR</div>
                        <h3 class="featured-title"><a href="#">Sony PlayStation VR2 Approx. 110°, Communication With PS5</a></h3>
                        <div class="product-rating">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="stock-progress-container">
                            <div class="stock-text">Avaiable : <span>3/142</span></div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: 15%;"></div>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price-old">1,205,000 đ</span>
                            <span class="price-new">1,150,000 đ</span>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="featured-card">
                    <div class="discount-badge">-3%</div>
                    <div class="featured-card-media">
                        <img src="img/-q1kinh-thuc-te-ao-oculus-quest-2-min-mobile-q4_result_9f730879c9cd4d63b416244b08208f82_grande.webp" alt="Meta Quest 2 128 GB">
                    </div>
                    <div>
                        <div class="featured-cat">Kính VR</div>
                        <h3 class="featured-title"><a href="#">Meta Quest 2 128 GB Tất Cả-In-One VR System Blazing-Fast Processor</a></h3>
                        <div class="product-rating">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="stock-progress-container">
                            <div class="stock-text">Avaiable : <span>10/135</span></div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: 25%;"></div>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price-old">950,000 đ</span>
                            <span class="price-new">925,000 đ</span>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="featured-card">
                    <div class="discount-badge">-40%</div>
                    <div class="featured-card-media">
                        <img src="img/13.png" alt="Rapoo N100 Wired Optical Mouse">
                    </div>
                    <div>
                        <div class="featured-cat">Chuột máy tính</div>
                        <h3 class="featured-title"><a href="#">Rapoo N100 Wired Optical Mouse Hand Orientation: Both Hands</a></h3>
                        <div class="product-rating">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="stock-progress-container">
                            <div class="stock-text">Avaiable : <span>9/136</span></div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: 20%;"></div>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price-old">1,000,000 đ</span>
                            <span class="price-new">600,000 đ</span>
                        </div>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="featured-card">
                    <div class="discount-badge">-25%</div>
                    <div class="featured-card-media">
                        <img src="img/14.png" alt="Fantech T533 Wired Premium Office Mouse">
                    </div>
                    <div>
                        <div class="featured-cat">Chuột máy tính</div>
                        <h3 class="featured-title"><a href="#">Fantech T533 Wired Premium Office Mouse Durable And Smooth</a></h3>
                        <div class="product-rating">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="stock-progress-container">
                            <div class="stock-text">Avaiable : <span>4/141</span></div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: 12%;"></div>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price-old">2,000,000 đ</span>
                            <span class="price-new">1,500,000 đ</span>
                        </div>
                    </div>
                </div>

                <!-- CARD 5 -->
                <div class="featured-card">
                    <div class="discount-badge">-25%</div>
                    <div class="featured-card-media">
                        <img src="img/16.png" alt="DJI Avata Fly Smart Drone Combo">
                    </div>
                    <div>
                        <div class="featured-cat">Flycam Drone</div>
                        <h3 class="featured-title"><a href="#">DJI Avata Fly Smart Drone Combo & FPV Goggles V2 With Avata</a></h3>
                        <div class="product-rating">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="stock-progress-container">
                            <div class="stock-text">Avaiable : <span>4/141</span></div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: 18%;"></div>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price-old">2,000,000 đ</span>
                            <span class="price-new">1,500,000 đ</span>
                        </div>
                    </div>
                </div>

                <!-- CARD 6 -->
                <div class="featured-card">
                    <div class="discount-badge">-25%</div>
                    <div class="featured-card-media">
                        <img src="img/17.png" alt="DJI Mini 3 Pro Drone">
                    </div>
                    <div>
                        <div class="featured-cat">Flycam Drone</div>
                        <h3 class="featured-title"><a href="#">DJI Mini 3 Pro Drone With RC Controller (Standard Version)</a></h3>
                        <div class="product-rating">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="stock-progress-container">
                            <div class="stock-text">Avaiable : <span>1/144</span></div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: 8%;"></div>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price-old">2,000,000 đ</span>
                            <span class="price-new">1,500,000 đ</span>
                        </div>
                    </div>
                </div>

                <!-- CARD 7 -->
                <div class="featured-card">
                    <div class="discount-badge">-25%</div>
                    <div class="featured-card-media">
                        <img src="img/18.png" alt="DJI Mavic Mini FLY More Drone">
                    </div>
                    <div>
                        <div class="featured-cat">Flycam Drone</div>
                        <h3 class="featured-title"><a href="#">DJI Mavic Mini FLY More Drone Combo GPS Precise Hover</a></h3>
                        <div class="product-rating">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="stock-progress-container">
                            <div class="stock-text">Avaiable : <span>3/142</span></div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: 15%;"></div>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price-old">2,000,000 đ</span>
                            <span class="price-new">1,500,000 đ</span>
                        </div>
                    </div>
                </div>

                <!-- CARD 8 -->
                <div class="featured-card">
                    <div class="discount-badge">-25%</div>
                    <div class="featured-card-media">
                        <img src="img/19.png" alt="VEGA INSTA GLAM 1000 HAIR DRYER">
                    </div>
                    <div>
                        <div class="featured-cat">Mouse</div>
                        <h3 class="featured-title"><a href="#">VEGA INSTA GLAM 1000 HAIR DRYER Hair Dryer (1000 W, Pink, White)</a></h3>
                        <div class="product-rating">
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="stock-progress-container">
                            <div class="stock-text">Avaiable : <span>0/145</span></div>
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill" style="width: 0%;"></div>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price-old">200,000 đ</span>
                            <span class="price-new">150,000 đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="#" class="btn-primary" style="padding: 16px 40px;">
                    <span>Xem Tất Cả</span>
                    <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ==================== PRODUCTS & PROMO BANNER ==================== -->
    <section class="products-section">
        <div class="container">
            <div class="products-grid-layout">
                
                <!-- SIDE BANNER -->
                <div class="promo-side-banner">
                    <div>
                        <h2 class="promo-banner-title">Apple AirPod Max Space Orange</h2>
                        <a href="#" class="btn-yellow">
                            <span>Khám Phá Ngay</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                    <div class="promo-banner-img">
                        <img src="img/AirPods-Max-USBC-Orange-A.png" alt="Apple AirPod Max Space Orange">
                    </div>
                </div>

                <!-- PRODUCT CARDS GRID (6 ITEMS) -->
                <div class="product-cards-grid">
                    
                    <!-- ITEM 1 -->
                    <div class="product-card">
                        <div class="product-thumb">
                            <img src="img/9-interactive-vr-headset.webp" alt="Sony PlayStation VR2">
                        </div>
                        <div class="product-details">
                            <h3 class="product-name"><a href="#">Sony PlayStation VR2 Approx. 11...</a></h3>
                            <div class="product-rating">
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <div class="product-price">
                                <span class="price-old">1,205,000 đ</span>
                                <span class="price-new">1,150,000 đ</span>
                            </div>
                        </div>
                        <div class="card-actions-hover">
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg></button>
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                        </div>
                    </div>

                    <!-- ITEM 2 -->
                    <div class="product-card">
                        <div class="product-thumb">
                            <img src="img/mirrorless-camera-fujifilm-x-t5-1500x1500.png" alt="Sony Camera">
                        </div>
                        <div class="product-details">
                            <h3 class="product-name"><a href="#">Sony HXR-NX200 Full HD comp...</a></h3>
                            <div class="product-rating">
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <div class="product-price">
                                <span class="price-old">1,000,000 đ</span>
                                <span class="price-new">950,000 đ</span>
                            </div>
                        </div>
                        <div class="card-actions-hover">
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg></button>
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                        </div>
                    </div>

                    <!-- ITEM 3 -->
                    <div class="product-card">
                        <div class="product-thumb">
                            <img src="img/-q1kinh-thuc-te-ao-oculus-quest-2-min-mobile-q4_result_9f730879c9cd4d63b416244b08208f82_grande.webp" alt="Meta Quest 2 128 GB">
                        </div>
                        <div class="product-details">
                            <h3 class="product-name"><a href="#">Meta Quest 2 128 GB Tất cả-in...</a></h3>
                            <div class="product-rating">
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <div class="product-price">
                                <span class="price-old">950,000 đ</span>
                                <span class="price-new">925,000 đ</span>
                            </div>
                        </div>
                        <div class="card-actions-hover">
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg></button>
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                        </div>
                    </div>

                    <!-- ITEM 4 -->
                    <div class="product-card">
                        <div class="product-thumb">
                            <img src="img/12.png" alt="HD Android Voice Control Smart TV">
                        </div>
                        <div class="product-details">
                            <h3 class="product-name"><a href="#">HD Android Voice Control Smar...</a></h3>
                            <div class="product-rating">
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <div class="product-price">
                                <span class="price-old">2,500,000 đ</span>
                                <span class="price-new">2,000,000 đ</span>
                            </div>
                        </div>
                        <div class="card-actions-hover">
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg></button>
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                        </div>
                    </div>

                    <!-- ITEM 5 -->
                    <div class="product-card">
                        <div class="product-thumb">
                            <img src="img/15.png" alt="Rapoo N100 Wired Optical Mouse">
                        </div>
                        <div class="product-details">
                            <h3 class="product-name"><a href="#">Rapoo N100 Wired Optical Mou...</a></h3>
                            <div class="product-rating">
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <div class="product-price">
                                <span class="price-old">1,000,000 đ</span>
                                <span class="price-new">600,000 đ</span>
                            </div>
                        </div>
                        <div class="card-actions-hover">
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg></button>
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                        </div>
                    </div>

                    <!-- ITEM 6 -->
                    <div class="product-card">
                        <div class="product-thumb">
                            <img src="img/10.png" alt="Apple Smart Watch Pro">
                        </div>
                        <div class="product-details">
                            <h3 class="product-name"><a href="#">HD Android Voice Control Smar...</a></h3>
                            <div class="product-rating">
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg class="active" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <div class="product-price">
                                <span class="price-old">2,000,000 đ</span>
                                <span class="price-new">1,700,000 đ</span>
                            </div>
                        </div>
                        <div class="card-actions-hover">
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg></button>
                            <button class="btn-icon-action"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ==================== BRAND LOGOS SECTION ==================== -->
    <section class="brands-section">
        <div class="container">
            <div class="brands-grid">
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <circle cx="20" cy="20" r="14" fill="none" stroke="#DC2626" stroke-width="4"/>
                        <text x="45" y="28" font-family="Arial Black" font-size="22" fill="#0F172A">BOSCH</text>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <text x="10" y="28" font-family="Arial" font-weight="800" font-style="italic" font-size="22" fill="#2563EB">Flipkart</text>
                        <rect x="105" y="10" width="16" height="16" fill="#F59E0B" rx="3"/>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <path d="M20,30 C12,30 10,20 15,10 C20,0 20,0 20,0 C20,0 20,0 25,10 C30,20 28,30 20,30 Z" fill="none" stroke="#FF5A5F" stroke-width="3"/>
                        <text x="45" y="28" font-family="Arial" font-weight="700" font-size="22" fill="#FF5A5F">airbnb</text>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <text x="15" y="28" font-family="Arial" font-weight="800" font-size="24" fill="#10B981">Careem</text>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <rect x="15" y="5" width="130" height="30" fill="#E54834"/>
                        <text x="80" y="27" font-family="Arial Black" font-size="20" fill="#FFFFFF" text-anchor="middle">MARVEL</text>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <polygon points="20,10 24,18 32,18 26,24 28,32 20,27 12,32 14,24 8,18 16,18" fill="#15803D"/>
                        <text x="40" y="28" font-family="Arial" font-weight="800" font-size="20" fill="#15803D">Heineken</text>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <text x="15" y="28" font-family="Arial" font-weight="800" font-size="22" fill="#F97316">HubSpot</text>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <text x="15" y="28" font-family="Arial Black" font-size="22" fill="#BF125D">Rakuten</text>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <text x="15" y="28" font-family="Arial Black" font-size="24" fill="#4F46E5">Fed<tspan fill="#F97316">Ex</tspan></text>
                    </svg>
                </div>
                <div class="brand-card">
                    <svg viewBox="0 0 160 40">
                        <path d="M25 10 C25 10 35 20 35 28 C35 34 30 38 25 38 C20 38 15 34 15 28 C15 22 22 15 25 10 Z" fill="#E11D48"/>
                        <text x="45" y="28" font-family="Arial" font-weight="800" font-size="22" fill="#E11D48">tinder</text>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== LATEST NEWS SECTION ==================== -->
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <div>
                    <div class="section-subtitle">ĐỌC TIN TỨC MỚI NHẤT</div>
                    <h2 class="section-title">Tin Tức Mới Nhất</h2>
                </div>
                <a href="#" class="btn-yellow">
                    <span>Xem Tất Cả</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>

            <div class="news-grid">
                <article class="news-card">
                    <div class="news-img">
                        <img src="img/pexels-dom-bucci-981062-scaled-1.jpg" alt="Revolutionizing Electronics">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="meta-item">🏷️ Điện tử</span>
                            <span class="meta-item">💬 3 Bình luận</span>
                            <span class="meta-item">⏱️ 3 Min Read</span>
                        </div>
                        <h3 class="news-title"><a href="#">Revolutionizing Electronics, Redefining Possibilities</a></h3>
                        <p class="news-excerpt">iPad Pro is the fastest device of its kind. It's designed to take full advantage of next-level...</p>
                        <a href="#" class="news-link">
                            <span>Đọc ngay</span>
                            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-img">
                        <img src="img/pexels-karolina-grabowska-4887246.jpg" alt="10 Ideas to Create the Man Cave">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="meta-item">🏷️ Điện tử</span>
                            <span class="meta-item">💬 0 Bình luận</span>
                            <span class="meta-item">⏱️ 4 Min Read</span>
                        </div>
                        <h3 class="news-title"><a href="#">10 Ideas to Create the Man Cave You've Always Wanted</a></h3>
                        <p class="news-excerpt">These ideas should help you get started on creating the man cave of your dreams! Let me...</p>
                        <a href="#" class="news-link">
                            <span>Đọc ngay</span>
                            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ==================== NEWSLETTER SECTION ==================== -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-card">
                <div class="newsletter-media">
                    <img src="img/drone.png" alt="Drone" class="newsletter-drone-img">
                </div>

                <div class="newsletter-content">
                    <h2 class="newsletter-title">Nhận Mọi Cập Nhật</h2>
                    <p class="newsletter-desc">Become a premium member and get 20% off your next purchase!</p>

                    <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Cảm ơn bạn đã đăng ký nhận thông tin!');">
                        <div class="input-group">
                            <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            <input type="email" placeholder="Nhập email..." required>
                        </div>
                        <button type="submit" class="btn-yellow-sub">Đăng Ký Ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FOOTER SECTION ==================== -->
    <?php if (false): ?>
    <footer class="footer-section">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col-about">
                    <a href="index.html" class="logo">
                        <div class="logo-icon">
                            <svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                        </div>
                        <span>E-Tech</span>
                    </a>
                    <p class="footer-about-text">
                        Với chất lượng hàng đầu, chúng tôi cam kết mang đến cho khách hàng những trải nghiệm tuyệt vời và sự hài lòng tuyệt đối.
                    </p>
                    <div class="social-title">Theo dõi</div>
                    <div class="social-links">
                        <a href="#" class="social-icon"><svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                        <a href="#" class="social-icon"><svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg></a>
                        <a href="#" class="social-icon"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
                        <a href="#" class="social-icon"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12c0 4.25 2.67 7.9 6.42 9.39.12-.66.23-1.67.04-2.39-.17-.67-1.12-4.75-1.12-4.75s-.28-.57-.28-1.42c0-1.33.77-2.32 1.73-2.32.82 0 1.21.61 1.21 1.34 0 .82-.52 2.05-.79 3.19-.22.95.48 1.73 1.42 1.73 1.7 0 3.01-1.79 3.01-4.37 0-2.29-1.64-3.89-3.99-3.89-2.72 0-4.31 2.04-4.31 4.15 0 .82.31 1.7.71 2.18.08.1.09.18.06.31-.07.29-.23.95-.26 1.08-.04.18-.15.22-.34.13-1.28-.6-2.08-2.47-2.08-3.98 0-3.24 2.35-6.21 6.79-6.21 3.56 0 6.33 2.54 6.33 5.93 0 3.54-2.23 6.39-5.33 6.39-1.04 0-2.02-.54-2.36-1.18l-.64 2.45c-.23.89-.86 2.01-1.28 2.69C10.02 21.84 11 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2z"/></svg></a>
                    </div>
                </div>

                <div>
                    <h3 class="footer-col-title">Thông tin</h3>
                    <ul class="footer-menu">
                        <li><a href="#">Xu Hướng</a></li>
                        <li><a href="#">Bán Chạy</a></li>
                        <li><a href="#">Giảm Giá</a></li>
                        <li><a href="#">Sản Phẩm Mới</a></li>
                        <li><a href="#">Còn Hàng</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-col-title">Danh mục</h3>
                    <ul class="footer-menu">
                        <li><a href="#">Trang Chủ</a></li>
                        <li><a href="#">Giới Thiệu</a></li>
                        <li><a href="#">Sản Phẩm</a></li>
                        <li><a href="#">Tin Tức</a></li>
                        <li><a href="#">Liên Hệ</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-col-title">Liên kết</h3>
                    <ul class="footer-menu">
                        <li><a href="login.html">Tài Khoản</a></li>
                        <li><a href="#">Đơn Hàng</a></li>
                        <li><a href="#">Mục Yêu Thích</a></li>
                        <li><a href="#">Hoàn Trả</a></li>
                        <li><a href="#">Chính Sách</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-col-title">Thông tin cửa hàng</h3>
                    <div class="store-contact-card">
                        <div class="phone-icon-box">
                            <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <div class="contact-sub">Bạn cần trợ giúp?</div>
                            <div class="contact-phone">0313728397</div>
                        </div>
                    </div>
                    <div class="contact-detail-item">
                        <strong>Địa chỉ:</strong> 1073/23 Cách Mạng Tháng 8, P.7, Q.Tân Bình, TP.HCM
                    </div>
                    <div class="contact-detail-item">
                        <strong>Email:</strong> info@themona.global
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div>© 2026 E-Tech Store. All Rights Reserved. Designed with HTML & CSS.</div>
                <div>Chính sách bảo mật | Điều khoản dịch vụ</div>
            </div>
        </div>
    </footer>
    <?php endif; include 'footer.php'; ?>

    <!-- BACK TO TOP BUTTON -->
    <button class="back-to-top" id="backToTop" aria-label="Cuộn lên đầu trang">
        <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/><polyline points="18 9 12 3 6 9"/></svg>
    </button>

    <!-- Custom JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>
