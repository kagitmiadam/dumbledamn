<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "lesson";

    public function character()
    {
    	return $this->belongsTo(Character::class, 'professor_id');
    }
    //Class Number
    public function class_number() {
        return $this->belongsTo(ClassNumber::class, 'school_grade_id');
    }
    // NPC Characters
    public function npc() {
        return $this->belongsTo(NpcCharacters::class, 'npc_id');
    }
}
