<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "lesson";
    
    public function school_grade() {
        return $this->belongsTo(SchoolGrade::class, 'school_grade_id');
    }
}
