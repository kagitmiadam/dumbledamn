<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolClass;

class SchoolClassSeeder extends Seeder
{
    public function run()
    {
        $classes = new SchoolClass();
        $classes->name = "Gryffindor";
        $classes->description = "Gryffindor sınıfı";
        $classes->school_id = 1;
        $classes->color = "gryffindor";
        $classes->image = "img/house-logo/gryffindor.png";
        $classes->image_flat = "img/house-logo/gryffindor-flat.png";
        $classes->save();

        $classes = new SchoolClass();
        $classes->name = "Slytherin";
        $classes->description = "Slytherin sınıfı";
        $classes->school_id = 1;
        $classes->color = "slytherin";
        $classes->image = "img/house-logo/slytherin.png";
        $classes->image_flat = "img/house-logo/slytherin-flat.png";
        $classes->save();

        $classes = new SchoolClass();
        $classes->name = "Hufflepuff";
        $classes->description = "Hufflepuff sınıfı";
        $classes->school_id = 1;
        $classes->color = "hufflepuff";
        $classes->image = "img/house-logo/hufflepuff.png";
        $classes->image_flat = "img/house-logo/hufflepuff-flat.png";
        $classes->save();

        $classes = new SchoolClass();
        $classes->name = "Ravenclaw";
        $classes->description = "Ravenclaw sınıfı";
        $classes->school_id = 1;
        $classes->color = "ravenclaw";
        $classes->image = "img/house-logo/ravenclaw.png";
        $classes->image_flat = "img/house-logo/ravenclaw-flat.png";
        $classes->save();
    }
}
