<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table="loans";
    protected $fillable=[
        'id',
        'reference',
        'ammount',
        'term',
        'client_id',
        'warranty_id'
    ];
}
