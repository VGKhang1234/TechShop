@extends('layouts.store')

@section('title', 'Tin tức | E-Tech')

@section('content')
<main class="news-page">
    <section class="news-hero"><div class="container"><span class="store-eyebrow">GÓC CÔNG NGHỆ E-TECH</span><h1>Tin tức và cảm hứng công nghệ</h1><p>Cập nhật xu hướng mới, mẹo sử dụng thiết bị và câu chuyện giúp bạn lựa chọn công nghệ phù hợp hơn mỗi ngày.</p></div></section>
    <section class="container news-layout">
        <div>
            @if ($posts->isNotEmpty())
                <div class="article-grid">
                    @foreach ($posts as $post)
                        <article class="article-card">
                            <a class="article-image" href="{{ route('news.show', ['post' => $post->slug]) }}"><img src="{{ asset($post->thumbnail ?: 'img/pexels-dom-bucci-981062-scaled-1.jpg') }}" alt="{{ $post->title }}" loading="lazy"></a>
                            <div class="article-content"><div class="article-meta"><time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('d/m/Y') }}</time><span>E-Tech</span></div><h2><a href="{{ route('news.show', ['post' => $post->slug]) }}">{{ $post->title }}</a></h2><p>{{ $post->excerpt }}</p><a href="{{ route('news.show', ['post' => $post->slug]) }}" class="article-link">Đọc bài viết <span aria-hidden="true">→</span></a></div>
                        </article>
                    @endforeach
                </div>
                <div class="store-pagination">{{ $posts->links() }}</div>
            @else
                <div class="store-empty"><h2>Bài viết mới sẽ sớm được cập nhật</h2><p>Hãy quay lại để đọc những tin tức và mẹo công nghệ mới nhất.</p></div>
            @endif
        </div>
        <aside class="news-sidebar">
            <section class="sidebar-block"><h2>Bài viết gần đây</h2><div class="related-list">
                @forelse ($recentPosts as $post)
                    <a class="related-item" href="{{ route('news.show', ['post' => $post->slug]) }}"><img src="{{ asset($post->thumbnail ?: 'img/pexels-dom-bucci-981062-scaled-1.jpg') }}" alt="" loading="lazy"><span><strong>{{ $post->title }}</strong><small>{{ $post->published_at->format('d/m/Y') }}</small></span></a>
                @empty
                    <p class="news-muted">Chưa có bài viết.</p>
                @endforelse
            </div></section>
            <section class="sidebar-block"><h2>Danh mục sản phẩm</h2><div class="news-category-list">
                @foreach ($categories->where('slug', '!=', 'popular') as $category)
                    <a href="{{ route('categories.show', ['category' => $category->slug]) }}">{{ $category->category_name }}<span>→</span></a>
                @endforeach
            </div></section>
            <a class="news-contact-link" href="{{ route('contact.create') }}">Cần tư vấn sản phẩm? <strong>Liên hệ E-Tech →</strong></a>
        </aside>
    </section>
</main>
@endsection