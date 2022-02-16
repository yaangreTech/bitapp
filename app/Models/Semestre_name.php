<?php

namespace App\Models;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semestre_name extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'semester'
    ];
    public $timestamps = true;

    public function affectations(){
        return $this->hasMany(Semester::class);
    }
}
