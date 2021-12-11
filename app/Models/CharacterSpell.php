<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterSpell extends Model
{
    protected $guarded = [];

    protected $table = "character_spell";

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function spell()
    {
        return $this->belongsTo(Spell::class);
    }

    public function level()
    {
        return $this->belongsTo(SpellLevel::class, 'level_id');
    }
}
