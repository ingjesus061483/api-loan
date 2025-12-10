<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Exceptions\HttpResponseException;
class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::chack();
    }
    protected function failedAuthorization()
    {
        
        throw new HttpResponseException(response()->redirectTo(url('/UnAutorize'))
            ->with(['error' => 'Esta accion no esta autorizada!']));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:50|unique:clients,identification,'.$this->id,
            'email'=>'required|max:50|unique:clients,identification,'.$this->id,
            'phone'=>'required|max:10',
            'password'=>['required','confirmed',Password::default()],
            //
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'El :attribute es obligatorio',
'phone.required'=>'El :attribute es obligatorio',
'phone.max'=>'El :attribute no debe ser mayor a 10 caracteres',
            'name.unique' => 'La :attribute ya está registrada.',
            'name.max' => 'La :attribute no debe ser mayor a 50 caracteres.',
            'email.required' => 'El :attribute es obligatorio.',
            'email.email' => 'El :attribute debe ser una dirección de correo válida.',
            'email.unique' => 'La :attribute ya está registrada.',
            'email.max' => 'La :attribute no debe ser mayor a 255 caracteres.',
            'password.required' => 'La :attribute es obligatoria.',

        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Email del usuario',
            'password' => 'Contraseña',
            'name'=>'Nombre',
            'phone'=>'Telefono'

        ];
    }
}
