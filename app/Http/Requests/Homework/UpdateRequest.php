<?php

namespace App\Http\Requests\Homework;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;
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
            'user_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
            'client_id' => 'required|integer|exists:clients,id',
            'remark' => 'required|string|max:255',
            'state_homework_id' => 'required|integer|exists:state_homework,id',

            //
        ];
    }
    public function messages(){
        return [
            'user_id.required' => 'El :attribute es obligatorio.',
            'user_id.integer' => 'El :attribute debe ser un número entero.',
            'user_id.exists' => 'El :attribute no existe.',
            'date.required' => 'La :attribute es obligatoria.',
            'date.date' => 'La :attribute no es una fecha válida.',
            'client_id.required' => 'El :attribute es obligatorio.',
            'client_id.integer' => 'El :attribute debe ser un número entero.',
            'client_id.exists' => 'El :attribute no existe.',
            'remark.required' => 'La :attribute es obligatoria.',
            'remark.string' => 'La :attribute debe ser una cadena de texto.',
            'remark.max' => 'La :attribute no debe ser mayor a 255 caracteres.',
            'state_homework_id.required' => 'El :attribute es obligatorio.',
            'state_homework_id.integer' => 'El :attribute debe ser un número entero.',
            'state_homework_id.exists' => 'El :attribute no existe.',
        ];       
    }
    public function attributes(){
        return [
            'user_id' => 'usuario',
            'date' => 'fecha',
            'client_id' => 'cliente',
            'remark' => 'observación',
            'state_homework_id' => 'estado de la tarea',
        ];
    }
    protected function failedAuthorization()
    {
        
        throw new HttpResponseException(response()->redirectTo(url('/UnAutorize'))
            ->with(['error' => 'Esta accion no esta autorizada!']));
    }
}
