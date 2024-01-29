<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\ProductCategory;
use Session;

class ImportProductCategory implements ToCollection
{
    protected $companyId;
    protected $employeeId;

    public function __construct($companyId, $employeeId)
    {
        $this->companyId = $companyId;
        $this->employeeId = $employeeId;
    }

    public function collection(Collection $rows)
    {
        // Skip the first row as it contains headers
        $rows = $rows->slice(1);
        
        foreach ($rows as $row) {
            ProductCategory::create([
                'company_id' => $this->companyId,
                'name' => $row[0],
                'parent_category' => $row[1],
                'no_product' => 0,
                'stock_qty' => 0,
                'created_by' => $this->employeeId,
            ]);
        }
    }

    }