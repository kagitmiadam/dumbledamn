<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterQuiz extends Model
{
    protected $guarded = [];

    protected $table = "character_quiz";

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }
}
