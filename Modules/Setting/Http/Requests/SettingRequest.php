<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['nullable','max:150', 'min:2'],
            'terms' => ['nullable','max:20480', 'min:2'],
            'keywords' => ['nullable','max:100', 'min:2'],
            'copyright' => ['nullable','max:100', 'min:2'],
            'description' => ['nullable','max:20480', 'min:2'],
            'address' => ['nullable', 'max:20480', 'min:2'],
            'phone' => ['nullable', 'string'],
            'mobile' => ['nullable','numeric', 'digits:11'],
            'google_map' => ['nullable', 'url'],
            'logo' => ['nullable','image', 'mimes:png,jpg,jpeg,gif'],
            'icon' => ['nullable','image', 'mimes:png,jpg,jpeg,gif'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
