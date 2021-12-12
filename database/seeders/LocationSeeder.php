<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        // Mekanlar
        $location_lists = [
            // name(0)              type(1) permit(2)           pass_str(3) pass(4)     short-link(5)               img-short(6)                img-type(7)     sub-loc(8)      rol-stat(9)     title(10)   icon(11)
            ["Hogwarts"             , 20    , "Herkese Açık"    , 0         , ""        ,  "hogwarts"               ,"img/locations/"           , ".png"        , "Aktif"       , "Aktif"       , null      , "img/icon/"],
            ["Hogsmeade"            , 1     , "Herkese Açık"    , 0         , ""        ,  "hogsmeade"              ,"img/locations/"           , ".png"        , "Aktif"       , "Aktif"       , null      , "img/icon/"],
            ["Diagon Yolu"          , 1     , "Herkese Açık"    , 0         , ""        ,  "diagon-yolu"            ,"img/locations/"           , ".png"        , "Aktif"       , "Aktif"       , null      , "img/icon/"],
            ["Sihir Bakanlıkları"   , 1     , "Şifre"           , 100       , "123456"  ,  "sihir-bakanliklari"     ,"img/locations/"           , ".png"        , "Aktif"       , "Aktif"       , 11        , "img/icon/"],
            ["Azkaban"              , 1     , "Girilmez"        , 0         , ""        ,  "azkaban"                ,"img/locations/"           , ".png"        , "Pasif"       , "Aktif"       , 11        , "img/icon/"],
        ];
        foreach ($location_lists as $location_list) {
            Location::create([
                'name'                  => $location_list[0],
                'description'           => $location_list[0] . " hakkında bilgi.",
                'location_type_id'      => $location_list[1],
                'permit'                => $location_list[2],
                'password_strength'     => $location_list[3],
                'password'              => $location_list[4],
                'image'                 => $location_list[6] . $location_list[5] . $location_list[7],
                'icon'                  => $location_list[11] . $location_list[5] . $location_list[7],
                'sub_location_status'   => $location_list[8],
            ]);
        }
        // Derslikler
        $classrooms = [
            // name(0)                              //type(1)//permit(2)        //pass_str(3) //pass(4)  //short-link(5)             //img-short(6)                  //img-type(7)     //region(8)    //sub-loc(9)
            ["Karanlık Sanatlara Karşı Savunma"     , 19     , "Herkese Açık"   , 0           , ""       ,  "ksks"                  , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["Tılsım"                               , 19     , "Herkese Açık"   , 0           , ""       ,  "tilsim"                , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["Biçim Değiştirme"                     , 19     , "Herkese Açık"   , 0           , ""       ,  "bicim-degistirme"      , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["İksir"                                , 19     , "Herkese Açık"   , 0           , ""       ,  "iksir"                 , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["Bitki Bilim"                          , 19     , "Herkese Açık"   , 0           , ""       ,  "bitki-bilim"           , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["Sihirli Yaratıklar"                   , 19     , "Herkese Açık"   , 0           , ""       ,  "sihirli-yaratiklar"    , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["Quidditch"                            , 19     , "Herkese Açık"   , 0           , ""       ,  "quidditch"             , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["Kehanet"                              , 19     , "Herkese Açık"   , 0           , ""       ,  "kehanet"               , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["Sihir Tarihi"                         , 19     , "Herkese Açık"   , 0           , ""       ,  "sihir-tarihi"          , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
            ["Kadim Rün"                            , 19     , "Herkese Açık"   , 0           , ""       ,  "kadim-run"             , "img/classrooms/"      , ".png"           , "Hogwarts"   , "Pasif"],
        ];
        foreach ($classrooms as $classroom) {
            Location::create([
                'name'                  => $classroom[0],
                'description'           => $classroom[0] . " hakkında bilgi",
                'location_type_id'      => $classroom[1],
                'permit'                => $classroom[2],
                'password_strength'     => $classroom[3],
                'password'              => $classroom[4],
                'image'                 => $classroom[6] . $classroom[5] . $classroom[7],
                'location_affiliation'  => $classroom[8],
                'sub_location_status'   => $classroom[9],
                'short_link'            => $classroom[5],
            ]);
        }

        // Alt Mekanlar
        $location_lists = [
            // name(0)                              type(1) permit(2)           pass_str(3) pass(4)     short-link(5)           img-short(6)                img-type(7)     region(8)           sub-loc(9)      rol-stat(10)    title(11)
            ["Gringotts Sihirbaz Bankası"           , 5     , "Herkese Açık"    , 0         , ""        ,  "gringotts"          , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Ollivander Asaları"                   , 6     , "Herkese Açık"    , 0         , ""        ,  "ollivander"         , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Gladgras Sihirbaz Cüppeleri"          , 7     , "Herkese Açık"    , 0         , ""        ,  "gladgras"           , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Kitaplar & Tomarlar"                  , 13    , "Herkese Açık"    , 0         , ""        ,  "kitaplar-tomarlar"  , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Bağıran Baraka"                       , 4     , "Şifre"           , 100       , "123456"  ,  "bagiran-baraka"     , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Gelecek Postası Ana Binası"                       , 4     , "Şifre"           , 50        , "123456"  ,  "gelecek-postasi"    ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Gringotts Sihirbaz Bankası"                       , 5     , "Herkese Açık"    , 0         , ""        ,  "gringotts"          ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Ollivander Asaları"                               , 6     , "Herkese Açık"    , 0         , ""        ,  "ollivander"         ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Madam Malkin'in Her Duruma Göre Cüppeleri"        , 7     , "Herkese Açık"    , 0         , ""        ,  "madam-malkin"       ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Kaliteli Quidditch Eşyaları"                      , 8     , "Herkese Açık"    , 0         , ""        ,  "kaliteli-quidditch" ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Obscurus Kitapçısı"                               , 13    , "Herkese Açık"    , 0         , ""        ,  "obscurus"           ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Büyülü Hayvan Mağazası"                           , 9     , "Herkese Açık"    , 0         , ""        ,  "buyulu-hayvan"      ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["İngiltere Sihir Bakanlığı"    , 23        , "Şifre"           , 100       , "123456"      , "ingiltere-sihir-bakanligi"      ,"img/locations/"     , ".png"        , "Sihir Bakanlıkları"      , "Aktif"       , "Pasif"       , null],
        ];
        foreach ($location_lists as $location_list) {
            Location::create([
                'name'                  => $location_list[0],
                'description'           => $location_list[0] . " hakkında bilgi",
                'location_type_id'      => $location_list[1],
                'permit'                => $location_list[2],
                'password_strength'     => $location_list[3],
                'password'              => $location_list[4],
                'image'                 => $location_list[6] . $location_list[5] . $location_list[7],
                'location_affiliation'  => $location_list[8],
                'sub_location_status'   => $location_list[9],
                'short_link'            => $location_list[5],
            ]);
        }
    }
}
