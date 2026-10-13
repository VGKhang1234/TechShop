@extends('admin.layouts.app')

@section('title', 'Quản lý đánh giá | E-Tech')
@section('page-title', 'Đánh giá')

@section('content')
<section>
    <div class="section-heading"><div><p class="eyebrow">CHĂM SÓC KHÁCH HÀNG</p><h1>Đánh giá</h1><p class="heading-note">Duyệt nội dung đánh giá trước khi hiển thị trên cửa hàng.</p></div><div class="rating-total"><strong>{{ number_format((float) ($reviews->getCollection()->avg('rating') ?? 0), 1) }}</strong><span>★★★★★<small>Đánh giá trong trang hiện tại</small></span></div></div>
    <div class="review-filters"><a class="{{ empty($filters['status']) ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">Tất cả <b>{{ $counts->sum() }}</b></a>@foreach (['pending' => 'Chờ duyệt', 'approved' => 'Đã duyệt', 'rejected' => 'Đã ẩn'] as $status => $label)<a class="{{ ($filters['status'] ?? '') === $status ? 'active' : '' }}" href="{{ route('admin.reviews.index', ['status' => $status]) }}">{{ $label }} <b>{{ $counts[$status] ?? 0 }}</b></a>@endforeach</div>
    <div class="review-list">
        @forelse ($reviews as $review)
            <article class="review-card"><span class="review-avatar">{{ mb_strtoupper(mb_substr($review->user?->name ?? 'KH', 0, 2)) }}</span><div class="review-content"><header><h3>{{ $review->user?->name ?? 'Khách hàng' }}</h3><time>{{ $review->created_at->format('d/m/Y H:i') }}</time></header><div class="stars">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</div><p>{{ $review->comment ?: 'Khách hàng không để lại nội dung.' }}</p><span class="review-product">{{ $review->product?->product_name }}</span></div><div class="review-actions"><span class="status {{ $review->status }}">{{ ['pending' => 'Chờ duyệt', 'approved' => 'Đã duyệt', 'rejected' => 'Đã ẩn'][$review->status] }}</span>@if ($review->status !== 'approved')<form action="{{ route('admin.reviews.status', $review->review_id) }}" method="post">@csrf @method('PATCH')<input type="hidden" name="status" value="approved"><button class="approve" type="submit">✓ Duyệt</button></form>@endif @if ($review->status !== 'rejected')<form action="{{ route('admin.reviews.status', $review->review_id) }}" method="post">@csrf @method('PATCH')<input type="hidden" name="status" value="rejected"><button type="submit">Ẩn</button></form>@endif</div></article>
        @empty<div class="panel admin-empty-cell">Chưa có đánh giá phù hợp.</div>@endforelse
    </div>
    <div class="admin-pagination">{{ $reviews->links() }}</div>
</section>
@endsection