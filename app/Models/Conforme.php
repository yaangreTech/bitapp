<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conforme extends Model
{
    use HasFactory;


    public function conformeOf($average){
        return Conforme::all()->where('initial','<=',$average)->where('final','>=',$average)->last();
    }

    public function getAttributes(){
        return $this->attributes;
    }
}
