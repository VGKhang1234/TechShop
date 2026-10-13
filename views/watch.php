<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng Hồ Thông Minh & Smart Watch | E-Tech</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php $activePage = 'products'; $headerCategory = 'watch'; include 'header.php'; if (false): ?>

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
<div class="top-bar"><div class="container"><div class="top-bar-left"><div class="top-bar-item"><span>Hotline: 0313728397</span></div><div class="top-bar-item"><span>Email: info@themona.global</span></div></div><div class="top-bar-right"><div class="top-bar-item"><span>Tiếng Việt / VNĐ</span></div><div class="top-bar-item"><a href="#">Hỗ trợ khách hàng</a></div><div class="top-bar-item"><a href="#">Theo dõi đơn hàng</a></div></div></div></div>
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
                    <option value="watch" selected>Smart Watch</option>
                    <option value="all">Tất cả danh mục</option>
                    <option value="phone">Điện Thoại</option>
                    <option value="computer">Máy Tính & Laptop</option>
                    <option value="headphone">Tai Nghe</option>
                    <option value="webcam">Web Cam</option>
                    <option value="accessory">Phụ Kiện</option>
                </select>
                <input type="text" placeholder="Tìm kiếm đồng hồ thông minh, smart watch...">
                <button type="button" aria-label="Tìm kiếm">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </button>
            </div>

            <!-- HEADER ACTIONS -->
            <div class="header-actions">
                <div class="action-btn">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div class="action-info">
                        <span class="action-sub">Xin chào</span>
                        <span class="action-title">Tài Khoản</span>
                    </div>
                </div>

                <div class="action-btn">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        <span class="badge">0</span>
                    </div>
                </div>

                <div class="action-btn">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                        <span class="badge">0</span>
                    </div>
                    <div class="action-info">
                        <span class="action-sub">Giỏ hàng</span>
                        <span class="action-title">0 đ</span>
                    </div>
                </div>

                <button class="mobile-toggle" id="mobileToggle" aria-label="Mở menu">
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
                <a href="#">Giới Thiệu</a>
                <a href="product-detail.html">Sản Phẩm</a>
                <a href="#">Tin Tức</a>
                <a href="#">Liên Hệ</a>
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
                <a href="watch.html" class="category-strip-item active">
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

    <!-- ==================== MAIN CONTENT CONTAINER ==================== -->
    <main class="container">
        <!-- BREADCRUMBS -->
        <div class="catalog-breadcrumb">
            <a href="index.html">Trang chủ</a>
            <span class="crumb-sep">/</span>
            <span class="crumb-current">Smart Watch</span>
        </div>

    <?php endif; ?>
        <!-- CATEGORY HERO BANNER -->
        <section class="category-hero">
            <div class="category-hero-info">
                <span class="category-hero-badge">Sống Khỏe Mỗi Ngày</span>
                <h1 class="category-hero-title">Đồng Hồ Thông Minh</h1>
                <p class="category-hero-desc">
                    Trợ lý sức khỏe thông minh trên cổ tay bạn: Đo nhịp tim, nồng độ oxy trong máu SpO2, theo dõi giấc ngủ và hỗ trợ hơn 100 chế độ tập luyện thể thao chuyên nghiệp.
                </p>
            </div>
            <div class="category-hero-icon">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="7"/><polyline points="12 9 12 12 13.5 13.5"/><path d="M16.51 17.35l-.35 3.83a2 2 0 0 1-2 1.82H9.83a2 2 0 0 1-2-1.82l-.35-3.83m.01-10.7l.35-3.83A2 2 0 0 1 9.83 1h4.35a2 2 0 0 1 2 1.82l.35 3.83"/></svg>
            </div>
        </section>

        <!-- CATALOG TOOLBAR -->
        <div class="catalog-toolbar">
            <div class="catalog-results-count">
                Hiển thị tất cả kết quả <strong id="catalogResultCount">6</strong>
            </div>
            <div class="catalog-toolbar-actions">
                <select class="catalog-sort-select" id="catalogSort" aria-label="Sắp xếp theo">
                    <option value="default">Thứ tự mặc định</option>
                    <option value="popularity">Mức độ phổ biến</option>
                    <option value="rating">Điểm đánh giá</option>
                    <option value="price-asc">Giá: Từ thấp đến cao</option>
                    <option value="price-desc">Giá: Từ cao đến thấp</option>
                </select>
                <div class="view-mode-group">
                    <button type="button" class="view-mode-btn active" id="btnGridView" aria-label="Xem dạng lưới">
                        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    </button>
                    <button type="button" class="view-mode-btn" id="btnListView" aria-label="Xem dạng danh sách">
                        <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- CATALOG LAYOUT (SIDEBAR + PRODUCTS) -->
        <div class="catalog-layout">
            <!-- SIDEBAR FILTERS -->
            <aside class="catalog-sidebar">
                <div class="sidebar-title">
                    <span>Bộ Lọc Sản Phẩm</span>
                </div>

                <!-- CATEGORIES -->
                <div class="sidebar-filter-block">
                    <h3 class="filter-block-title">Danh Mục Sản Phẩm</h3>
                    <div class="filter-categories-list">
                        <a href="popular.html" class="filter-cat-link"><span>★ Phổ biến</span><span class="count">8</span></a>
                        <a href="phone.html" class="filter-cat-link"><span>📱 Điện thoại</span><span class="count">7</span></a>
                        <a href="computer.html" class="filter-cat-link"><span>💻 Máy tính</span><span class="count">6</span></a>
                        <a href="accessory.html" class="filter-cat-link"><span>🔌 Phụ kiện</span><span class="count">8</span></a>
                        <a href="headphone.html" class="filter-cat-link"><span>🎧 Tai nghe</span><span class="count">6</span></a>
                        <a href="watch.html" class="filter-cat-link active"><span>⌚ Smart Watch</span><span class="count">6</span></a>
                        <a href="webcam.html" class="filter-cat-link"><span>📷 Web Cam</span><span class="count">6</span></a>
                    </div>
                </div>

                <!-- PRICE FILTER -->
                <div class="sidebar-filter-block">
                    <h3 class="filter-block-title">Khoảng Giá</h3>
                    <div class="filter-options-list">
                        <label class="filter-label"><input type="checkbox" class="filter-price-check" value="under-1m"><span>Dưới 1.000.000 đ</span></label>
                        <label class="filter-label"><input type="checkbox" class="filter-price-check" value="1m-5m"><span>1.000.000 đ - 5.000.000 đ</span></label>
                        <label class="filter-label"><input type="checkbox" class="filter-price-check" value="5m-15m"><span>5.000.000 đ - 15.000.000 đ</span></label>
                        <label class="filter-label"><input type="checkbox" class="filter-price-check" value="over-15m"><span>Trên 15.000.000 đ</span></label>
                    </div>
                </div>

                <!-- BRAND FILTER -->
                <div class="sidebar-filter-block">
                    <h3 class="filter-block-title">Thương Hiệu</h3>
                    <div class="filter-options-list">
                        <label class="filter-label"><input type="checkbox" class="filter-brand-check" value="apple"><span>Apple</span></label>
                        <label class="filter-label"><input type="checkbox" class="filter-brand-check" value="samsung"><span>Samsung</span></label>
                    </div>
                </div>

                <button type="button" class="btn-reset-filters" id="btnResetFilters">Đặt Lại Bộ Lọc</button>
            </aside>

            <!-- PRODUCTS LIST -->
            <div class="catalog-products-wrapper">
                <div class="products-catalog-grid" id="catalogProductsGrid">
                    
                    <!-- PRODUCT 1 (APPLE WATCH ULTRA 2) -->
                    <article class="product-shop-card" data-price="20490000" data-brand="apple" data-rating="5.0" data-sales="810">
                        <div class="card-top-badges">
                            <span class="badge-discount">-10%</span>
                            <span class="badge-hot">HOT</span>
                        </div>
                        <div class="card-image-box">
                            <img src="img/smartwatch-ultra.jpg" alt="Apple Watch Ultra 2 Titanium">
                            <div class="card-floating-actions">
                                <a href="product-detail.html" class="floating-action-btn" title="Xem chi tiết"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></a>
                                <button type="button" class="floating-action-btn btn-wishlist-action" title="Yêu thích"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                            </div>
                        </div>
                        <div class="card-body-content">
                            <span class="card-cat-name">Smart Watch / Thể thao cao cấp</span>
                            <h3 class="card-product-title"><a href="product-detail.html">Đồng hồ thông minh Apple Watch Ultra 2 GPS + Cellular 49mm Vỏ Titanium</a></h3>
                            <div class="card-rating-row">
                                <span class="card-stars">★★★★★</span>
                                <span class="card-reviews-num">(312 đánh giá)</span>
                            </div>
                            <div class="card-price-row">
                                <span class="card-new-price">20.490.000 đ</span>
                                <span class="card-old-price">22.990.000 đ</span>
                            </div>
                            <button type="button" class="card-add-cart-btn">
                                <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
                                <span>Thêm vào giỏ</span>
                            </button>
                        </div>
                    </article>

                    <!-- PRODUCT 2 (APPLE SMART WATCH PRO) -->
                    <article class="product-shop-card" data-price="6990000" data-brand="apple" data-rating="4.8" data-sales="540">
                        <div class="card-top-badges">
                            <span class="badge-discount">-12%</span>
                        </div>
                        <div class="card-image-box">
                            <img src="img/10.png" alt="Apple Smart Watch Pro Green">
                            <div class="card-floating-actions">
                                <a href="product-detail.html" class="floating-action-btn" title="Xem chi tiết"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></a>
                                <button type="button" class="floating-action-btn btn-wishlist-action" title="Yêu thích"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                            </div>
                        </div>
                        <div class="card-body-content">
                            <span class="card-cat-name">Smart Watch / Apple</span>
                            <h3 class="card-product-title"><a href="product-detail.html">Apple Smart Watch Pro Bản Thể Thao Dây Đeo Silicone Siêu Nhẹ</a></h3>
                            <div class="card-rating-row">
                                <span class="card-stars">★★★★★</span>
                                <span class="card-reviews-num">(184 đánh giá)</span>
                            </div>
                            <div class="card-price-row">
                                <span class="card-new-price">6.990.000 đ</span>
                                <span class="card-old-price">7.990.000 đ</span>
                            </div>
                            <button type="button" class="card-add-cart-btn">
                                <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
                                <span>Thêm vào giỏ</span>
                            </button>
                        </div>
                    </article>

                    <!-- PRODUCT 3 (VOICE CONTROL WATCH) -->
                    <article class="product-shop-card" data-price="2000000" data-brand="samsung" data-rating="4.7" data-sales="420">
                        <div class="card-top-badges">
                            <span class="badge-discount">-20%</span>
                        </div>
                        <div class="card-image-box">
                            <img src="img/12.png" alt="HD Android Voice Control Smart Watch">
                            <div class="card-floating-actions">
                                <a href="product-detail.html" class="floating-action-btn" title="Xem chi tiết"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></a>
                                <button type="button" class="floating-action-btn btn-wishlist-action" title="Yêu thích"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                            </div>
                        </div>
                        <div class="card-body-content">
                            <span class="card-cat-name">Smart Watch / Android</span>
                            <h3 class="card-product-title"><a href="product-detail.html">HD Android Voice Control Smart Watch Màn Hình AMOLED Siêu Sắc Nét</a></h3>
                            <div class="card-rating-row">
                                <span class="card-stars">★★★★☆</span>
                                <span class="card-reviews-num">(119 đánh giá)</span>
                            </div>
                            <div class="card-price-row">
                                <span class="card-new-price">2.000.000 đ</span>
                                <span class="card-old-price">2.500.000 đ</span>
                            </div>
                            <button type="button" class="card-add-cart-btn">
                                <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
                                <span>Thêm vào giỏ</span>
                            </button>
                        </div>
                    </article>

                    <!-- PRODUCT 4 (APPLE WATCH S9) -->
                    <article class="product-shop-card" data-price="10990000" data-brand="apple" data-rating="4.9" data-sales="650">
                        <div class="card-top-badges">
                            <span class="badge-discount">-15%</span>
                        </div>
                        <div class="card-image-box">
                            <img src="img/smartwatch-ultra.jpg" alt="Apple Watch Series 9">
                            <div class="card-floating-actions">
                                <a href="product-detail.html" class="floating-action-btn" title="Xem chi tiết"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></a>
                                <button type="button" class="floating-action-btn btn-wishlist-action" title="Yêu thích"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                            </div>
                        </div>
                        <div class="card-body-content">
                            <span class="card-cat-name">Smart Watch / Apple</span>
                            <h3 class="card-product-title"><a href="product-detail.html">Đồng hồ thông minh Apple Watch Series 9 GPS 45mm Nhôm Viền Đen</a></h3>
                            <div class="card-rating-row">
                                <span class="card-stars">★★★★★</span>
                                <span class="card-reviews-num">(230 đánh giá)</span>
                            </div>
                            <div class="card-price-row">
                                <span class="card-new-price">10.990.000 đ</span>
                                <span class="card-old-price">12.990.000 đ</span>
                            </div>
                            <button type="button" class="card-add-cart-btn">
                                <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
                                <span>Thêm vào giỏ</span>
                            </button>
                        </div>
                    </article>

                    <!-- PRODUCT 5 (E-TECH FIT PRO) -->
                    <article class="product-shop-card" data-price="1700000" data-brand="samsung" data-rating="4.7" data-sales="380">
                        <div class="card-top-badges">
                            <span class="badge-discount">-15%</span>
                        </div>
                        <div class="card-image-box">
                            <img src="img/10.png" alt="E-Tech Fit Pro Smart Watch">
                            <div class="card-floating-actions">
                                <a href="product-detail.html" class="floating-action-btn" title="Xem chi tiết"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></a>
                                <button type="button" class="floating-action-btn btn-wishlist-action" title="Yêu thích"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                            </div>
                        </div>
                        <div class="card-body-content">
                            <span class="card-cat-name">Smart Watch / Thể thao</span>
                            <h3 class="card-product-title"><a href="product-detail.html">Vòng đeo tay thông minh theo dõi sức khỏe E-Tech Fit Pro Chống Nước</a></h3>
                            <div class="card-rating-row">
                                <span class="card-stars">★★★★☆</span>
                                <span class="card-reviews-num">(87 đánh giá)</span>
                            </div>
                            <div class="card-price-row">
                                <span class="card-new-price">1.700.000 đ</span>
                                <span class="card-old-price">2.000.000 đ</span>
                            </div>
                            <button type="button" class="card-add-cart-btn">
                                <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
                                <span>Thêm vào giỏ</span>
                            </button>
                        </div>
                    </article>

                    <!-- PRODUCT 6 (SAMSUNG GALAXY WATCH 6) -->
                    <article class="product-shop-card" data-price="8490000" data-brand="samsung" data-rating="4.8" data-sales="490">
                        <div class="card-top-badges">
                            <span class="badge-discount">-15%</span>
                        </div>
                        <div class="card-image-box">
                            <img src="img/12.png" alt="Samsung Galaxy Watch 6">
                            <div class="card-floating-actions">
                                <a href="product-detail.html" class="floating-action-btn" title="Xem chi tiết"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></a>
                                <button type="button" class="floating-action-btn btn-wishlist-action" title="Yêu thích"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                            </div>
                        </div>
                        <div class="card-body-content">
                            <span class="card-cat-name">Smart Watch / Samsung</span>
                            <h3 class="card-product-title"><a href="product-detail.html">Samsung Galaxy Watch 6 Classic 47mm Viền Xoay Vật Lý Sang Trọng</a></h3>
                            <div class="card-rating-row">
                                <span class="card-stars">★★★★★</span>
                                <span class="card-reviews-num">(145 đánh giá)</span>
                            </div>
                            <div class="card-price-row">
                                <span class="card-new-price">8.490.000 đ</span>
                                <span class="card-old-price">9.990.000 đ</span>
                            </div>
                            <button type="button" class="card-add-cart-btn">
                                <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
                                <span>Thêm vào giỏ</span>
                            </button>
                        </div>
                    </article>

                </div>

                <!-- PAGINATION -->
                <div class="catalog-pagination">
                    <button class="page-num-btn active">1</button>
                    <button class="page-num-btn">2</button>
                    <button class="page-num-btn">→</button>
                </div>
            </div>
        </div>
    </main>

    <?php if (false): ?>
    <!-- ==================== FOOTER SECTION ==================== -->
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
                </div>
                <div>
                    <h3 class="footer-col-title">Danh mục nổi bật</h3>
                    <ul class="footer-menu">
                        <li><a href="phone.html">Điện thoại</a></li>
                        <li><a href="computer.html">Máy tính</a></li>
                        <li><a href="headphone.html">Tai nghe</a></li>
                        <li><a href="watch.html">Smart Watch</a></li>
                        <li><a href="webcam.html">Web Cam</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-col-title">Liên kết</h3>
                    <ul class="footer-menu">
                        <li><a href="index.html">Trang Chủ</a></li>
                        <li><a href="popular.html">Phổ biến</a></li>
                        <li><a href="accessory.html">Phụ kiện</a></li>
                        <li><a href="product-detail.html">Chi tiết sản phẩm</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-col-title">Hỗ trợ khách hàng</h3>
                    <div class="store-contact-card">
                        <div class="phone-icon-box">
                            <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <div class="contact-sub">Hotline 24/7</div>
                            <div class="contact-phone">0313728397</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div>© 2026 E-Tech Store. All Rights Reserved.</div>
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
