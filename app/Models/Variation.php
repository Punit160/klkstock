<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'product_variation';

    use HasFactory;
    protected $fillable = [
        'product_id', 'variation_id', 'sku', 'quantity', 'warehouse', 'variation_price', 'company_id'
    ];

    public function variations()
    {
        return $this->belongsToMany(Product::class, 'product_variation', 'product_id', 'variation_id')
        ->withPivot(['sku', 'warehouse', 'variation_price','company_id']);
    }

}
