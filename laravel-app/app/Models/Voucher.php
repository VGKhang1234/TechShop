<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voucher extends Model
{
    protected $primaryKey = 'voucher_id';

    public $timestamps = false;

    protected $fillable = [
        'code', 'description', 'discount_type', 'discount_value', 'min_order_value',
        'max_discount_amount', 'start_at', 'end_at', 'usage_limit', 'used_count', 'status',
    ];

    protected function casts(): array
    {
        return [
            'start_at' => 'datetime',
            'end_at' => 'datetime',
        ];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'voucher_id');
    }
}