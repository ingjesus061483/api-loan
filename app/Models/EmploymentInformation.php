<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentInformation extends Model
{
    use HasFactory;
    protected $table='employment_informations';
    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
    protected $fillable=[
        
        'id',
        'nit_company_work',
        'company_works',
        'main_address',
        'city_id',
        'company_on_mission',
        'nit',
        'branch_address',
        'entry_date',
        'average_monthly_salary',
        'current_position',
        'state_id',
        'client_id',
        'payment_frequency_id',
        'company_payment_date_id',
        'customer_payment_date_id',
        'contract_type_id',
        'eps_affiliate_id',
        'arl_affiliate_id' 
    ];
}
