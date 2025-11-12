<?php

namespace App\Http\Requests\EmploymentInformation;

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
            'client_id'=>'required',       
            'company_works'=>'required|max:100',
            'nit_company_works'=>'required|max:50',
            'main_address'=>'required|max:50',
            'city'=>'required',
            'state'=>'required',
            'entry_date'=>'required',
            'average_monthly_salary'=>'required|numeric',
            'current_position'=>'required',
            'payment_frequency'=>'required',
            'company_payment_date'=>'required',
            'custemer_payment_date'=>'required',
            'contract_type'=>'required',
            'eps_affiliate'=>'required',
            'arl_affiliate'=>'required',
    
            //
        ];
    }
}
