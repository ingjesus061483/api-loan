<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatePolicy extends Model
{
    use HasFactory;
    protected $table = 'state_policies'; 
    protected $fillable = [
        'name',
        'description',
    ];
    public function client_policies()
    {
        return $this->hasMany(ClientPolicy::class, 'state_policy_id');
    }

}

