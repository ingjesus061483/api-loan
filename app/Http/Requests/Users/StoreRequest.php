<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'name'=>'required|unique:users|max:50',
            'email'=>'required|email|max:255|unique:users',
            'password'=>['required','confirmed',Password::default()],            
      
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
