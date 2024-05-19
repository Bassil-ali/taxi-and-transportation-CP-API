<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
            "name_ar"=>'required|string|min:3|max:30|unique:cities,name_ar,' . $this->city->id,
            "name_en"=>'nullable|string|min:3|max:30|unique:cities,name_en,' . $this->city->id,
            "status"=>'required|boolean',
        ];
    }
}
