<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | E-Tech</title>
    @vite('resources/js/app.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/store.css') }}">
</head>
<body class="auth-page">
    <header class="auth-header"><div class="container"><a href="{{ route('home') }}" class="logo auth-logo"><span class="logo-icon">⚡</span><span>E-Tech</span></a><a href="{{ route('home') }}" class="auth-home-link">← Về trang chủ</a></div></header>
    <main class="auth-main">@yield('content')</main>
    <footer class="auth-footer">© {{ date('Y') }} E-Tech Store. Mua sắm công nghệ thật đơn giản.</footer>
</body>
</html>