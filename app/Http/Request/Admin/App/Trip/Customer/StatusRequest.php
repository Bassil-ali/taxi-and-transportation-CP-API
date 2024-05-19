<?php

namespace App\Http\Request\Admin\App\Trip\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return permissionAdmin('status-trips');

    }//end of authorize

    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric', 'exists:trips,id'],
        ];

    }//end of rules

    public function attributes(): array
    {
        return [
            'id' => trans('admin.global.item'),
        ];        

    }//end of attributes

    protected function prepareForValidation()
    {
        return request()->merge([
            'id'   => (int) request('id'),
        ]);

    }//end of prepare for validation

}//end of class
