@extends('admin.layouts.app')

@section('title', $editing ? 'Sửa voucher | E-Tech' : 'Tạo voucher | E-Tech')
@section('page-title', $editing ? 'Sửa voucher' : 'Tạo voucher')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">KHUYẾN MÃI</p><h1>{{ $editing ? 'Sửa voucher' : 'Tạo voucher' }}</h1><p class="heading-note">Thiết lập mức giảm và thời hạn áp dụng.</p></div><a class="btn ghost" href="{{ route('admin.vouchers.index') }}">← Danh sách</a></div>
    <form class="panel admin-form-panel" action="{{ $editing ? route('admin.vouchers.update', $voucher->voucher_id) : route('admin.vouchers.store') }}" method="post">
        @csrf @if ($editing) @method('PUT') @endif
        <div class="admin-form-grid">
            <div class="form-field"><label for="code">Mã voucher *</label><input id="code" name="code" value="{{ old('code', $voucher->code) }}" maxlength="50" required>@error('code')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="status">Trạng thái *</label><select id="status" name="status"><option value="active" @selected(old('status', $voucher->status ?? 'active') === 'active')>Đang hoạt động</option><option value="inactive" @selected(old('status', $voucher->status) === 'inactive')>Tạm dừng</option></select>@error('status')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field full"><label for="description">Mô tả</label><input id="description" name="description" value="{{ old('description', $voucher->description) }}" maxlength="255">@error('description')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="discount_type">Loại giảm *</label><select id="discount_type" name="discount_type"><option value="percentage" @selected(old('discount_type', $voucher->discount_type) === 'percentage')>Phần trăm</option><option value="fixed" @selected(old('discount_type', $voucher->discount_type) === 'fixed')>Số tiền cố định</option></select>@error('discount_type')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="discount_value">Mức giảm *</label><input id="discount_value" name="discount_value" type="number" min="0.01" step="0.01" value="{{ old('discount_value', $voucher->discount_value) }}" required>@error('discount_value')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="min_order_value">Giá trị đơn tối thiểu *</label><input id="min_order_value" name="min_order_value" type="number" min="0" step="1000" value="{{ old('min_order_value', $voucher->min_order_value ?? 0) }}" required>@error('min_order_value')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="max_discount_amount">Giảm tối đa</label><input id="max_discount_amount" name="max_discount_amount" type="number" min="0" step="1000" value="{{ old('max_discount_amount', $voucher->max_discount_amount) }}">@error('max_discount_amount')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="start_at">Bắt đầu *</label><input id="start_at" name="start_at" type="datetime-local" value="{{ old('start_at', $voucher->start_at?->format('Y-m-d\TH:i')) }}" required>@error('start_at')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="end_at">Kết thúc *</label><input id="end_at" name="end_at" type="datetime-local" value="{{ old('end_at', $voucher->end_at?->format('Y-m-d\TH:i')) }}" required>@error('end_at')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="usage_limit">Giới hạn lượt dùng</label><input id="usage_limit" name="usage_limit" type="number" min="1" value="{{ old('usage_limit', $voucher->usage_limit) }}" placeholder="Để trống nếu không giới hạn">@error('usage_limit')<small>{{ $message }}</small>@enderror</div>
        </div>
        <div class="admin-form-actions"><a class="btn ghost" href="{{ route('admin.vouchers.index') }}">Hủy</a><button class="btn primary" type="submit">{{ $editing ? 'Lưu thay đổi' : 'Tạo voucher' }}</button></div>
    </form>
</section>
@endsection