<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    private const TRANSITIONS = [
        'pending' => ['confirmed', 'cancelled'],
        'confirmed' => ['processing', 'cancelled'],
        'processing' => ['shipping', 'cancelled'],
        'shipping' => ['completed', 'cancelled'],
        'completed' => [],
        'cancelled' => [],
    ];

    public static function transitionsFor(string $status): array
    {
        return self::TRANSITIONS[$status] ?? [];
    }

    public function index(Request $request): View
    {
        $filters = $request->validate([
            'status' => ['nullable', Rule::in(array_keys(self::TRANSITIONS))],
            'q' => ['nullable', 'string', 'max:120'],
        ]);

        $orders = Order::query()->with(['items', 'payments'])->orderByDesc('ordered_at');
        if (! empty($filters['status'])) {
            $orders->where('order_status', $filters['status']);
        }
        if (! empty($filters['q'])) {
            $term = '%' . trim($filters['q']) . '%';
            $orders->where(fn (Builder $query) => $query->where('order_code', 'like', $term)
                ->orWhere('receiver_name', 'like', $term)
                ->orWhere('receiver_phone', 'like', $term));
        }

        $orders = $orders->paginate(15)->withQueryString();
        $counts = Order::query()->selectRaw('order_status, COUNT(*) as aggregate')->groupBy('order_status')->pluck('aggregate', 'order_status');

        return view('admin.orders.index', compact('orders', 'counts', 'filters'));
    }

    public function updateStatus(Request $request, int $order): RedirectResponse
    {
        $validated = $request->validate(['order_status' => ['required', Rule::in(array_keys(self::TRANSITIONS))]]);

        DB::transaction(function () use ($order, $validated): void {
            $order = Order::query()->with('items')->lockForUpdate()->findOrFail($order);
            $nextStatus = $validated['order_status'];
            if (! in_array($nextStatus, self::TRANSITIONS[$order->order_status] ?? [], true)) {
                throw ValidationException::withMessages(['order_status' => 'Không thể chuyển đơn hàng sang trạng thái này.']);
            }

            if ($nextStatus === 'cancelled') {
                foreach ($order->items as $item) {
                    $product = Product::query()->lockForUpdate()->find($item->product_id);
                    if (! $product) {
                        continue;
                    }

                    $product->stock_quantity += $item->quantity;
                    if ($product->status === 'out_of_stock' && $product->stock_quantity > 0) {
                        $product->status = 'active';
                    }
                    $product->save();
                }

                Payment::query()->where('order_id', $order->order_id)->where('payment_status', 'pending')
                    ->update(['payment_status' => 'failed']);
                Payment::query()->where('order_id', $order->order_id)->where('payment_status', 'paid')
                    ->update(['payment_status' => 'refunded']);
            }

            $order->order_status = $nextStatus;
            $order->save();
        });

        return to_route('admin.orders.index')->with('admin_success', 'Đã cập nhật trạng thái đơn hàng.');
    }
}