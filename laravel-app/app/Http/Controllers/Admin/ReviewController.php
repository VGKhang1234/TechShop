<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate(['status' => ['nullable', Rule::in(['pending', 'approved', 'rejected'])]]);
        $reviews = Review::query()->with(['user', 'product'])->orderByDesc('created_at');
        if (! empty($filters['status'])) {
            $reviews->where('status', $filters['status']);
        }

        $reviews = $reviews->paginate(15)->withQueryString();
        $counts = Review::query()->selectRaw('status, COUNT(*) as aggregate')->groupBy('status')->pluck('aggregate', 'status');

        return view('admin.reviews.index', compact('reviews', 'counts', 'filters'));
    }

    public function updateStatus(Request $request, int $review): RedirectResponse
    {
        $validated = $request->validate(['status' => ['required', Rule::in(['approved', 'rejected'])]]);
        Review::query()->whereKey($review)->update(['status' => $validated['status']]);

        return to_route('admin.reviews.index')->with('admin_success', 'Đã cập nhật trạng thái đánh giá.');
    }
}