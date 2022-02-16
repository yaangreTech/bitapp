<?php

namespace App\Models;

use App\Models\Branche;
use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory,SoftDeletes;

    public $timestamps = true;

    protected $fillable=[
        'department',
    ];

    
    public function classes() {
        return $this->hasManyThrough(Classe::class, Branche::class);
    }

    // public function classes() {
    //     return $this->hasMany(Classe::class);
    // }

    public function branches(){
        return $this->hasMany(Branche::class);
    }
}
