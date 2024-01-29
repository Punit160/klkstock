<?php

namespace App\Imports;

use App\Models\Tax;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Http\Request;
use Session;


class TaxImport implements ToModel, WithStartRow
{
    private $savedCount;
    private $usercompany;
    private $useremployee;





    public function __construct($usercompany, $useremployee)
    {
        $this->savedCount = 0;
        $this->usercompany = $usercompany;
        $this->useremployee = $useremployee;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $Tax = new Tax([
            'name' => $row[0],
            'rate' => $row[1],
            'date' => date('d-m-Y'),
            'company_id' =>  $this->usercompany,
            'created_by' =>  $this->useremployee,
        ]);
        if ($Tax->save()) {
            $this->savedCount++;
        }
        return $Tax;
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
