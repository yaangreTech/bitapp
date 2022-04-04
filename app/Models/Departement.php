<?php

namespace App\Models;

use App\Models\User;
use App\Models\Level;
// use App\Models\Classe;
use App\Models\Manage;
use App\Models\Branche;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory,SoftDeletes, CascadeSoftDeletes;

    public $timestamps = true;

    protected $fillable=[
        'department',
    ];

    protected $cascadeDeletes=['heads','branches'];


    public function levels() {
        return $this->hasManyThrough(Level::class, Branche::class);
    }

    public function heads() {
        return $this->belongsToMany(User::class,Manage::class);
    }

    public function branches(){
        return $this->hasMany(Branche::class);
    }
}
