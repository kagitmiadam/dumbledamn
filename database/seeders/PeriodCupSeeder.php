<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PeriodCup;

class PeriodCupSeeder extends Seeder
{
    public function run()
    {
        $start_date = ""; $end_date = "";
        date_default_timezone_set("Europe/Istanbul");
        $start_date = date('Y-m-d H:i:s', strtotime($start_date . ' +1 minute'));
        $end_date = date('Y-m-d H:i:s', strtotime($end_date . ' +5 minute'));

        $lists = [
            // Hogwarts
            ["2022", 1, rand(0,0), 1, 1, rand(0,0), 2, rand(0,0), 3, rand(0,0), 4, rand(0,0), 0, $start_date, $end_date],

        ];

        foreach ($lists as $list) {
            PeriodCup::create([
                'name'          => $list[0] . " Yılı " . $list[1] . ". Dönem Kupası",
                'description'   => $list[0] . " Yılı " . $list[1] . ". Dönem Kupası hakkında bilgi",
                'year'          => $list[0],
                'period'        => $list[1],
                'reward'        => $list[2],
                'school_id'     => $list[3],
                'class_id_1'    => $list[4],
                'point_1'       => $list[5],
                'class_id_2'    => $list[6],
                'point_2'       => $list[7],
                'class_id_3'    => $list[8],
                'point_3'       => $list[9],
                'class_id_4'    => $list[10],
                'point_4'       => $list[11],
                'status'        => $list[12],
                'start_date'    => $list[13],
                'end_date'      => $list[14],
            ]);
        }
    }
}
