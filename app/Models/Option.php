<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table = 'option_product';
    protected $fillable = [
        'product_id', 'option', 'value', 'company_id'
    ];

    public function options()
    {
        return $this->belongsToMany(Product::class, 'option_product', 'product_id', 'option_id')
        ->withPivot(['value', 'company_id']);
    }

}
