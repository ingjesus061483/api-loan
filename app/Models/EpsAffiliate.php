<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpsAffiliate extends Model
{
    protected $table="eps_affiliates";
    protected $fillable=[        
        'id',
        'name',
        'description'
    ];
    use HasFactory;
}
