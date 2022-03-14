<?php

namespace App\Models;

use App\Models\Parente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory,SoftDeletes;

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
}
