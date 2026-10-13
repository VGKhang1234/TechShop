<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Quản trị E-Tech')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-laravel.css') }}">
    @vite('resources/js/admin.js')
</head>
<body>
<div class="admin-shell">
    <aside class="sidebar" id="sidebar">
        <a class="brand" href="{{ route('admin.dashboard') }}"><span class="brand-mark">ϟ</span><span>E-Tech <small>ADMIN</small></span></a>
        <div class="sidebar-label">QUẢN TRỊ CỬA HÀNG</div>
        <nav class="side-nav" aria-label="Điều hướng quản trị">
            <a class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><span>▦</span>Tổng quan</a>
            <a class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}"><span>▣</span>Sản phẩm</a>
            <a class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}"><span>◈</span>Danh mục</a>
            <a class="nav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}"><span>⌁</span>Đơn hàng</a>
            <a class="nav-item {{ request()->routeIs('admin.vouchers.*') ? 'active' : '' }}" href="{{ route('admin.vouchers.index') }}"><span>◇</span>Voucher</a>
            <a class="nav-item {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}"><span>★</span>Đánh giá</a>
        </nav>
        <div class="sidebar-footer"><a href="{{ route('home') }}">← Về trang cửa hàng</a><form action="{{ route('logout') }}" method="post">@csrf<button type="submit">Đăng xuất</button></form></div>
    </aside>
    <main class="main-content">
        <header class="topbar"><button class="menu-toggle" id="menuToggle" aria-label="Mở menu">☰</button><div class="breadcrumb"><span>Trang quản trị</span><strong id="pageTitle">/ @yield('page-title', 'Tổng quan')</strong></div><div class="topbar-actions"><div class="admin-user"><span class="avatar">{{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 2)) }}</span><span><strong>{{ Auth::user()->name }}</strong><small>Quản trị viên</small></span></div></div></header>
        <div class="page-body">
            @if (session('admin_success'))<div class="admin-alert success" role="status">{{ session('admin_success') }}</div>@endif
            @if ($errors->any())<div class="admin-alert error" role="alert">{{ $errors->first() }}</div>@endif
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>