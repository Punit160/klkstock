<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'purch_code', 'date', 'document', 'warehouse', 'supplier', 'purch_status', 'ord_tax', 'tc', 'disct', 'ship_cst', 'created_by'];

    public function propurchase()
    {
        return $this->hasMany(Propurchase::class);
    }
}
