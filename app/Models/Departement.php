<?php

namespace App\Models;

use App\Models\User;
use App\Models\Classe;
use App\Models\Manage;
use App\Models\Branche;
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

    public function heads() {
        return $this->belongsToMany(User::class,Manage::class);
    }
    // public function classes() {
    //     return $this->hasMany(Classe::class);
    // }

    public function branches(){
        return $this->hasMany(Branche::class);
    }
}
