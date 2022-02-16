<?php

namespace App\Models;

use App\Models\Promotion;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'start_date',
        'year_name',
        'promotion_name',
    ];

    public function promotion() {
        return $this->hasOne(Promotion::class);
    }

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }
}
