<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Tech Admin | Quản trị cửa hàng</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="admin-shell">
        <aside class="sidebar" id="sidebar">
            <a class="brand" href="index.html"><span class="brand-mark">ϟ</span><span>E-Tech <small>ADMIN</small></span></a>
            <div class="sidebar-label">TỔNG QUAN</div>
            <nav class="side-nav" aria-label="Điều hướng quản trị">
                <button class="nav-item active" data-section="dashboard"><span>▦</span> Tổng quan</button>
                <button class="nav-item" data-section="products"><span>▣</span> Sản phẩm</button>
                <button class="nav-item" data-section="categories"><span>◈</span> Danh mục</button>
                <button class="nav-item" data-section="orders"><span>⌁</span> Đơn hàng <b class="nav-count">8</b></button>
                <button class="nav-item" data-section="vouchers"><span>◇</span> Voucher</button>
                <button class="nav-item" data-section="reviews"><span>★</span> Đánh giá <b class="nav-count red">5</b></button>
            </nav>
            <div class="sidebar-footer"><a href="index.html">← Về trang cửa hàng</a><button id="logoutButton">Đăng xuất</button></div>
        </aside>

        <main class="main-content">
            <header class="topbar">
                <button class="menu-toggle" id="menuToggle" aria-label="Mở menu">☰</button>
                <div class="breadcrumb"><span>Trang quản trị</span><strong id="pageTitle">/ Tổng quan</strong></div>
                <div class="topbar-actions"><button class="icon-button" title="Thông báo">♧<i></i></button><div class="admin-user"><span class="avatar">AD</span><span><strong>Admin E-Tech</strong><small>Quản trị viên</small></span></div></div>
            </header>

            <div class="page-body">
                <section class="page-section active" id="dashboardSection">
                    <div class="section-heading"><div><p class="eyebrow">THỨ NĂM, 24 THÁNG 09, 2026</p><h1>Chào buổi sáng, Admin <span>✦</span></h1><p class="heading-note">Đây là tình hình kinh doanh của E-Tech hôm nay.</p></div><button class="btn primary" id="exportButton">⇩ Xuất báo cáo</button></div>
                    <div class="stat-grid">
                        <article class="stat-card"><div class="stat-icon coral">₫</div><div><span>Doanh thu tháng này</span><strong id="revenueStat">128.450.000 đ</strong><em class="up">↗ 12,8%</em></div><div class="spark coral-spark"></div></article>
                        <article class="stat-card"><div class="stat-icon yellow">◷</div><div><span>Đơn hàng mới</span><strong id="ordersStat">248</strong><em class="up">↗ 8,2%</em></div><div class="spark yellow-spark"></div></article>
                        <article class="stat-card"><div class="stat-icon blue">♙</div><div><span>Khách hàng</span><strong>1.842</strong><em class="up">↗ 5,4%</em></div><div class="spark blue-spark"></div></article>
                        <article class="stat-card"><div class="stat-icon navy">▣</div><div><span>Sản phẩm đang bán</span><strong id="productsStat">126</strong><em class="neutral">Ổn định</em></div><div class="spark navy-spark"></div></article>
                    </div>
                    <div class="dashboard-grid"><article class="panel revenue-panel"><div class="panel-head"><div><h2>Doanh thu</h2><p>Hiệu suất bán hàng trong năm 2026</p></div><select id="chartPeriod"><option>12 tháng qua</option><option>6 tháng qua</option><option>30 ngày qua</option></select></div><div class="chart"><div class="chart-y"><span>50tr</span><span>40tr</span><span>30tr</span><span>20tr</span><span>10tr</span><span>0</span></div><div class="chart-area"><div class="grid-lines"><i></i><i></i><i></i><i></i><i></i><i></i></div><svg viewBox="0 0 700 240" preserveAspectRatio="none" aria-label="Biểu đồ doanh thu"><defs><linearGradient id="chartFill" x1="0" x2="0" y1="0" y2="1"><stop offset="0" stop-color="#e54834" stop-opacity=".25"/><stop offset="1" stop-color="#e54834" stop-opacity="0"/></linearGradient></defs><path class="chart-fill" d="M0,180 C35,175 45,135 75,148 S120,175 150,128 S200,98 225,119 S270,110 300,80 S350,110 375,92 S425,45 450,72 S485,110 515,88 S550,55 580,66 S630,18 700,38 L700,240 L0,240 Z"/><path class="chart-line" d="M0,180 C35,175 45,135 75,148 S120,175 150,128 S200,98 225,119 S270,110 300,80 S350,110 375,92 S425,45 450,72 S485,110 515,88 S550,55 580,66 S630,18 700,38"/></svg><div class="chart-x"><span>T1</span><span>T2</span><span>T3</span><span>T4</span><span>T5</span><span>T6</span><span>T7</span><span>T8</span><span>T9</span><span>T10</span><span>T11</span><span>T12</span></div></div></div></article><article class="panel best-panel"><div class="panel-head"><div><h2>Sản phẩm bán chạy</h2><p>Top sản phẩm theo doanh thu</p></div><button class="text-button" data-section-link="products">Xem tất cả →</button></div><div class="best-list" id="bestProducts"></div></article></div>
                    <div class="dashboard-grid lower-grid"><article class="panel"><div class="panel-head"><div><h2>Đơn hàng gần đây</h2><p>Những đơn hàng cần xử lý</p></div><button class="text-button" data-section-link="orders">Xem tất cả →</button></div><div class="table-wrap"><table><thead><tr><th>Mã đơn</th><th>Khách hàng</th><th>Ngày đặt</th><th>Tổng tiền</th><th>Trạng thái</th></tr></thead><tbody id="recentOrders"></tbody></table></div></article><article class="panel review-summary"><div class="panel-head"><div><h2>Đánh giá mới</h2><p>Phản hồi mới nhất từ khách hàng</p></div><button class="text-button" data-section-link="reviews">Xem tất cả →</button></div><div id="recentReviews"></div></article></div>
                </section>

                <section class="page-section" id="productsSection"><div class="section-heading"><div><p class="eyebrow">QUẢN LÝ CATALOG</p><h1>Sản phẩm</h1><p class="heading-note">Quản lý kho hàng và thông tin sản phẩm.</p></div><button class="btn primary" data-modal="product">＋ Thêm sản phẩm</button></div><div class="toolbar"><div class="search-control">⌕<input id="productSearch" placeholder="Tìm theo tên, SKU..." /></div><select id="productCategoryFilter"><option value="all">Tất cả danh mục</option></select><select id="productStatusFilter"><option value="all">Tất cả trạng thái</option><option value="active">Đang bán</option><option value="inactive">Ngừng bán</option><option value="out_of_stock">Hết hàng</option></select></div><div class="panel"><div class="table-wrap"><table><thead><tr><th>Sản phẩm</th><th>SKU</th><th>Danh mục</th><th>Giá bán</th><th>Tồn kho</th><th>Trạng thái</th><th></th></tr></thead><tbody id="productsTable"></tbody></table></div><div class="empty-state" id="productsEmpty">Không tìm thấy sản phẩm phù hợp.</div></div></section>
                <section class="page-section" id="categoriesSection"><div class="section-heading"><div><p class="eyebrow">CATALOG</p><h1>Danh mục</h1><p class="heading-note">Phân loại sản phẩm trong cửa hàng.</p></div><button class="btn primary" data-modal="category">＋ Thêm danh mục</button></div><div class="category-grid" id="categoriesGrid"></div></section>
                <section class="page-section" id="ordersSection"><div class="section-heading"><div><p class="eyebrow">VẬN HÀNH</p><h1>Đơn hàng</h1><p class="heading-note">Theo dõi và cập nhật trạng thái đơn hàng.</p></div><button class="btn ghost" id="downloadOrders">⇩ Tải danh sách</button></div><div class="order-tabs" id="orderTabs"><button class="active" data-order-filter="all">Tất cả <b>248</b></button><button data-order-filter="pending">Chờ xử lý <b>8</b></button><button data-order-filter="shipping">Đang giao <b>12</b></button><button data-order-filter="completed">Hoàn thành <b>221</b></button><button data-order-filter="cancelled">Đã hủy <b>7</b></button></div><div class="panel"><div class="table-wrap"><table><thead><tr><th>Mã đơn</th><th>Khách hàng</th><th>Ngày đặt</th><th>Sản phẩm</th><th>Tổng tiền</th><th>Thanh toán</th><th>Trạng thái</th><th></th></tr></thead><tbody id="ordersTable"></tbody></table></div></div></section>
                <section class="page-section" id="vouchersSection"><div class="section-heading"><div><p class="eyebrow">KHUYẾN MÃI</p><h1>Voucher</h1><p class="heading-note">Tạo và quản lý mã giảm giá cho khách hàng.</p></div><button class="btn primary" data-modal="voucher">＋ Tạo voucher</button></div><div class="voucher-grid" id="vouchersGrid"></div></section>
                <section class="page-section" id="reviewsSection"><div class="section-heading"><div><p class="eyebrow">CHĂM SÓC KHÁCH HÀNG</p><h1>Đánh giá</h1><p class="heading-note">Kiểm duyệt và phản hồi đánh giá sản phẩm.</p></div><div class="rating-total"><strong>4.8</strong><span>★★★★★<small>1,284 đánh giá</small></span></div></div><div class="review-filters"><button class="active" data-review-filter="all">Tất cả <b>1,284</b></button><button data-review-filter="pending">Chờ duyệt <b>5</b></button><button data-review-filter="approved">Đã duyệt <b>1,271</b></button><button data-review-filter="rejected">Đã ẩn <b>8</b></button></div><div class="review-list" id="reviewsList"></div></section>
            </div>
        </main>
    </div>
    <div class="modal-backdrop" id="modalBackdrop"><div class="modal" role="dialog" aria-modal="true"><button class="modal-close" id="modalClose">×</button><p class="eyebrow" id="modalEyebrow">THÊM MỚI</p><h2 id="modalTitle">Thêm sản phẩm</h2><form id="adminForm"><div id="modalFields"></div><div class="modal-actions"><button type="button" class="btn ghost" id="modalCancel">Hủy</button><button type="submit" class="btn primary">Lưu thay đổi</button></div></form></div></div>
    <div class="toast" id="toast"></div>
    <script src="js/admin.js"></script>
</body>
</html>