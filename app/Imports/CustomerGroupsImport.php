<?php

namespace App\Imports;

use App\Models\CustomerGroupImport;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\CustomerGroup;
use Maatwebsite\Excel\Concerns\WithStartRow;


class CustomerGroupsImport implements ToModel, WithStartRow
{
    private $savedCount;
    private $usercompany;
    private $useremployee;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($usercompany, $useremployee)
    {
        $this->savedCount = 0;
        $this->usercompany = $usercompany;
        $this->useremployee = $useremployee;
    }
    public function model(array $row)
    {
        $CustomerGroup = new CustomerGroup([
            'name' => $row[0],
            'percentage' => $row[1],
            'company_id' =>  $this->usercompany,
            'created_by' =>  $this->useremployee,

        ]);
        if ($CustomerGroup->save()) {
            $this->savedCount++;
        }
        return $CustomerGroup;
    }
    public function startRow(): int
    {
        return 2; // Start from row 2 (skip the header row)
    }

    public function getSavedCount()
    {
        return $this->savedCount;
    }
}
