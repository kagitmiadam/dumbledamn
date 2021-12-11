<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    public function run()
    {
        $school = new School();
        $school->name = "Hogwarts";
        $school->description = "Hogwarts hakkında açıklama";
        $school->status = 1;
        $school->save();

        $school = new School();
        $school->name = "Ilvermory";
        $school->description = "Ilvermory hakkında açıklama";
        $school->status = 1;
        $school->save();
    }
}
