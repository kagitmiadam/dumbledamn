<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterInventory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "character_inventory";

    public function item() {
        return $this->belongsTo(Items::class);
    }
}
