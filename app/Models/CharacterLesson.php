<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterLesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "character_lesson";

    public function character() {
        return $this->belongsTo(Character::class, 'character_id');
    }

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}
