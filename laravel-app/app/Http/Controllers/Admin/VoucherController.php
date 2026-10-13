<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class VoucherController extends Controller
{
    public function index(): View
    {
        $vouchers = Voucher::query()->orderByDesc('start_at')->paginate(15);

        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create(): View
    {
        return view('admin.vouchers.form', ['voucher' => new Voucher(), 'editing' => false]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateVoucher($request);
        $validated['code'] = Str::upper(trim($validated['code']));
        $validated['used_count'] = 0;
        Voucher::query()->create($validated);

        return to_route('admin.vouchers.index')->with('admin_success', 'Đã tạo voucher.');
    }

    public function edit(int $voucher): View
    {
        return view('admin.vouchers.form', ['voucher' => Voucher::query()->findOrFail($voucher), 'editing' => true]);
    }

    public function update(Request $request, int $voucher): RedirectResponse
    {
        $voucher = Voucher::query()->findOrFail($voucher);
        $validated = $this->validateVoucher($request, $voucher);
        $validated['code'] = Str::upper(trim($validated['code']));
        $voucher->update($validated);

        return to_route('admin.vouchers.index')->with('admin_success', 'Đã cập nhật voucher.');
    }

    public function destroy(int $voucher): RedirectResponse
    {
        try {
            Voucher::query()->findOrFail($voucher)->delete();
        } catch (QueryException) {
            return back()->withErrors(['delete' => 'Không thể xóa voucher đang được tham chiếu bởi đơn hàng.']);
        }

        return to_route('admin.vouchers.index')->with('admin_success', 'Đã xóa voucher.');
    }

    private function validateVoucher(Request $request, ?Voucher $voucher = null): array
    {
        return $request->validate([
            'code' => ['required', 'string', 'max:50', Rule::unique('vouchers', 'code')->ignore($voucher?->voucher_id, 'voucher_id')],
            'description' => ['nullable', 'string', 'max:255'],
            'discount_type' => ['required', Rule::in(['percentage', 'fixed'])],
            'discount_value' => ['required', 'numeric', 'gt:0'],
            'min_order_value' => ['required', 'numeric', 'min:0'],
            'max_discount_amount' => ['nullable', 'numeric', 'gt:0'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date', 'after:start_at'],
            'usage_limit' => ['nullable', 'integer', 'min:1'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);
    }
}