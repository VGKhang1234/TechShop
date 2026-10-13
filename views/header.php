<?php
$activePage = $activePage ?? '';
$headerCategory = $headerCategory ?? 'all';
$headerPlaceholder = $headerPlaceholder ?? 'Tìm kiếm sản phẩm công nghệ...';
ob_start(static function ($output) {
    return str_replace('.html', '.php', $output);
});
?>
<div class="announcement-bar">
    <div class="container">
        <span>Đặt hàng trực tuyến gọi cho chúng tôi <strong>0313728397</strong></span>
        <span class="announcement-sep">•</span>
        <span>Giao hàng miễn phí cho đơn hàng trên 1,000,000 đ</span>
        <span class="announcement-sep">•</span>
        <span>Đăng ký tài khoản để được giảm giá -15% cho tất cả các sản phẩm đã kích hoạt</span>
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
            <div class="top-bar-item"><a href="contact.php">Hỗ trợ khách hàng</a></div>
            <div class="top-bar-item"><a href="#">Theo dõi đơn hàng</a></div>
        </div>
    </div>
</div>
<header class="main-header">
    <div class="container">
        <a href="index.php" class="logo">
            <div class="logo-icon"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
            <span>E-Tech</span>
        </a>
        <div class="header-search">
            <select aria-label="Danh mục tìm kiếm">
                <option value="all" <?php echo $headerCategory === 'all' ? 'selected' : ''; ?>>Tất cả danh mục</option>
                <option value="phone" <?php echo $headerCategory === 'phone' ? 'selected' : ''; ?>>Điện thoại</option>
                <option value="computer" <?php echo $headerCategory === 'computer' ? 'selected' : ''; ?>>Máy tính & Laptop</option>
                <option value="headphone" <?php echo $headerCategory === 'headphone' ? 'selected' : ''; ?>>Tai nghe</option>
                <option value="watch" <?php echo $headerCategory === 'watch' ? 'selected' : ''; ?>>Smart Watch</option>
                <option value="webcam" <?php echo $headerCategory === 'webcam' ? 'selected' : ''; ?>>Web Cam</option>
                <option value="accessory" <?php echo $headerCategory === 'accessory' ? 'selected' : ''; ?>>Phụ kiện</option>
            </select>
            <input type="text" placeholder="<?php echo htmlspecialchars($headerPlaceholder, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Tìm kiếm">
            <button type="button" aria-label="Tìm kiếm"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button>
        </div>
        <div class="header-actions">
            <a href="login.php" class="action-btn">
                <div class="icon-wrapper"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                <div class="action-info"><span class="action-sub">Xin chào</span><span class="action-title">Tài Khoản</span></div>
            </a>
            <a href="cart.php" class="action-btn">
                <div class="icon-wrapper"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg><span class="badge">0</span></div>
                <div class="action-info"><span class="action-sub">Giỏ hàng</span><span class="action-title">0 đ</span></div>
            </a>
            <button class="mobile-toggle" id="mobileToggle" aria-label="Mở menu"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>
        </div>
    </div>
</header>
<nav class="nav-bar">
    <div class="container">
        <div class="nav-links" id="navLinks">
            <a href="index.php" class="<?php echo $activePage === 'home' ? 'active' : ''; ?>">Trang Chủ</a>
            <a href="introduction.php" class="<?php echo $activePage === 'introduction' ? 'active' : ''; ?>">Giới Thiệu</a>
            <a href="popular.php" class="<?php echo $activePage === 'products' ? 'active' : ''; ?>">Sản Phẩm</a>
            <a href="news.php" class="<?php echo $activePage === 'news' ? 'active' : ''; ?>">Tin Tức</a>
            <a href="contact.php" class="<?php echo $activePage === 'contact' ? 'active' : ''; ?>">Liên Hệ</a>
        </div>
        <div class="nav-promo">⚡ Giảm giá lên đến 50% cho thành viên mới</div>
    </div>
</nav>
<nav class="category-strip">
    <div class="container">
        <div class="category-strip-links">
            <a href="popular.php" class="category-strip-item">★ <span>Phổ biến</span></a>
            <a href="phone.php" class="category-strip-item">▣ <span>Điện thoại</span></a>
            <a href="computer.php" class="category-strip-item">▤ <span>Máy tính</span></a>
            <a href="accessory.php" class="category-strip-item">⚙ <span>Phụ kiện</span></a>
            <a href="headphone.php" class="category-strip-item">◉ <span>Tai nghe</span></a>
            <a href="watch.php" class="category-strip-item">◷ <span>Smart Watch</span></a>
            <a href="webcam.php" class="category-strip-item">◉ <span>Web Cam</span></a>
        </div>
        <a href="tel:0313728397" class="category-strip-hotline">☎ 0313728397</a>
    </div>
</nav>