<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'studentClasse',
        'studentPromotion',
        'year_id',
        'students_ids',
        'destination_class',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function getAttributes()
    {
        return $this->attributes;
    }
}
