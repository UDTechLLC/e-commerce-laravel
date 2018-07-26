<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $user = $this->route()->parameter('user');

        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => "required|email|unique:users,email,{$user->id}",
            'password'   => 'nullable|min:5',
            'image'      => 'required'
        ];
    }
}
