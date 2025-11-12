<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
  /*  public function messages():array
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'price.required' => 'Añade un :attribute al producto',
            'price.min' => 'El :attribute debe ser mínimo 0'
        ];
    }*/
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'identification'=>'required|unique:clients|max:50',
            'name_last_name'=>'required|max:100',            
            'address'=>'required|max:100',                          
            'email'=>'required|email|max:50',
            'birth_date'=>'required',
            'expedition_date'=>'required',
            'neighborhood'=>'required|max:50',
            'marital_status' => 'required',
            'study_level' =>'required',          //
        ];
    }
}
