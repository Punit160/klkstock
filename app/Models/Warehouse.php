<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'name',
        'phone',
        'email',
        'address',
        'company_id',
        'no_product',
        'stock_quantity',
        'created_by',
       
    ];
}
