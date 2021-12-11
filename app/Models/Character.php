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
}
