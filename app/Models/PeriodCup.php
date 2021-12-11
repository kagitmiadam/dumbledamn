<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SchoolClass;

class PeriodCup extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "period_cup";

    public function class_1(){
        return $this->belongsTo(SchoolClass::class, 'class_id_1');
    }

    public function class_2(){
        return $this->belongsTo(SchoolClass::class, 'class_id_2');
    }

    public function class_3(){
        return $this->belongsTo(SchoolClass::class, 'class_id_3');
    }

    public function class_4(){
        return $this->belongsTo(SchoolClass::class, 'class_id_4');
    }

    public function Classes(){
        return $this->belongsTo(SchoolClass::class, 'id');
    }

    public function School(){
        return $this->belongsTo(School::class, 'school_id');
    }
}
