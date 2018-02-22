<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class BillingRequest extends FormRequest
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
            'firstName'    => 'required',
            'lastName'     => 'required',
            'email'        => 'required',
            'address'      => 'required',
            'country'      => 'required',
            'city'         => 'required',
            'state'        => 'required',
            'postcode'     => 'required',
            'phone'        => 'required',
        ];
    }
}
