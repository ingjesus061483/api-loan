<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required',Password::default()],
            //
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'El :attribute es obligatorio.',               
            'email.email' => 'El :attribute debe ser una dirección de correo válida.',
            'password.required' => 'La :attribute es obligatoria.',
            
        ];    
    }
    public function attributes()
    {
        return [
            'email' => 'Email del usuario',
            'password' => 'Contraseña',
 
        ];
    }
}
