@extends('admin.layouts.app')

@section('title', 'Quản lý sản phẩm | E-Tech')
@section('page-title', 'Sản phẩm')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">QUẢN LÝ CATALOG</p><h1>Sản phẩm</h1><p class="heading-note">Tìm, lọc và cập nhật sản phẩm trong cửa hàng.</p></div><a class="btn primary" href="{{ route('admin.products.create') }}">＋ Thêm sản phẩm</a></div>
    <form class="toolbar admin-toolbar" method="get" action="{{ route('admin.products.index') }}">
        <label class="search-control">⌕<input name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Tìm theo tên, SKU..."></label>
        <select name="category_id" aria-label="Lọc theo danh mục"><option value="">Tất cả danh mục</option>@foreach ($categories as $category)<option value="{{ $category->category_id }}" @selected(($filters['category_id'] ?? '') == $category->category_id)>{{ $category->category_name }}</option>@endforeach</select>
        <select name="status" aria-label="Lọc theo trạng thái"><option value="">Tất cả trạng thái</option><option value="active" @selected(($filters['status'] ?? '') === 'active')>Đang bán</option><option value="inactive" @selected(($filters['status'] ?? '') === 'inactive')>Ngừng bán</option><option value="out_of_stock" @selected(($filters['status'] ?? '') === 'out_of_stock')>Hết hàng</option></select>
        <button class="btn ghost" type="submit">Lọc</button><a class="admin-reset-link" href="{{ route('admin.products.index') }}">Xóa lọc</a>
    </form>
    <section class="panel"><div class="table-wrap"><table><thead><tr><th>Sản phẩm</th><th>SKU</th><th>Danh mục</th><th>Giá bán</th><th>Tồn kho</th><th>Trạng thái</th><th>Thao tác</th></tr></thead><tbody>
        @forelse ($products as $product)
            <tr><td><div class="product-cell"><img src="{{ asset($product->primary_image) }}" alt=""><strong>{{ $product->product_name }}</strong></div></td><td class="muted">{{ $product->sku }}</td><td>{{ $product->category?->category_name }}</td><td><strong>{{ number_format((float) $product->price, 0, ',', '.') }} đ</strong></td><td>{{ number_format($product->stock_quantity) }}</td><td><span class="status {{ $product->status }}">{{ ['active' => 'Đang bán', 'inactive' => 'Ngừng bán', 'out_of_stock' => 'Hết hàng'][$product->status] }}</span></td><td><div class="row-actions"><a class="row-action" title="Sửa" href="{{ route('admin.products.edit', $product->product_id) }}">✎</a><form action="{{ route('admin.products.destroy', $product->product_id) }}" method="post" data-confirm-delete="Xóa sản phẩm {{ $product->product_name }}?">@csrf @method('DELETE')<button class="row-action danger" title="Xóa" type="submit">×</button></form></div></td></tr>
        @empty<tr><td colspan="7" class="admin-empty-cell">Không tìm thấy sản phẩm phù hợp.</td></tr>@endforelse
    </tbody></table></div><div class="admin-pagination">{{ $products->links() }}</div></section>
</section>
@endsection