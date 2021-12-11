<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodCupDetail extends Model
{
    protected $guarded = [];

    protected $table = "period_cup_detail";

    public function school_class(){
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

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

    public function school(){
        return $this->belongsTo(School::class, 'school_id');
    }

    public function character(){
        return $this->belongsTo(Character::class, 'character_id');
    }

    public function period(){
        return $this->belongsTo(PeriodCup::class, 'period_id');
    }
}
