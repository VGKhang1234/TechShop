<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $categories = Category::query()->orderBy('category_name')->get();

        return view('store.about', compact('categories'));
    }
}