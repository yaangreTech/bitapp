<?php

namespace App\Models;

use App\Models\Tu;
use App\Models\Test;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'module_name',
        'modulus_credict',
        'modulus_hours',
        'modulus_classe',
        'modulus_TU',
    ];

    public function tu(){
        return $this->belongsTo(Tu::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

    // public function marksOf($yearID, $inscID){
    //     $tests=$this->hasMany(Test::class)->where('type','normal')->where('year_id',$yearID);
    //     foreach ($tests as $test) {
    //         $mark= $test->mark($inscID);
    //         $test['mark']= $mark;
    //     }

    //     return $tests;
    // }
}
