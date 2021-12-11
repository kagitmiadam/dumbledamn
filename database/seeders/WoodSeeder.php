<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wood;

class WoodSeeder extends Seeder
{
    public function run()
    {
        $wood_lists = [
            // 0: İsim      1: Attack   2: Defence      3: Speed    4: Price    5: Tür
            ["Çınar"        , 10        , 10            , 1         , 100       , "Başlangıç"],
            ["Asma"         , 10        , 10            , 1         , 100       , "Başlangıç"],
            ["Söğüt"        , 10        , 10            , 1         , 100       , "Başlangıç"],
            ["Porsuk"       , 10        , 10            , 1         , 100       , "Başlangıç"],
            ["Maun"         , 10        , 10            , 1         , 100       , "Başlangıç"],
            // 16 Üst - 9 Gelişmiş - 9 Orta - 5 Başlanıç: 39 adet
        ];
        foreach ($wood_lists as $wood_list) {
            Wood::create([
                'name'              => $wood_list[0] . " Ahşabı",
                'description'       => $wood_list[0] . " Ahşabı hakkında bilgi.",
                'core_description'  => $wood_list[0] . " Ahşabı oyularak içerisine, ",
                'short_name'        => $wood_list[0],
                'attack_power'      => $wood_list[1],
                'defence_power'     => $wood_list[2],
                'speed_power'       => $wood_list[3],
                'price'             => $wood_list[4],
                'type'              => $wood_list[5],
            ]);
        }
    }
}
