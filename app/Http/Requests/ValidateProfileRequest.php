<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProfileRequest extends FormRequest
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
            'mobile' => 'bail|required|min:10|integer',
            'address' => 'required|min:10',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|integer'
        ];
    }
}
