@extends('admin.layouts.app')

@section('title', 'Quản lý voucher | E-Tech')
@section('page-title', 'Voucher')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">KHUYẾN MÃI</p><h1>Voucher</h1><p class="heading-note">Tạo và quản lý mã giảm giá dành cho khách hàng.</p></div><a class="btn primary" href="{{ route('admin.vouchers.create') }}">＋ Tạo voucher</a></div>
    <section class="panel"><div class="table-wrap"><table><thead><tr><th>Mã / Mô tả</th><th>Mức giảm</th><th>Điều kiện</th><th>Thời hạn</th><th>Lượt dùng</th><th>Trạng thái</th><th></th></tr></thead><tbody>
        @forelse ($vouchers as $voucher)
            <tr><td><strong>{{ $voucher->code }}</strong><small class="admin-cell-sub">{{ $voucher->description }}</small></td><td>{{ $voucher->discount_type === 'percentage' ? rtrim(rtrim(number_format((float) $voucher->discount_value, 2), '0'), '.') . '%' : number_format((float) $voucher->discount_value, 0, ',', '.') . ' đ' }}</td><td>Đơn từ {{ number_format((float) $voucher->min_order_value, 0, ',', '.') }} đ@if ($voucher->max_discount_amount)<small class="admin-cell-sub">Tối đa {{ number_format((float) $voucher->max_discount_amount, 0, ',', '.') }} đ</small>@endif</td><td>{{ $voucher->start_at->format('d/m/Y') }} – {{ $voucher->end_at->format('d/m/Y') }}</td><td>{{ $voucher->used_count }} / {{ $voucher->usage_limit ?? '∞' }}</td><td><span class="status {{ $voucher->status === 'active' ? 'approved' : 'inactive' }}">{{ $voucher->status === 'active' ? 'Đang hoạt động' : 'Tạm dừng' }}</span></td><td><div class="row-actions"><a class="row-action" href="{{ route('admin.vouchers.edit', $voucher->voucher_id) }}" title="Sửa">✎</a><form action="{{ route('admin.vouchers.destroy', $voucher->voucher_id) }}" method="post" data-confirm-delete="Xóa voucher {{ $voucher->code }}?">@csrf @method('DELETE')<button class="row-action danger" type="submit" title="Xóa">×</button></form></div></td></tr>
        @empty<tr><td colspan="7" class="admin-empty-cell">Chưa có voucher.</td></tr>@endforelse
    </tbody></table></div><div class="admin-pagination">{{ $vouchers->links() }}</div></section>
</section>
@endsection