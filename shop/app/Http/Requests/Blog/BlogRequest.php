<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'name' => 'required',
            'menu_id' => 'required',
            'thumb' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter blog name',
            'menu_id.required' => 'Please select a category for the blog',
            'thumb.required' => 'Profile picture cannot be empty'
        ];
    }
}
