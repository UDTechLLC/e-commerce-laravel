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
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'address'       => 'required',
            'country'       => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'postcode'      => 'required',
            'phone'         => 'required',
            'product_cost'  => 'required',
            'shipping_cost' => 'required',
//            'total_cost'    => 'required',
            'count'         => 'required',
        ];
    }
}
