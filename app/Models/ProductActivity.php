<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductActivity extends Model
{
    use HasFactory;
    protected $table = 'product_activities';
    protected $fillable =[
        'product_option_id',
        'action_date',
        'reason',
        'note'
    ];

    public function option()
    {
        return $this->belongsTo(ProductOption::class);
    }
}
