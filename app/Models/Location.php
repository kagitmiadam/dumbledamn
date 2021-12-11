<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    protected $table = "location";

    public function location_type() {
        return $this->belongsTo(LocationType::class, 'location_type_id');
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
}
