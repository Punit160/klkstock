<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'product_code',
        'type',
        'category',
        'brand',
        'product_unit',
        'sale_unit',
        'purchase_unit',
        'cost',
        'price',
        'dso',
        'alert_qty',
        'product_tax',
        'tax_method',
        'detail',
        'image',
        'initial_stock',
        'created_by',
    ];

    public function options()
    {
        return $this->belongsToMany(Option::class)->withPivot(['value', 'company_id']);
    }

    public function variations()
    {
        return $this->belongsToMany(Variation::class)->withPivot(['quantity', 'company_id']);
    }

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class)->withPivot('quantities', 'company_id');
    }
}
