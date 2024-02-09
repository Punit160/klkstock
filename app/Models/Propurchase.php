<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propurchase extends Model
{
    use HasFactory;
    protected $table = 'product_purchase';
    protected $fillable = [
        'purchase_id', 'product_type', 'product_code', 'price', 'tax', 'subtotal', 'total', 'discount', 'shiping_cost', 'company_id',
    ];
}
