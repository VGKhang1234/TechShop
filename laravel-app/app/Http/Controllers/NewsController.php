<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()->orderBy('category_name')->get();
        $posts = BlogPost::published()
            ->orderByDesc('published_at')
            ->paginate(8);
        $recentPosts = BlogPost::published()
            ->orderByDesc('published_at')
            ->limit(5)
            ->get();

        return view('store.news.index', compact('categories', 'posts', 'recentPosts'));
    }

    public function show(BlogPost $post): View
    {
        abort_unless($post->status === 'published' && $post->published_at && $post->published_at->isPast(), 404);

        $categories = Category::query()->orderBy('category_name')->get();
        $recentPosts = BlogPost::published()
            ->whereKeyNot($post->getKey())
            ->orderByDesc('published_at')
            ->limit(4)
            ->get();

        return view('store.news.show', compact('categories', 'post', 'recentPosts'));
    }
}