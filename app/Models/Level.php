<?php

namespace App\Models;

use App\Models\Tu;
use App\Models\Branche;
use App\Models\Semester;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory, CascadeSoftDeletes;

    protected $cascadeDeletes = ['semesters','inscriptions' ];

    public function semesters() {
        return $this->hasMany(Semester::class);
    }

    public function tus() {
            return $this->hasManyThrough(Tu::class, Semester::class);
    }

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    public function branche(){
        return $this->belongsTo(Branche::class);
    }
}
