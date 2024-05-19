<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            "name_ar"=>'required|string|min:3|max:30|unique:regions',
            "name_en"=>'nullable|string|min:3|max:30|unique:regions',
            'city_id'=>'required|exists:cities,id',
            "status"=>'required|boolean',
        ];
    }
}
