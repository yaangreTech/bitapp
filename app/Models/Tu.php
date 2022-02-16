<?php

namespace App\Models;

use App\Models\Module;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tu extends Model
{
    use HasFactory;

    protected $fillable = [
        'TU_name',
        'TU_classe',
        'TU_semester',
    ];
    
    public function semester(){
        return $this->belongsTo(Semester::class);
    }

    public function modulus(){
        return $this->hasMany(Module::class);
    }

}
