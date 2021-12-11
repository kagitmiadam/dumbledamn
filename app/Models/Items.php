<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "item";

    public function Core(){
        return $this->belongsTo(Core::class, 'core_id');
    }

    public function Wood() {
        return $this->belongsTo(Wood::class, 'wood_id');
    }

    public function Tier() {
        return $this->belongsTo(Tier::class, 'tier_id');
    }
}
