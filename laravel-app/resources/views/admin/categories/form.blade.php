@extends('admin.layouts.app')

@section('title', $editing ? 'Sửa danh mục | E-Tech' : 'Thêm danh mục | E-Tech')
@section('page-title', $editing ? 'Sửa danh mục' : 'Thêm danh mục')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">CATALOG</p><h1>{{ $editing ? 'Sửa danh mục' : 'Thêm danh mục' }}</h1><p class="heading-note">Danh mục được hiển thị trên trang cửa hàng.</p></div><a class="btn ghost" href="{{ route('admin.categories.index') }}">← Danh sách</a></div>
    <form class="panel admin-form-panel" action="{{ $editing ? route('admin.categories.update', $category->category_id) : route('admin.categories.store') }}" method="post">
        @csrf
        @if ($editing) @method('PUT') @endif
        <div class="admin-form-grid">
            <div class="form-field full"><label for="category_name">Tên danh mục *</label><input id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" maxlength="100" required>@error('category_name')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="slug">Slug</label><input id="slug" name="slug" value="{{ old('slug', $category->slug) }}" maxlength="120" placeholder="Tự tạo từ tên nếu để trống">@error('slug')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="image_url">Đường dẫn ảnh</label><input id="image_url" name="image_url" value="{{ old('image_url', $category->image_url) }}" maxlength="500">@error('image_url')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field full"><label for="description">Mô tả</label><textarea id="description" name="description" rows="5">{{ old('description', $category->description) }}</textarea>@error('description')<small>{{ $message }}</small>@enderror</div>
        </div>
        <div class="admin-form-actions"><a class="btn ghost" href="{{ route('admin.categories.index') }}">Hủy</a><button class="btn primary" type="submit">{{ $editing ? 'Lưu thay đổi' : 'Tạo danh mục' }}</button></div>
    </form>
</section>
@endsection