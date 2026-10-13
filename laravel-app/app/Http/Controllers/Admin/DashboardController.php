<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $monthStart = now()->startOfMonth();
        $monthEnd = now()->endOfMonth();
        $stats = [
            'revenue' => Order::query()->whereNotIn('order_status', ['cancelled'])
                ->whereBetween('ordered_at', [$monthStart, $monthEnd])->sum('total_amount'),
            'orders' => Order::query()->whereBetween('ordered_at', [$monthStart, $monthEnd])->count(),
            'pending_orders' => Order::query()->where('order_status', 'pending')->count(),
            'customers' => User::query()->where('role', 'customer')->count(),
            'products' => Product::query()->where('status', 'active')->count(),
            'categories' => Category::query()->count(),
        ];

        $bestProducts = Product::query()->with('category')->orderByDesc('sold_count')->limit(5)->get();
        $recentOrders = Order::query()->with('user', 'items')->orderByDesc('ordered_at')->limit(8)->get();
        $monthlyOrders = Order::query()->selectRaw('COUNT(*) as order_count, SUM(total_amount) as revenue')
            ->whereNotIn('order_status', ['cancelled'])
            ->whereBetween('ordered_at', [$monthStart, $monthEnd])
            ->first();

        return view('admin.dashboard', compact('stats', 'bestProducts', 'recentOrders', 'monthlyOrders'));
    }
}