<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'slug'      => 'required|unique:posts,slug',
            'title'     => 'required',
            'content'   => 'required',
            'published' => 'required|boolean',
            'postedAt'  => 'required',
        ];
    }
}
