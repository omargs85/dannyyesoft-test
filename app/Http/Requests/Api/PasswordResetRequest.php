<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed|min:5|max:16'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Es requerido un email.',
            'token.required' => 'El token es requerido.',
            'password.confirmed' => 'La confirmación de contraseña no corresponde.',
            'password.min' => 'La contraseña debe ser de al menos 8 carácteres.',
            'password.max' => 'La contraseña debe ser de máximo 16 carácteres.'
        ];
    }
}
