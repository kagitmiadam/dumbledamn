<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $guarded = [];

    protected $table = "character";

    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function school_class() {
        return $this->belongsTo(SchoolClass::class);
    }

    public function school_grade() {
        return $this->belongsTo(SchoolGrade::class);
    }

    public function wand() {
        return $this->belongsTo(Item::class);
    }

    public function gown() {
        return $this->belongsTo(Item::class);
    }

    public function broom() {
        return $this->belongsTo(Item::class);
    }

    public function pet() {
        return $this->belongsTo(Item::class);
    }
    
    public function character_spell() {
        return $this->hasMany(CharacterSpell::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function core_preffered(){
        return $this->belongsTo(Core::class, 'preffered_core');
    }
}
