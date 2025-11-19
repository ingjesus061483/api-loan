<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPolicy extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'policy_id',
        'acept',
    ];
}
