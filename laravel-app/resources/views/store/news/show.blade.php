@extends('layouts.store')

@section('title', $post->title . ' | E-Tech')

@section('content')
<main class="news-article-page container">
    <nav class="catalog-breadcrumb" aria-label="Đường dẫn"><a href="{{ route('home') }}">Trang chủ</a><span class="crumb-sep">/</span><a href="{{ route('news.index') }}">Tin tức</a><span class="crumb-sep">/</span><span class="crumb-current">{{ $post->title }}</span></nav>
    <article class="news-article">
        <header class="news-article-header"><span class="store-eyebrow">GÓC CÔNG NGHỆ E-TECH</span><h1>{{ $post->title }}</h1><div class="article-meta"><time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('d/m/Y') }}</time><span>E-Tech</span></div></header>
        @if ($post->thumbnail)<img class="news-article-image" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">@endif
        @if ($post->excerpt)<p class="news-article-lead">{{ $post->excerpt }}</p>@endif
        <div class="news-article-content">{!! nl2br(e($post->content)) !!}</div>
        <a class="article-link" href="{{ route('news.index') }}">← Tất cả tin tức</a>
    </article>
    @if ($recentPosts->isNotEmpty())<aside class="news-more"><h2>Bài viết khác</h2><div class="article-grid">@foreach ($recentPosts as $recentPost)<article class="article-card"><a class="article-image" href="{{ route('news.show', ['post' => $recentPost->slug]) }}"><img src="{{ asset($recentPost->thumbnail ?: 'img/pexels-dom-bucci-981062-scaled-1.jpg') }}" alt="{{ $recentPost->title }}" loading="lazy"></a><div class="article-content"><h3><a href="{{ route('news.show', ['post' => $recentPost->slug]) }}">{{ $recentPost->title }}</a></h3><a class="article-link" href="{{ route('news.show', ['post' => $recentPost->slug]) }}">Đọc bài viết →</a></div></article>@endforeach</div></aside>@endif
</main>
@endsection