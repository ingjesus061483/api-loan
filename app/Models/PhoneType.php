<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneType extends Model
{
    use HasFactory;
    public function contact_informations(){
        return $this->hasMany(ContactInformation::class,'phone_type_id');
    }
}
