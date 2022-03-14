<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Semester;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branche extends Model
{
    use HasFactory,SoftDeletes;

    
    protected $fillable = [
        'branch_name',
        'branch_departement',
    ];

    public function classes(){
        return $this->hasMany(Classe::class);
    }

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function semesters(){
        return $this->hasManyThrough(Semester::class, Classe::class);
    }
}
