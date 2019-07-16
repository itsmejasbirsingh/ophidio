<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use \Cart as Cart;

class ValidateCheckoutRequest extends FormRequest
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
            'email_id' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'address' => 'min:10',
            'phone' => [ 'bail', 'required', 'integer', 'min:10', 
                function ($field_name, $value, $message) { 

                    if ( substr($value, 0, 2) !== '91' ) {

                        $message($field_name . ' number must start with 91.');
                    }
                    elseif( ! phoneLength( $value ) ){

                        $message( $field_name . ' number must contains 10 digits!');
                    }
                }
            ],
        ];
    }

    public function attributes()
    {
        return [
            'email_id' => 'email address',
        ];
    }

    public function messages()
    {
        return [
            'phone.integer' => 'Invalid phone number',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if ( ! Cart::count() ) {

                $validator->errors()->add('cart_field', 'No cart items found!');
            }
        });
    }

}
