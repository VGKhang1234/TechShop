<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    public $timestamps = false;

    protected $fillable = [
        'order_code', 'user_id', 'voucher_id', 'subtotal', 'discount_amount',
        'shipping_fee', 'total_amount', 'receiver_name', 'receiver_phone',
        'receiver_email', 'shipping_address', 'payment_method', 'order_status',
        'note', 'ordered_at',
    ];

    protected function casts(): array
    {
        return ['ordered_at' => 'datetime'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'order_id');
    }
}