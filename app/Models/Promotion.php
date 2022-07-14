<?php

namespace App\Models;

use App\Models\Year;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory,SoftDeletes;
    protected $factories = [
        'promotion_name',
    ];

    public function year(){
        return $this->belongsTo(Year::class);
    }
}
