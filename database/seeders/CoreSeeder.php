<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Core;

class CoreSeeder extends Seeder
{
    public function run()
    {
        $cores = [
            // 0                            1       2       3       4      5
            ["Snallygaster", "Yüreği Teli"  , 12    , 7     , 4    , 300   , "Başlangıç"],
            ["Jackalope", "Boynuzu"         , 10    , 10    , 3    , 200   , "Başlangıç"],
            ["Basilisk", "Boynuzu"          , 7     , 12    , 4    , 300   , "Başlangıç"],
            ["Göl Canavarı", "Dikeni"       , 5     , 15    , 5    , 400   , "Başlangıç"],
        ];
        foreach ($cores as $core) {
            Core::create([
                'name'              => $core[0] . " " . $core[1] . " Özü",
                'short_name'        => $core[0] . " ". $core[1],
                'description'       => $core[0] . " " . $core[1] . " özü hakkında bilgi.",
                'core_description'  => $core[0] . " " . $core[1] . " özü eklenerek hazırlanmıştır.",
                'core_name'         => $core[0] . " " . $core[1] . " Özü",
                'attack_power'      => $core[2],
                'defence_power'     => $core[3],
                'speed_power'       => $core[4],
                'price'             => $core[5],
                'type'              => $core[6],
            ]);
        }
    }
}
