<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'code',
        'name',
        'slug',
        'short_description',
        'description',
        'keywords',
        'on_hand',
        'product_unit_id',
        'product_category_id',
        'cost_price',
        'is_feature',
        'is_service',
        'is_active',
    ];

    public function category()
    {
        return $this->hasOne(ProductCategory::class);
    }
    public function unit()
    {
        return $this->hasOne(ProductUnit::class);
    }
    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
