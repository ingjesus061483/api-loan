<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;
    protected $table='contact_informations';
    public function client()
    {
      return  $this->belongsTo(Client::class,'client_id');
    }
    public function phone_type(){
       return $this->belongsTo(PhoneType::class,'phone_type_id');
    }
}
