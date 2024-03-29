<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserUpdateRequest extends FormRequest
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
                'username' => ['required', 'min:3', 'unique:users,name,' . $this->user->id],
                'email' => ['required', 'email', 'unique:users,email,'. $this->user->id],
                'password' => ['nullable', 'confirmed', 'min:6'],
                'role' => ['required', 'integer'],
        ];
    }
}
