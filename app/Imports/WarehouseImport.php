<?php

namespace App\Imports;

use App\Models\Warehouse;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class WarehouseImport implements ToModel,WithStartRow
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
        $warehouse =new Warehouse([
            'name'=>$row[0],
            'contact' =>$row[1],
             'email' => $row[2],
             'address' => $row[3],
             'date' => date('d-m-Y'),
             'company_id' =>  $this->usercompany,
             'created_by' =>  $this->useremployee,

        ]);
        if ($warehouse->save()) {
            $this->savedCount++;
         }
         return $warehouse;
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
