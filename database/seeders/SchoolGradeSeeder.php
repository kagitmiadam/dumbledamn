<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolGrade;

class SchoolGradeSeeder extends Seeder
{
    public function run()
    {
        $schoolGrade = new SchoolGrade();
        $schoolGrade->name = "1. Sınıf";
        $schoolGrade->description = "1. Sınıf hakkında bilgi.";
        $schoolGrade->status = 1;
        $schoolGrade->save();

        $schoolGrade = new SchoolGrade();
        $schoolGrade->name = "2. Sınıf";
        $schoolGrade->description = "2. Sınıf hakkında bilgi.";
        $schoolGrade->status = 1;
        $schoolGrade->save();

        $schoolGrade = new SchoolGrade();
        $schoolGrade->name = "3. Sınıf";
        $schoolGrade->description = "3. Sınıf hakkında bilgi.";
        $schoolGrade->status = 1;
        $schoolGrade->save();

        $schoolGrade = new SchoolGrade();
        $schoolGrade->name = "4. Sınıf";
        $schoolGrade->description = "4. Sınıf hakkında bilgi.";
        $schoolGrade->status = 1;
        $schoolGrade->save();

        $schoolGrade = new SchoolGrade();
        $schoolGrade->name = "5. Sınıf";
        $schoolGrade->description = "5. Sınıf hakkında bilgi.";
        $schoolGrade->status = 1;
        $schoolGrade->save();

        $schoolGrade = new SchoolGrade();
        $schoolGrade->name = "6. Sınıf";
        $schoolGrade->description = "6. Sınıf hakkında bilgi.";
        $schoolGrade->status = 1;
        $schoolGrade->save();

        $schoolGrade = new SchoolGrade();
        $schoolGrade->name = "7. Sınıf";
        $schoolGrade->description = "7. Sınıf hakkında bilgi.";
        $schoolGrade->status = 1;
        $schoolGrade->save();
    }
}
