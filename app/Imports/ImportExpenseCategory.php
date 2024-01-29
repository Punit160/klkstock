<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Expensecategory;
use Session;

class ImportExpenseCategory implements ToCollection
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
            Expensecategory::create([ 
                'name' => $row[0],
                'company_id' => $this->companyId,
                'created_by' => $this->employeeId,
            ]);
        }
    }

}
