<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistrationFormRequest extends Request
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
            'username' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:4',
            'password_confirmation' => 'same:password'
        ];
    }
}
