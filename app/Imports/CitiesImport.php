<?php

namespace App\Imports;

use App\Models\City;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CitiesImport implements ToModel , WithValidation , WithHeadingRow
{

    public function rules(): array
    {
        return [
        ];
    }


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $name_ar = $row['arabic_name'];


        // // Convert the text to UTF-8 if it's not already in that format
        // if (!mb_check_encoding($name_ar, 'UTF-8')) {
        //     $name_ar = mb_convert_encoding($name_ar, 'UTF-8');
        // }

        // // Log the text to ensure that it's being properly handled
        // Log::debug('Importing Arabic text: ' . $name_ar);



        if($name_ar ){
            return new City([
                //
                'name_ar' =>   $name_ar,
                'name_en' => $row['english_name'],
                'status' => 1,
            ]);
        }

    }
}
