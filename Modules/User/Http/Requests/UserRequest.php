<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if ($this->isMethod('post'))
            return [
                'name' => ['nullable', 'max:120', 'min:1', 'required_without:first_name,last_name'],
                'first_name' => ['nullable', 'max:120', 'min:1','required_without:name'],
                'last_name' => ['nullable', 'max:120', 'min:1','required_without:name'],
                'mobile' => ['nullable', 'digits:11', 'unique:users'],
                'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
//                'password' => ['confirmed'],
//                'password' => [Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
//                'password_confirmation' => [Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(),],
//                'password_confirmation' => [],
                'profile_photo_path' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
                'activation' => ['numeric', Rule::in(['0', '1'])],
                'slug' => [Rule::unique('users', 'slug')]
            ];

        else
            return [
                'name' => ['nullable', 'max:240', 'min:1'],
                'first_name' => ['nullable', 'max:120', 'min:1'],
                'last_name' => ['nullable', 'max:120', 'min:1'],
                'mobile' => ['nullable', 'digits:11', 'unique:users'],
                'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
//                'password' => ['sometimes','confirmed'],
//                'password' => [Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
//                'password_confirmation' => [Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(),],
//                'password_confirmation' => [],
                'profile_photo_path' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
                'activation' => ['numeric', Rule::in(['0', '1'])],
                'slug' => [Rule::unique('users', 'slug')->ignore($this->user->id)]
            ];

    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    public function attributes() {
        return [
            'name' => 'نام کاربری'
        ];
    }
}
