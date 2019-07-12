<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserRequest extends FormRequest
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
            'username' => ['required', 'min:3', 'unique:users,name', 'alpha_num'],
            'email' => ['required', 'email', 'unique:users'], // unique:table_name
            'password' => ['required', 'confirmed', 'min:6'],
            'role' => ['required', 'integer'],
        ];
    }

    /**
     * Get the validation rules messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.unique' => "Email already exists",
            'email.required' => "Enter your email ID",
            'email.email' => "Please enter a valid email",
            'password.required' => "Enter password"
        ];
    }
}
