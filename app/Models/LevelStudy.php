<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelStudy extends Model
{
    use HasFactory;
    protected  $table='level_studies';
    public function clients()
    {
        return $this->hasMany(Client::class,'level_study_id');
    }
}
