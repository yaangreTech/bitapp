<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Right extends Model
{
    use HasFactory,SoftDeletes;

function users(){
    return $this->hasMany(User::class);
}
}
