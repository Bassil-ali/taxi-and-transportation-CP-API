<?php

namespace App\Http\Request\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class WebsitRequest extends FormRequest
{

    public function authorize(): bool
    {
        return permissionAdmin('create-settings');

    }//end of authorize

    public function rules(): array
    {
        $rules = [];

        $rules['websit_logo'] = ['nullable','image'];

        foreach(getLanguages() as $language) {

            $rules['websit_title.' . $language->code]       = ['required','string','min:2','max:150'];
            $rules['websit_description.' . $language->code] = ['required','string','min:2'];
            $rules['websit_keywords.' . $language->code]    = ['required','string'];
        }

        return $rules;

    }//end of rules

    public function attributes(): array
    {
        $rules = [];

        $rules['websit_logo'] = trans('admin.global.logo');

        foreach(getLanguages() as $language) {

            $rules['websit_title.' . $language->code] = trans('admin.global.by', ['name' => trans('admin.global.name'), 'lang' => $language->name]);
            $rules['websit_description.' . $language->code] = trans('admin.global.by', ['name' => trans('admin.global.description'), 'lang' => $language->name]);
            $rules['websit_keywords.' . $language->code] = trans('admin.global.by', ['name' => trans('admin.settings.keywords'), 'lang' => $language->name]);
        }

        return $rules;

    }//end of attributes

}//end of class