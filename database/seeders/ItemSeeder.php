<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Core;
use App\Models\Wood;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $core_names     = Core::all();
        $wood_names     = Wood::all();
        /* Asalar | Wands */
        foreach ($core_names as $core_name) {
            foreach ($wood_names as $wood_name) {
                Item::create([
                    'name'          => $core_name->short_name . " " . $wood_name->short_name . " Asası",
                    'short_name'    => $core_name->core_name . " " . $wood_name->short_name . " Asası",
                    'description'   => $wood_name->core_description . $core_name->core_description,
                    'type'          => "Asa",
                    'relevance'     => "Başlangıç",
                    'wood_id'       => $wood_name->id,
                    'core_id'       => $core_name->id,
                    'attack_power'  => $core_name->attack_power + $wood_name->attack_power,
                    'defence_power' => $core_name->defence_power + $wood_name->defence_power,
                    'based_count'   => 1,
                    'price'         => $core_name->price + $wood_name->price
                ]);
            }
        }
        /* Evcil Hayvanlar | Pets */
        $pets = [
            // 0: Name      1: Fiyat    2: Attack   3: Defence  4: Tür
            ["Baykuş"       , 100       , 2         , 2         , "Başlangıç"],
            ["Kurbağa"      , 100       , 2         , 2         , "Başlangıç"],
            ["Kedi"         , 100       , 2         , 2         , "Başlangıç"],
        ];
        foreach ($pets as $pet) {
            Item::create([
                'name'              => $pet[0],
                'short_name'        => $pet[0],
                'description'       => $pet[0] .  " evcil hayvanı hakkında bilgi.",
                'type'              => "Evcil Hayvan",
                'based_count'       => 1,
                'relevance'         => $pet[4],
                'attack_power'      => $pet[2],
                'defence_power'     => $pet[3],
                'price'             => $pet[1],
            ]);
        }
        /* Pelerinler | Gowns */
        $gowns = [
            // 0: İsim          1:Fiyat     2: Attack   3: Defence  4: Tür
            ["Gryffindor"       , 25        , 0         , 1         , "Başlangıç"],
            ["Ravenclaw"        , 25        , 0         , 1         , "Başlangıç"],
            ["Slytherin"        , 25        , 0         , 1         , "Başlangıç"],
            ["Hufflepuff"       , 25        , 0         , 1         , "Başlangıç"],
            ["Mezun"            , 50        , 2         , 3         , "Orta"],
            ["Profesör"         , 100       , 4         , 5         , "Orta"],
            ["Seherbaz"         , 200       , 6         , 7         , "Üst"],
            ["Sihir Bakanlığı"  , 500       , 8         , 9         , "Üst"],
            ["Sihir Bakanı"     , 750       , 10        , 10        , "Üst"],
        ];
        foreach ($gowns as $gown) {
            foreach ($core_names as $core_name) {
                Item::create([
                    'name'              => $core_name->short_name . " ". $gown[0] . " Cübbesi",
                    'short_name'        => $gown[0] . " Cübbesi",
                    'description'       => $gown[0] .  " cübbesi kumaşına ". $core_name->core_description,
                    'type'              => "Pelerin",
                    'relevance'         => $gown[4],
                    'core_id'           => $core_name->id,
                    'price'             => ($gown[1] + $core_name->price),
                    'attack_power'      => ($gown[2] + $core_name->attack_power),
                    'defence_power'     => ($gown[3] + $core_name->defence_power),
                    'based_count'       => 1,
                ]);
            }
        }
        
        /* Süpürgeler | Brooms */
        $brooms = [
            // 0: İsim          1: Fiyat    2: Speed    3: Tür
            ["Silsüpür 11"      , 100       , 6         , "Başlangıç"],
            ["Comet 260"        , 150       , 8         , "Başlangıç"],
            ["Comet 290"        , 200       , 9         , "Başlangıç"],
            ["Ateşoku"          , 250       , 10        , "Başlangıç"],
            ["Ateşoku Supreme"  , 350       , 12        , "Başlangıç"],
            ["Aydüzeltici"      , 300       , 13        , "Başlangıç"],
            ["Yıldırımoku VII"  , 400       , 15        , "Başlangıç"],
            ["Nimbus 2000"      , 350       , 16        , "Başlangıç"],
            ["Nimbus 2001"      , 400       , 18        , "Başlangıç"],
        ];
        foreach ($brooms as $broom) {
            foreach ($core_names as $core_name) {
                Item::create([
                    'name'              => $core_name->short_name . " ". $broom[0],
                    'short_name'        => $broom[0],
                    'description'       => $broom[0] .  " süpürgesi içerisine " . $core_name->core_description,
                    'type'              => "Süpürge",
                    'relevance'         => $broom[3],
                    'core_id'           => $core_name->id,
                    'price'             => ($broom[1] + $core_name->price),
                    'speed_power'       => ($broom[2] + $core_name->speed_power),
                    'based_count'       => 1,
                ]);
            }
        }
    }
}
