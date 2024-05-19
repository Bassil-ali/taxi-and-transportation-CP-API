<?php

namespace App\Http\Request\Admin\App\Location\City;

use Illuminate\Foundation\Http\FormRequest;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
{

    public function authorize(): bool
    {
        if (in_array(request()->method(), ['PUT', 'PATCH'])) {
            
            return permissionAdmin('update-cities');

        } else {

            return permissionAdmin('create-cities');

        }//end of if

    }//end of authorize

    public function rules(): array
    {
        $rules = [
            'status'  => ['nullable', 'in:1,0'],
        ];

        if (in_array(request()->method(), ['PUT', 'PATCH'])) {
            
            $city = request()->route()->parameter('city');

            $rules['name.*'] = ['required','string','min:2','max:50', UniqueTranslationRule::for('cities', 'name')->ignore($city?->id)];

        } else {

            $rules['name.*'] = ['required','string','min:2','max:50', UniqueTranslationRule::for('cities', 'name')];

        } //end of if

        return $rules;

    }//end of rules

    public function attributes(): array
    {
        $rules = [];

        foreach(getLanguages() as $language) {

            $rules['name.' . $language->code] = trans('admin.global.by', ['name' => trans('admin.global.name'), 'lang' => $language->name]);
        }


        return $rules;

    }//end of attributes

    protected function prepareForValidation()
    {
        return request()->merge([
            'admin_id' => auth('admin')->id(),
            'slug'     => str()->slug(request()->name[getLanguages('default')->code] ?? '', '-'),
            'status'   => request()->has('status'),
        ]);

    }//end of prepare for validation

}//end of class