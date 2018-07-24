<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $product = $this->route()->parameter('product');
       
        return [
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'imagePreview' => 'required',
            'price' => 'required|numeric',
            'slug' => ['required', "unique:products,slug,{$product->id}", 'min:3']
        ];
    }
}
