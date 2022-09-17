<?php

namespace App\Models;

use App\Models\Tu;
use App\Models\Level;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory,SoftDeletes, CascadeSoftDeletes;

    // public function semestre_name() {
    //     return $this->belongsTo(Semestre_name::class);
    // }

    protected $cascadeDeletes=['tus'];

    public function tus($yearID) {
        return $this->hasMany(Tu::class)->where('year_id',$yearID)->orderBy('id')->get();
    }

    public function level() {
        return $this->belongsTo(Level::class);
    }

    public function modulus($yearID) {
        // dd(Tu::where('year_id', $yearID)->select('id')->pluck('id')->toArray());
        return $this->hasManyThrough(Module::class,Tu::class)->whereIn('tu_id', Tu::where('year_id', $yearID)->select('id')->pluck('id')->toArray())->get();
    }

    public function getAttributes(){
        return $this->attributes;
    }
}
