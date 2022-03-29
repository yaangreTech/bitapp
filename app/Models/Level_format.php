<?php

namespace App\Models;

use App\Models\Semester_format;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level_format extends Model
{
    use HasFactory;

    protected $fillable = [
        'levels_range'
    ];

    public function semester_formats(){
        return $this->hasMany(Semester_format::class);
    }
}
