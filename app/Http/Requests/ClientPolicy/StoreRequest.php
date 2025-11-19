<?php

namespace App\Http\Requests\ClientPolicy;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'policy_id' => 'required|exists:authorization_policies,id',
            //
        ];
    }
    public function messages(): array
    {
        return [
            'client_id.required' => 'El campo cliente es obligatorio.',
            'client_id.exists' => 'El cliente seleccionado no existe.',
            'policy_id.required' => 'El campo política es obligatorio.',
            'policy_id.exists' => 'La política seleccionada no existe.',
        ];
    }
    public function attributes(): array
    {
        return [
            'client_id' => 'cliente',
            'policy_id' => 'política',
        ];
    }
}
