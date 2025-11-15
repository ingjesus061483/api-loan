<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'identification'=>'required|max:50|unique:clients,identification,'.$this->id,
            'name_last_name'=>'required|max:100',            
            'address'=>'required|max:100',                          
            'email'=>'required|email|max:50',
            'birth_date'=>'required',
            'expedition_date'=>'required',
            'neighborhood'=>'required|max:50',
            'marital_status' => 'required',
            'study_level' =>'required',          
            //
        ];
    }
}
