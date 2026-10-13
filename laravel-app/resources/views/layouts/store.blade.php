<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'E-Tech | Cửa hàng công nghệ')</title>
    @vite('resources/js/app.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/store.css') }}">
</head>
<body>
    @php($headerCartCount = app(\App\Services\CartService::class)->itemCount())
    <div class="announcement-bar">
        <div class="container">
            <span>Đặt hàng trực tuyến gọi cho chúng tôi <strong>0313728397</strong></span>
            <span class="announcement-sep">•</span>
            <span>Miễn phí giao hàng cho đơn hàng trên 1.000.000 đ</span>
        </div>
    </div>
    <header class="main-header">
        <div class="container">
            <a href="{{ route('home') }}" class="logo"><span class="logo-icon">⚡</span><span>E-Tech</span></a>
            <form class="header-search" action="{{ route('categories.show', ['category' => 'popular']) }}" method="get" data-category-base="{{ url('/danh-muc') }}">
                <select aria-label="Danh mục tìm kiếm" name="category">
                    <option value="popular">Tất cả sản phẩm</option>
                    @foreach ($categories as $navCategory)
                        @if ($navCategory->slug !== 'popular')
                            <option value="{{ $navCategory->slug }}">{{ $navCategory->category_name }}</option>
                        @endif
                    @endforeach
                </select>
                <input type="search" name="q" placeholder="Tìm kiếm sản phẩm công nghệ..." aria-label="Tìm kiếm">
                <button type="submit" aria-label="Tìm kiếm">⌕</button>
            </form>
            <div class="header-actions">
                @auth
                    <span class="action-btn"><span class="action-title">Xin chào, {{ Auth::user()->name }}</span></span>
                    @if (Auth::user()->role === 'admin')<a href="{{ route('admin.dashboard') }}" class="action-btn">Quản trị</a>@endif
                    <form action="{{ route('logout') }}" method="post" class="header-logout-form">
                        @csrf
                        <button type="submit" class="action-btn header-logout">Đăng xuất</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="action-btn"><span class="action-title">Tài khoản</span></a>
                @endauth
                <a href="{{ route('cart.index') }}" class="action-btn header-cart-link"><span class="action-title">Giỏ hàng</span><span class="badge" data-cart-count>{{ $headerCartCount }}</span></a>
                <button class="mobile-toggle" id="mobileToggle" aria-label="Mở menu">☰</button>
            </div>
        </div>
    </header>
    <nav class="nav-bar">
        <div class="container">
            <div class="nav-links" id="navLinks">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Trang chủ</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Giới thiệu</a>
                <a href="{{ route('categories.show', ['category' => 'popular']) }}" class="{{ request()->routeIs('categories.show', 'products.show') ? 'active' : '' }}">Sản phẩm</a>
                <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">Tin tức</a>
                <a href="{{ route('contact.create') }}" class="{{ request()->routeIs('contact.*') ? 'active' : '' }}">Liên hệ</a>
            </div>
            <div class="nav-promo">Ưu đãi chính hãng mỗi ngày</div>
        </div>
    </nav>
    <nav class="category-strip" aria-label="Danh mục sản phẩm">
        <div class="container category-strip-links">
            @foreach ($categories as $navCategory)
                <a href="{{ route('categories.show', ['category' => $navCategory->slug]) }}" class="category-strip-item">
                    <span>{{ $navCategory->category_name }}</span>
                </a>
            @endforeach
        </div>
    </nav>

    @yield('content')

    <footer class="footer-section">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col-about">
                    <a href="{{ route('home') }}" class="logo"><span class="logo-icon">⚡</span><span>E-Tech</span></a>
                    <p class="footer-about-text">Thiết bị công nghệ chính hãng, tư vấn tận tâm và giao hàng toàn quốc.</p>
                </div>
                <div><h3 class="footer-col-title">Danh mục</h3><ul class="footer-menu">
                    @foreach ($categories->take(5) as $footerCategory)
                        <li><a href="{{ route('categories.show', ['category' => $footerCategory->slug]) }}">{{ $footerCategory->category_name }}</a></li>
                    @endforeach
                </ul></div>
                <div><h3 class="footer-col-title">Hỗ trợ khách hàng</h3><p>Hotline: 0313728397</p><p>Email: info@themona.global</p></div>
                <div><h3 class="footer-col-title">Thông tin</h3><ul class="footer-menu"><li><a href="{{ route('about') }}">Giới thiệu</a></li><li><a href="{{ route('news.index') }}">Tin tức</a></li><li><a href="{{ route('contact.create') }}">Liên hệ</a></li></ul></div>
            </div>
            <div class="footer-bottom"><span>© {{ date('Y') }} E-Tech Store</span><span>Chính sách bảo mật | Điều khoản dịch vụ</span></div>
        </div>
    </footer>
</body>
</html>