@extends('admin.layouts.app')

@section('title', 'Tổng quan quản trị | E-Tech')
@section('page-title', 'Tổng quan')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">TỔNG QUAN CỬA HÀNG</p><h1>Chào {{ Auth::user()->name }}</h1><p class="heading-note">Dữ liệu kinh doanh tháng {{ now()->format('m/Y') }}.</p></div><a class="btn primary" href="{{ route('admin.products.create') }}">＋ Thêm sản phẩm</a></div>
    <div class="stat-grid">
        <article class="stat-card"><div class="stat-icon coral">₫</div><div><span>Doanh thu tháng này</span><strong>{{ number_format((float) $stats['revenue'], 0, ',', '.') }} đ</strong><em class="neutral">{{ $monthlyOrders->order_count ?? 0 }} đơn không bị hủy</em></div></article>
        <article class="stat-card"><div class="stat-icon yellow">◷</div><div><span>Đơn chờ xử lý</span><strong>{{ number_format($stats['pending_orders']) }}</strong><em class="neutral">{{ number_format($stats['orders']) }} đơn trong tháng</em></div></article>
        <article class="stat-card"><div class="stat-icon blue">♙</div><div><span>Khách hàng</span><strong>{{ number_format($stats['customers']) }}</strong><em class="neutral">Tài khoản đang đăng ký</em></div></article>
        <article class="stat-card"><div class="stat-icon navy">▣</div><div><span>Sản phẩm đang bán</span><strong>{{ number_format($stats['products']) }}</strong><em class="neutral">{{ number_format($stats['categories']) }} danh mục</em></div></article>
    </div>
    <div class="dashboard-grid admin-dashboard-grid">
        <section class="panel"><div class="panel-head"><div><h2>Sản phẩm bán chạy</h2><p>Sắp xếp theo số lượng đã bán</p></div><a class="text-button" href="{{ route('admin.products.index') }}">Quản lý sản phẩm →</a></div>
            <div class="table-wrap"><table><thead><tr><th>Sản phẩm</th><th>Danh mục</th><th>Đã bán</th><th>Giá</th></tr></thead><tbody>
                @forelse ($bestProducts as $product)
                    <tr><td><div class="product-cell"><img src="{{ asset($product->primary_image) }}" alt=""><strong>{{ $product->product_name }}</strong></div></td><td>{{ $product->category?->category_name }}</td><td>{{ number_format($product->sold_count) }}</td><td>{{ number_format((float) $product->price, 0, ',', '.') }} đ</td></tr>
                @empty<tr><td colspan="4" class="admin-empty-cell">Chưa có sản phẩm.</td></tr>@endforelse
            </tbody></table></div>
        </section>
        <section class="panel"><div class="panel-head"><div><h2>Đơn gần đây</h2><p>Các đơn hàng mới nhất trong hệ thống</p></div><a class="text-button" href="{{ route('admin.orders.index') }}">Quản lý đơn →</a></div>
            <div class="table-wrap"><table><thead><tr><th>Mã đơn</th><th>Khách hàng</th><th>Tổng tiền</th><th>Trạng thái</th></tr></thead><tbody>
                @forelse ($recentOrders as $order)
                    <tr><td><strong>{{ $order->order_code }}</strong></td><td>{{ $order->receiver_name }}</td><td>{{ number_format((float) $order->total_amount, 0, ',', '.') }} đ</td><td><span class="status {{ $order->order_status }}">{{ $order->order_status }}</span></td></tr>
                @empty<tr><td colspan="4" class="admin-empty-cell">Chưa có đơn hàng.</td></tr>@endforelse
            </tbody></table></div>
        </section>
    </div>
    <div class="admin-quick-links"><a class="panel" href="{{ route('admin.vouchers.index') }}"><strong>Voucher</strong><span>Quản lý mã ưu đãi →</span></a><a class="panel" href="{{ route('admin.reviews.index') }}"><strong>Đánh giá</strong><span>Kiểm duyệt phản hồi →</span></a></div>
</section>
@endsection