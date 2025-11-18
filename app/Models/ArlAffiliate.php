<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArlAffiliate extends Model
{
    protected $table="arl_affiliates";
    protected $fillable=[        
        'id',
        'name',
        'description'
    ];
    use HasFactory;
}
