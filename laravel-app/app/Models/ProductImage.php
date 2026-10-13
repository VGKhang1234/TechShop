<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $primaryKey = 'image_id';

    public $timestamps = false;

    protected $fillable = ['product_id', 'image_url', 'alt_text', 'is_primary', 'sort_order'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}