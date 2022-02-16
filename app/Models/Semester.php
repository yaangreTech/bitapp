<?php

namespace App\Models;

use App\Models\Tu;
use App\Models\Classe;
use App\Models\Module;
use App\Models\Semestre_name;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory,SoftDeletes;

    public function semestre_name() {
        return $this->belongsTo(Semestre_name::class);
    }

    public function tus() {
        return $this->hasMany(Tu::class);
    }

    public function modulus() {
        return $this->hasManyThrough(Module::class,Tu::class);
    }

    public function classe(){
        return $this->belongsTo(Classe::class);
    }
}
