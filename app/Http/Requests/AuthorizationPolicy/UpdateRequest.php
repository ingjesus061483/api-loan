<?php

namespace App\Http\Requests\AuthorizationPolicy;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
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
            'title' => 'required|max:50',
            'description' => 'required',
            //
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'El :attribute es obligatorio.',       
            'title.max' => 'El :attribute no debe ser mayor a 50 caracteres.', 
            'description.required' => 'La :attribute es obligatoria.',       
        ];    
    }
    public function attributes()
    {
        return [
            'title' => 'título de la política de autorización',
            'description' => 'descripción de la política de autorización',
        ];
    }
}
