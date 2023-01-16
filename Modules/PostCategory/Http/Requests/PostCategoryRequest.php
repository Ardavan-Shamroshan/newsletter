<?php

namespace Modules\PostCategory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => ['required', 'string', 'min:2', 'max:55'],
            'parent_id' => ['nullable', 'string', Rule::exists('post_categories', 'id')],
            'description' => ['nullable', 'string', 'min:2', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
            'status' => ['numeric', Rule::in([0, 1])],
            'tags' => ['nullable', 'string'],
            'slug' => [Rule::unique('post_categories', 'slug')->ignore($this->postcategory)]
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
}
