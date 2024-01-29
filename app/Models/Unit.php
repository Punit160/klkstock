<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable =[
        'company_id', 'unit_code', 'unit_name', 'base_unit', 'operator', 'operation_value', 'created_by'
    ];
}
