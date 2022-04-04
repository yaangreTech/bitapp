<?php

namespace App\Models;

use App\Models\Parente;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory,SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes=['parent'];

    protected $fillable = [
        'studentID',
        'studentFirstName',
        'studentLastName',
        'studentBirthDate',
        'studentPhone',
        'studentEmail',
        'studentGender',
        // 'studentClasse',
        'studentPromotion',
    ];

    public function parent()
    {
        return $this->hasOne(Parente::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
