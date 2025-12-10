<?php

namespace App\Http\Requests\NewnessType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;
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
       protected function failedAuthorization()
    {
        
        throw new HttpResponseException(response()->redirectTo(url('/UnAutorize'))
            ->with(['error' => 'Esta accion no esta autorizada!']));
    }
    public function rules(): array
    {
        return [
            'name' => 'required|max:50',

            //
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',       
            'name.max' => 'El :attribute no debe ser mayor a 50 caracteres.', 
        ];    
    }
    public function attributes()
    {
        return [
            'name' => 'nombre del tipo de documento', 
        ];
    }
}
