<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityHolder extends Model
{
    use HasFactory;
   protected $table='quality_holders';
   public function clients()
    {
        return $this->hasMany(Client::class,'quality_holder_id');              
    }
}
