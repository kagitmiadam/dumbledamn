<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    
    protected $guarded = [];

    protected $table = "spell";

    public function type()
    {
        return $this->belongsTo(SpellType::class, 'spell_type_id');
    }

    public function school_grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'spell_type_id');
    }
}
