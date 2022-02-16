<?php

namespace App\Models;

use App\Models\Tu;
use App\Models\Module;
use App\Models\Branche;
use App\Models\Semester;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'classe_name',
        'classe_branch',
        'classe_level',
        'classe_semester_2',
        'classe_semester_1',
    ];

    public function semestre_names() {
        return $this->belongsToMany(Semestre_name::class,'semesters');
    }

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
