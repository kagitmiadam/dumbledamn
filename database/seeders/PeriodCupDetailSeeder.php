<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PeriodCupDetail;

class PeriodCupDetailSeeder extends Seeder
{
    public function run()
    {
        $lists = [
            // Hogwarts
            //#0(desc)     #1(char)   #2(school)  #3(class)   #4(period)  #5(point)   #6(privacy)     #7(status)
            ["açıklama1",  1,         1,          1,          1,         10,         "Genel",        1],
            ["açıklama2",  1,         1,          1,          1,         20,         "Genel",        1],
            ["açıklama3",  1,         1,          2,          1,         30,         "Genel",        1],
            ["açıklama4",  1,         1,          2,          1,         40,         "Genel",        1],
            ["açıklama5",  1,         1,          3,          1,         50,         "Genel",        1],
            ["açıklama6",  1,         1,          3,          1,         60,         "Genel",        1],
            ["açıklama7",  1,         1,          4,          1,         70,         "Genel",        1],
            ["açıklama8",  1,         1,          4,          1,         80,         "Genel",        1],
            ["açıklama9",  1,         1,          1,          1,         90,         "Gizli",        1],
            ["açıklama10", 1,         1,          1,          1,         120,        "Gizli",        1],
            ["açıklama11", 1,         1,          2,          1,         130,        "Genel",        1],
            ["açıklama12", 1,         1,          2,          1,         140,        "Genel",        1],
            ["açıklama13", 1,         1,          3,          1,         150,        "Genel",        1],
            ["açıklama14", 1,         1,          3,          1,         160,        "Gizli",        1],
            ["açıklama15", 1,         1,          4,          1,         170,        "Genel",        1],
            ["açıklama16", 1,         1,          4,          1,         180,        "Genel",        1],
        ];

        foreach ($lists as $list) {
            PeriodCupDetail::create([
                'description' => $list[0],
                'character_id' => $list[1],
                'school_id' => $list[2],
                'class_id' => $list[3],
                'period_id' => $list[4],
                'point' => $list[5],
                'privacy' => $list[6],
                'status' => $list[7],
            ]);
        }
    }
}
