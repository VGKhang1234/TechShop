<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    public $timestamps = false;

    protected $fillable = ['category_name', 'slug', 'description', 'image_url'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}