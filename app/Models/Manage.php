<?php

namespace App\Models;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manage extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_departement',
    ];

    public function department(){
        return $this->belongsTo(Departement::class);
    }
}
