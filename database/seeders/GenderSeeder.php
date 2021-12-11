<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    public function run()
    {
        $gender = new Gender();
        $gender->name = "Büyücü";
        $gender->description = "Erkek sihirbazlar.";
        $gender->status = 1;
        $gender->save();

        $gender = new Gender();
        $gender->name = "Cadı";
        $gender->description = "Kadın sihirbazlar.";
        $gender->status = 1;
        $gender->save();
    }
}
