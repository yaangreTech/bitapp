<?php

namespace App\Models;

use App\Models\Mark;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory,SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes=['marks'];

    protected $fillable = [
        'test_type',
        'test_label',
        'test_ration',
    ];

    public function marks(){
        return $this->hasMany(Mark::class);
    }


    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function markOf($inscID){
        $inscID = intval($inscID);
        return $this->hasOne(Mark::class)->where('inscription_id',$inscID)->first();
    }

    public function getAttributes()
    {
        return $this->attributes;
    }
}
