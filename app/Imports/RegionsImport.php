<?php

namespace App\Imports;

use App\Models\Region;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegionsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $name_ar = $row['arabic_name'];

        if($name_ar ){

        return new Region([
            //
            'name_ar' =>   $name_ar,
            'name_en' => $row['english_name'],
            'city_id' =>   $row['id'],
            'status' => 1,
        ]);
    }
    }
}
