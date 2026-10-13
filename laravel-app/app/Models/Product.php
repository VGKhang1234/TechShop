<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'category_id', 'brand_id', 'product_name', 'slug', 'sku', 'description',
        'price', 'old_price', 'stock_quantity', 'status',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id')
            ->orderByDesc('is_primary')
            ->orderBy('sort_order');
    }

    public function getPrimaryImageAttribute(): string
    {
        $image = $this->relationLoaded('images')
            ? $this->images->first()
            : $this->images()->first();

        if ($image?->image_url) {
            return $image->image_url;
        }

        return match ($this->slug) {
            'rapoo-n100-wired-optical-mouse' => 'img/13.png',
            'iphone-15-pro-max-256gb' => 'img/iphone-15-pro.jpg',
            'samsung-galaxy-s24-ultra-512gb' => 'img/samsung-s24-ultra.jpg',
            default => 'img/shopping.webp',
        };
    }
}