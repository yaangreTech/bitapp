<?php

namespace App\Models;

use App\Models\Level;
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
        'branch_i_level',
'branch_f_level'
    ];

    public function levels(){
        return $this->hasMany(Level::class);
    }

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function semesters(){
        return $this->hasManyThrough(Semester::class, Level::class);
    }
}
