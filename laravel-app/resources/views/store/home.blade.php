@extends('layouts.store')

@section('title', 'E-Tech | Thiết bị công nghệ chính hãng')

@section('content')
<main>
    <section class="hero-section">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-content">
                    <span class="hero-subtitle">KHÁM PHÁ MỚI MẺ</span>
                    <h1 class="hero-title">Smart Watch</h1>
                    <p class="hero-desc">Khám phá những thiết bị công nghệ mới, được chọn lọc để kết nối công việc, sức khỏe và giải trí mỗi ngày.</p>
                    <div class="countdown-container" aria-label="Ưu đãi có thời hạn">
                        <div class="timer-box"><div class="timer-num" id="timer-days">262</div><div class="timer-label">NGÀY</div></div>
                        <div class="timer-box"><div class="timer-num" id="timer-hours">17</div><div class="timer-label">GIỜ</div></div>
                        <div class="timer-box"><div class="timer-num" id="timer-minutes">09</div><div class="timer-label">PHÚT</div></div>
                        <div class="timer-box"><div class="timer-num" id="timer-seconds">45</div><div class="timer-label">GIÂY</div></div>
                    </div>
                    <a href="{{ route('categories.show', ['category' => 'watch']) }}" class="btn-primary"><span>Mua ngay</span><span aria-hidden="true">→</span></a>
                </div>
                <div class="hero-media">
                    <div class="hero-badge"><span class="percent">-20%</span><span class="off">OFF</span></div>
                    <div class="hero-img-wrapper"><img class="hero-img" src="{{ asset('img/12.png') }}" alt="Đồng hồ thông minh" fetchpriority="high"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section" aria-label="Dịch vụ E-Tech">
        <div class="container services-grid">
            <div class="service-card"><div class="service-icon"><span aria-hidden="true">↗</span></div><div><div class="service-title">Miễn phí giao hàng</div><div class="service-sub">Cho đơn từ 1.000.000 đ</div></div></div>
            <div class="service-card"><div class="service-icon"><span aria-hidden="true">♫</span></div><div><div class="service-title">Hỗ trợ tận tâm</div><div class="service-sub">Luôn sẵn sàng tư vấn</div></div></div>
            <div class="service-card"><div class="service-icon"><span aria-hidden="true">↺</span></div><div><div class="service-title">Đổi trả thuận tiện</div><div class="service-sub">Hỗ trợ trong 15 ngày</div></div></div>
            <div class="service-card"><div class="service-icon"><span aria-hidden="true">%</span></div><div><div class="service-title">Ưu đãi thành viên</div><div class="service-sub">Nhiều quà tặng hấp dẫn</div></div></div>
        </div>
    </section>

    <section class="promo-grid-section">
        <div class="container">
            <div class="promo-top-row">
                <article class="promo-banner-card bg-tab-banner">
                    <div><div class="sub-price-red">Thiết bị cho mọi khoảnh khắc</div><h2 class="promo-card-title">Samsung<br>Galaxy Tab A8</h2><p class="promo-card-desc">Không gian rộng rãi cho công việc, học tập và giải trí.</p><a href="{{ route('categories.show', ['category' => 'popular']) }}" class="btn-primary"><span>Khám phá</span><span aria-hidden="true">→</span></a></div>
                    <div style="position:relative;text-align:center"><div class="badge-starburst"><span>MỚI</span></div><img src="{{ asset('img/samsung-galaxy-tab-a8-thumb-1-600x600.png') }}" alt="Samsung Galaxy Tab A8" class="promo-card-img" loading="lazy"></div>
                </article>
                <article class="promo-banner-card bg-meta-banner">
                    <div><div class="pill-yellow-tag">Bước vào thế giới thực tế ảo</div><h2 class="promo-card-title">Meta Quest 2<br>256GB</h2><p class="promo-card-desc">Trải nghiệm giải trí sống động ở mọi nơi.</p><a href="{{ route('categories.show', ['category' => 'popular']) }}" class="btn-white"><span>Xem sản phẩm</span><span aria-hidden="true">→</span></a></div>
                    <div style="text-align:center"><img src="{{ asset('img/-q1kinh-thuc-te-ao-oculus-quest-2-min-mobile-q4_result_9f730879c9cd4d63b416244b08208f82_grande.webp') }}" alt="Kính thực tế ảo Meta Quest 2" class="promo-card-img" loading="lazy"></div>
                </article>
            </div>
            <div class="promo-bottom-row">
                <article class="promo-small-card bg-card-pink"><div style="text-align:center;margin-bottom:20px"><img src="{{ asset('img/AirPods-Max-USBC-Orange-A.png') }}" alt="Apple AirPods Max" class="promo-small-img" loading="lazy"></div><div><div class="tag-sub-pink">Âm thanh cao cấp</div><h3>Apple AirPods Max</h3><a href="{{ route('categories.show', ['category' => 'headphone']) }}" class="btn-outline-pink">Khám phá</a></div></article>
                <article class="promo-small-card bg-card-green"><div><div class="pill-green-tag">Theo dõi nhịp sống</div><h3>Apple Smart Watch Pro</h3><p class="price-green">Đồng hành mỗi ngày</p><a href="{{ route('categories.show', ['category' => 'watch']) }}" class="btn-dark"><span>Xem đồng hồ</span><span aria-hidden="true">→</span></a></div><div style="text-align:right;margin-top:-10px"><img src="{{ asset('img/10.png') }}" alt="Đồng hồ thông minh" class="promo-small-img" loading="lazy"></div></article>
                <article class="promo-small-card bg-card-yellow"><div style="text-align:center;margin-bottom:20px"><img src="{{ asset('img/mirrorless-camera-fujifilm-x-t5-1500x1500.png') }}" alt="Máy ảnh Fujifilm" class="promo-small-img" loading="lazy"></div><div><div class="tag-sub-pink">Ghi lại khoảnh khắc</div><h3>Máy ảnh Fujifilm</h3><a href="{{ route('categories.show', ['category' => 'popular']) }}" class="btn-outline-pink">Khám phá</a></div></article>
            </div>
        </div>
    </section>

    <section class="featured-products-section">
        <div class="container">
            <div class="featured-header"><div><span class="section-subtitle">ĐƯỢC QUAN TÂM NHIỀU</span><h2 class="section-title">Sản phẩm nổi bật</h2></div><div class="mini-countdown" aria-hidden="true"><span class="mini-timer-box">20</span><span>:</span><span class="mini-timer-box">11</span><span>:</span><span class="mini-timer-box">34</span><span>:</span><span class="mini-timer-box">59</span></div></div>
            @if ($featuredProducts->isNotEmpty())
                <div class="featured-grid">
                    @foreach ($featuredProducts as $product)
                        <article class="featured-card">
                            @if ($product->old_price && $product->old_price > $product->price)<span class="discount-badge">-{{ round((1 - $product->price / $product->old_price) * 100) }}%</span>@endif
                            <a class="featured-card-media" href="{{ route('products.show', ['product' => $product->slug]) }}"><img src="{{ asset($product->primary_image) }}" alt="{{ $product->product_name }}" loading="lazy"></a>
                            <div><div class="featured-cat">{{ $product->category?->category_name }}</div><h3 class="featured-title"><a href="{{ route('products.show', ['product' => $product->slug]) }}">{{ $product->product_name }}</a></h3><div class="product-rating" aria-label="Đánh giá {{ number_format((float) $product->rating, 1) }} trên 5">★★★★★</div><div class="stock-progress-container"><div class="stock-text">Còn hàng: <span>{{ $product->stock_quantity }}</span></div><div class="progress-bar-track"><div class="progress-bar-fill" style="width: {{ min(100, $product->stock_quantity) }}%"></div></div></div><div class="product-price"><span class="price-new">{{ number_format((float) $product->price, 0, ',', '.') }} đ</span>@if ($product->old_price && $product->old_price > $product->price)<span class="price-old">{{ number_format((float) $product->old_price, 0, ',', '.') }} đ</span>@endif</div></div>
                        </article>
                    @endforeach
                </div>
                <div class="home-view-all"><a href="{{ route('categories.show', ['category' => 'popular']) }}" class="btn-primary"><span>Xem tất cả sản phẩm</span><span aria-hidden="true">→</span></a></div>
            @else
                <div class="store-empty"><h3>Chưa có sản phẩm để hiển thị</h3><p>Hãy thêm sản phẩm vào danh mục để bắt đầu bán hàng.</p></div>
            @endif
        </div>
    </section>

    @if ($newProducts->isNotEmpty())
        <section class="products-section">
            <div class="container products-grid-layout">
                <aside class="promo-side-banner"><div><h2 class="promo-banner-title">Công nghệ mới, trải nghiệm mới</h2><a href="{{ route('categories.show', ['category' => 'popular']) }}" class="btn-yellow"><span>Khám phá ngay</span><span aria-hidden="true">→</span></a></div><div class="promo-banner-img"><img src="{{ asset('img/AirPods-Max-USBC-Orange-A.png') }}" alt="Tai nghe Apple AirPods Max" loading="lazy"></div></aside>
                <div><div class="featured-header"><div><span class="section-subtitle">VỪA CẬP NHẬT</span><h2 class="section-title">Sản phẩm mới</h2></div><a href="{{ route('categories.show', ['category' => 'popular']) }}">Xem tất cả →</a></div><div class="products-catalog-grid store-product-grid home-product-grid">
                    @foreach ($newProducts as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div></div>
            </div>
        </section>
    @endif

    <section class="brands-section" aria-label="Thương hiệu công nghệ">
        <div class="container brands-grid">
            <div class="brand-card"><span>Apple</span></div><div class="brand-card"><span>Samsung</span></div><div class="brand-card"><span>Xiaomi</span></div><div class="brand-card"><span>Sony</span></div><div class="brand-card"><span>Lenovo</span></div>
        </div>
    </section>

    <section class="news-section">
        <div class="container">
            <div class="section-header"><div><div class="section-subtitle">ĐỌC TIN TỨC MỚI NHẤT</div><h2 class="section-title">Tin tức công nghệ</h2></div><a href="{{ route('news.index') }}" class="btn-yellow"><span>Xem tất cả</span><span aria-hidden="true">→</span></a></div>
            <div class="news-grid">
                <article class="news-card"><div class="news-img"><img src="{{ asset('img/pexels-dom-bucci-981062-scaled-1.jpg') }}" alt="Thiết bị điện tử hiện đại" loading="lazy"></div><div class="news-content"><div class="news-meta"><span class="meta-item">Điện tử</span><span class="meta-item">3 phút đọc</span></div><h3 class="news-title"><a href="{{ route('news.index') }}">Thiết bị điện tử đang thay đổi cách chúng ta sống</a></h3><p class="news-excerpt">Khám phá những sản phẩm nổi bật giúp công việc, giải trí và cuộc sống hằng ngày tiện lợi hơn.</p><a href="{{ route('news.index') }}" class="news-link"><span>Đọc ngay</span><span aria-hidden="true">→</span></a></div></article>
                <article class="news-card"><div class="news-img"><img src="{{ asset('img/pexels-karolina-grabowska-4887246.jpg') }}" alt="Không gian sống kết hợp công nghệ" loading="lazy"></div><div class="news-content"><div class="news-meta"><span class="meta-item">Đời sống</span><span class="meta-item">4 phút đọc</span></div><h3 class="news-title"><a href="{{ route('news.index') }}">Ý tưởng tạo không gian sống thông minh</a></h3><p class="news-excerpt">Gợi ý kết hợp thiết bị công nghệ vào không gian sống theo cách tiện dụng và tinh tế.</p><a href="{{ route('news.index') }}" class="news-link"><span>Đọc ngay</span><span aria-hidden="true">→</span></a></div></article>
            </div>
        </div>
    </section>

    <section class="newsletter-section">
        <div class="container newsletter-card">
            <div class="newsletter-media"><img src="{{ asset('img/drone.png') }}" alt="Flycam công nghệ" class="newsletter-drone-img" loading="lazy"></div>
            <div class="newsletter-content"><h2 class="newsletter-title">Nhận cập nhật mới</h2><p class="newsletter-desc">Theo dõi xu hướng công nghệ và những sản phẩm mới từ E-Tech.</p><a href="{{ route('contact.create') }}" class="btn-primary"><span>Kết nối với E-Tech</span><span aria-hidden="true">→</span></a></div>
        </div>
    </section>
</main>
@endsection