@extends('admin.layouts.app')

@section('title', $editing ? 'Sửa sản phẩm | E-Tech' : 'Thêm sản phẩm | E-Tech')
@section('page-title', $editing ? 'Sửa sản phẩm' : 'Thêm sản phẩm')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">QUẢN LÝ CATALOG</p><h1>{{ $editing ? 'Sửa sản phẩm' : 'Thêm sản phẩm' }}</h1><p class="heading-note">Thông tin sẽ được lưu vào catalog cửa hàng.</p></div><a class="btn ghost" href="{{ route('admin.products.index') }}">← Danh sách</a></div>
    <form class="panel admin-form-panel" action="{{ $editing ? route('admin.products.update', $product->product_id) : route('admin.products.store') }}" method="post">
        @csrf
        @if ($editing) @method('PUT') @endif
        <div class="admin-form-grid">
            <div class="form-field full"><label for="product_name">Tên sản phẩm *</label><input id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" maxlength="255" required>@error('product_name')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="sku">SKU *</label><input id="sku" name="sku" value="{{ old('sku', $product->sku) }}" maxlength="80" required>@error('sku')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="slug">Slug</label><input id="slug" name="slug" value="{{ old('slug', $product->slug) }}" maxlength="280" placeholder="Tự tạo từ tên nếu để trống">@error('slug')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="category_id">Danh mục *</label><select id="category_id" name="category_id" required><option value="">Chọn danh mục</option>@foreach ($categories as $category)<option value="{{ $category->category_id }}" @selected(old('category_id', $product->category_id) == $category->category_id)>{{ $category->category_name }}</option>@endforeach</select>@error('category_id')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="brand_id">Thương hiệu</label><select id="brand_id" name="brand_id"><option value="">Không chọn</option>@foreach ($brands as $brand)<option value="{{ $brand->brand_id }}" @selected(old('brand_id', $product->brand_id) == $brand->brand_id)>{{ $brand->brand_name }}</option>@endforeach</select>@error('brand_id')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="price">Giá bán (VNĐ) *</label><input id="price" name="price" type="number" min="0" step="1000" value="{{ old('price', $product->price) }}" required>@error('price')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="old_price">Giá niêm yết (VNĐ)</label><input id="old_price" name="old_price" type="number" min="0" step="1000" value="{{ old('old_price', $product->old_price) }}">@error('old_price')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="stock_quantity">Tồn kho *</label><input id="stock_quantity" name="stock_quantity" type="number" min="0" value="{{ old('stock_quantity', $product->stock_quantity ?? 0) }}" required>@error('stock_quantity')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field"><label for="status">Trạng thái *</label><select id="status" name="status" required><option value="active" @selected(old('status', $product->status) === 'active')>Đang bán</option><option value="inactive" @selected(old('status', $product->status) === 'inactive')>Ngừng bán</option><option value="out_of_stock" @selected(old('status', $product->status) === 'out_of_stock')>Hết hàng</option></select>@error('status')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field full"><label for="image_url">Đường dẫn ảnh</label><input id="image_url" name="image_url" value="{{ old('image_url', $product->images->first()?->image_url) }}" maxlength="500" placeholder="img/iphone-15-pro.jpg">@error('image_url')<small>{{ $message }}</small>@enderror</div>
            <div class="form-field full"><label for="description">Mô tả</label><textarea id="description" name="description" rows="5">{{ old('description', $product->description) }}</textarea>@error('description')<small>{{ $message }}</small>@enderror</div>
        </div>
        <div class="admin-form-actions"><a class="btn ghost" href="{{ route('admin.products.index') }}">Hủy</a><button class="btn primary" type="submit">{{ $editing ? 'Lưu thay đổi' : 'Tạo sản phẩm' }}</button></div>
    </form>
</section>
@endsection