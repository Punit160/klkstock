<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Unit;
use Session;

class ImportUnit implements ToCollection
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
            Unit::create([
                'company_id' => $this->companyId,
                'unit_code' => $row[0],
                'unit_name' => $row[1],
                'base_unit' => $row[2],
                'operator' => $row[3],
                'operation_value' => $row[4],
                'created_by' => $this->employeeId,
            ]);
        }
}

}