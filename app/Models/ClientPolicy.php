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
    public function policy()
    {
        return $this->belongsTo(AuthorizationPolicy::class, 'policy_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
