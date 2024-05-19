<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProposalRequest extends FormRequest
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
            'ad_id'            =>'required|exists:ads,id',
            'price'            =>'required|numeric|min:1',
            'details'          =>'required|string|min:20|max:250',
            // "status"           =>'required|boolean',
            // 'dues'             =>'required|numeric|min:1',
            // 'commission'       =>'required|numeric',

        ];
    }
}
