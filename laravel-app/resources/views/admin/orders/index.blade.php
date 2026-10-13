@extends('admin.layouts.app')

@section('title', 'Quản lý đơn hàng | E-Tech')
@section('page-title', 'Đơn hàng')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">VẬN HÀNH</p><h1>Đơn hàng</h1><p class="heading-note">Theo dõi đơn và cập nhật trạng thái xử lý.</p></div></div>
    <div class="order-tabs admin-order-tabs">
        <a class="{{ empty($filters['status']) ? 'active' : '' }}" href="{{ route('admin.orders.index', request()->except('status', 'page')) }}">Tất cả <b>{{ $counts->sum() }}</b></a>
        @foreach (['pending' => 'Chờ xử lý', 'confirmed' => 'Đã xác nhận', 'processing' => 'Đang xử lý', 'shipping' => 'Đang giao', 'completed' => 'Hoàn thành', 'cancelled' => 'Đã hủy'] as $status => $label)
            <a class="{{ ($filters['status'] ?? '') === $status ? 'active' : '' }}" href="{{ route('admin.orders.index', array_merge(request()->except('status', 'page'), ['status' => $status])) }}">{{ $label }} <b>{{ $counts[$status] ?? 0 }}</b></a>
        @endforeach
    </div>
    <form class="toolbar admin-toolbar" method="get" action="{{ route('admin.orders.index') }}"><label class="search-control">⌕<input name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Mã đơn, tên hoặc điện thoại..."></label>@if (!empty($filters['status']))<input type="hidden" name="status" value="{{ $filters['status'] }}">@endif<button class="btn ghost" type="submit">Tìm</button></form>
    <section class="panel"><div class="table-wrap"><table><thead><tr><th>Mã đơn / Ngày</th><th>Khách nhận</th><th>Sản phẩm</th><th>Tổng tiền</th><th>Thanh toán</th><th>Trạng thái / Cập nhật</th></tr></thead><tbody>
        @forelse ($orders as $order)
            <tr><td><strong>{{ $order->order_code }}</strong><small class="admin-cell-sub">{{ $order->ordered_at?->format('d/m/Y H:i') }}</small></td><td>{{ $order->receiver_name }}<small class="admin-cell-sub">{{ $order->receiver_phone }}</small></td><td>{{ $order->items->sum('quantity') }} sản phẩm<small class="admin-cell-sub">{{ $order->items->take(2)->pluck('product_name')->join(', ') }}</small></td><td><strong>{{ number_format((float) $order->total_amount, 0, ',', '.') }} đ</strong></td><td>{{ $order->payment_method === 'cod' ? 'COD' : 'Chuyển khoản' }}<small class="admin-cell-sub">{{ $order->payments->first()?->payment_status ?? 'pending' }}</small></td><td><span class="status {{ $order->order_status }}">{{ ['pending' => 'Chờ xử lý', 'confirmed' => 'Đã xác nhận', 'processing' => 'Đang xử lý', 'shipping' => 'Đang giao', 'completed' => 'Hoàn thành', 'cancelled' => 'Đã hủy'][$order->order_status] }}</span>@if (!empty($transitions = \App\Http\Controllers\Admin\OrderController::transitionsFor($order->order_status)))<form class="admin-inline-status" action="{{ route('admin.orders.status', $order->order_id) }}" method="post">@csrf @method('PATCH')<select name="order_status" aria-label="Trạng thái mới">@foreach ($transitions as $next)<option value="{{ $next }}">{{ ['confirmed' => 'Xác nhận', 'processing' => 'Đang xử lý', 'shipping' => 'Đang giao', 'completed' => 'Hoàn thành', 'cancelled' => 'Hủy đơn'][$next] }}</option>@endforeach</select><button class="row-action" type="submit" title="Lưu trạng thái">✓</button></form>@endif</td></tr>
        @empty<tr><td colspan="6" class="admin-empty-cell">Không tìm thấy đơn hàng.</td></tr>@endforelse
    </tbody></table></div><div class="admin-pagination">{{ $orders->links() }}</div></section>
</section>
@endsection