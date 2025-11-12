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
            'identification'=>'required|max:50|unique:clientes,identificacion,'.$this->id,
            'name'=>'required|max:50',
            'last_name'=>'required|max:50',
            'address'=>'required|max:50',
            'phone'=>'required|max:50',
            'email'=>'required|email|max:255',    
            //
        ];
    }
}
