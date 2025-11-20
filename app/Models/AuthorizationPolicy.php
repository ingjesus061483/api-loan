<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizationPolicy extends Model
{
    use HasFactory;
    protected $fillable = ['id','title','description'];
    public function client_policies(){
      return $this ->hasMany(ClientPolicy::class,'policy_id');
    }

}
