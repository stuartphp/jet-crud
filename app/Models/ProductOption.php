<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    protected $table = 'product_options';
    protected $fillable = [
        'product_id',
        'additional',
        'product_unit_id',
        'deductable',
        'retail_price',
        'special_price',
        'special_from',
        'special_to'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function option()
    {
        return $this->belongsTo(ProductUnit::class);
    }
}
