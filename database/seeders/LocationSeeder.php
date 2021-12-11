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
            // ["Aile Evleri"          , 1     , "Herkese Açık"    , 0         , ""        ,  "aile-evleri"            ,"img/locations/"    , ".png"        , "Aktif"       , "Pasif"       , null ],
            // ["Maceralar"            , 22    , "Herkese Açık"    , 0         , ""        ,  "maceralar"              ,"img/locations/"    , ".png"        , "Aktif"       , "Pasif"       , null ],
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
                'role_play_status'      => $location_list[9],
            ]);
        }
        // Hogwarts Binalar - Yeni bölge eklenince region alanı değişecek.
        $location_houses = [
            // name(0)                  //type(1)//permit(2)        //pass_str(3)//pass(4)  //short-link(5)             //img-short(6)                                      //img-type(7)  //region(8)     //sub-loc(9)    //house(10)
            ["Gryffindor"               , 15     , "Şifre"           , 100       , "123456"  ,  "gryffindor"            , "img/locations/gryffindor-ortak-salon"   , ".png"         , "Hogwarts"    , "Pasif"       , "Gryffindor" ],
            ["Ravenclaw"                , 15     , "Şifre"           , 100       , "123456"  ,  "ravenclaw"             , "img/locations/ravenclaw-ortak-salon"    , ".png"         , "Hogwarts"    , "Pasif"       , "Ravenclaw"  ],
            ["Slytherin"                , 15     , "Şifre"           , 100       , "123456"  ,  "slytherin"             , "img/locations/slytherin-ortak-salon"    , ".png"         , "Hogwarts"    , "Pasif"       , "Slytherin"  ],
            ["Hufflepuff"               , 15     , "Şifre"           , 100       , "123456"  ,  "hufflepuff"            , "img/locations/hufflepuff-ortak-salon"   , ".png"         , "Hogwarts"    , "Pasif"       , "Hufflepuff" ],

            ["Gryffindor Ortak Salonu"  , 16    , "Şifre"            , 100       , "123456"  ,  "gryffindor"            , "img/locations/gryffindor-ortak-salon"   , ".png"         , "Gryffindor"  , "Pasif"       , "Gryffindor" ],
            ["Ravenclaw Ortak Salonu"   , 16    , "Şifre"            , 100       , "123456"  ,  "ravenclaw"             , "img/locations/ravenclaw-ortak-salon"    , ".png"         , "Ravenclaw"   , "Pasif"       , "Ravenclaw"  ],
            ["Slytherin Ortak Salonu"   , 16    , "Şifre"            , 100       , "123456"  ,  "slytherin"             , "img/locations/slytherin-ortak-salon"    , ".png"         , "Slytherin"   , "Pasif"       , "Slytherin"  ],
            ["Hufflepuff Ortak Salonu"  , 16    , "Şifre"            , 100       , "123456"  ,  "hufflepuff"            , "img/locations/hufflepuff-ortak-salon"   , ".png"         , "Hufflepuff"  , "Pasif"       , "Hufflepuff" ],
        ];
        foreach ($location_houses as $location_house) {
            Location::create([
                'name'                  => $location_house[0],
                'description'           => $location_house[0] . " hakkında bilgi",
                'location_type_id'      => $location_house[1],
                'permit'                => $location_house[2],
                'password_strength'     => $location_house[3],
                'password'              => $location_house[4],
                'image'                 => $location_house[6] . $location_house[7],
                'location_affiliation'  => $location_house[8],
                'sub_location_status'   => $location_house[9],
                'short_link'            => $location_house[5],
                'house_affiliation'     => $location_house[10],
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

        // Hogwarts Yatakhaneler - Yeni bölge eklenince region alanı değişecek.
        $location_houses = [
            // name(0)                  type(1) permit(2)           pass_str(3) pass(4)     short-link(5)       img-short(6)                                        img-type(7)     region(8)           sub-loc(9)      house(10)           title(11)       title(12)
            ["Büyücü Yatakhanesi"       , 17    , "Şifre"           , 100       , "123456"  , "gryffindor"      , "img/locations/gryffindor-ortak-salon"     , ".png"        , "Gryffindor"      , "Pasif"       , "Gryffindor"      , 21           , null ],
            ["Cadı Yatakhanesi"         , 18    , "Şifre"           , 100       , "123456"  , "gryffindor"      , "img/locations/gryffindor-ortak-salon"     , ".png"        , "Gryffindor"      , "Pasif"       , "Gryffindor"      , 22           , null ],
            ["Büyücü Yatakhanesi"       , 17    , "Şifre"           , 100       , "123456"  , "ravenclaw"       , "img/locations/ravenclaw-ortak-salon"      , ".png"        , "Ravenclaw"       , "Pasif"       , "Ravenclaw"       , 21           , null ],
            ["Cadı Yatakhanesi"         , 18    , "Şifre"           , 100       , "123456"  , "ravenclaw"       , "img/locations/ravenclaw-ortak-salon"      , ".png"        , "Ravenclaw"       , "Pasif"       , "Ravenclaw"       , 22           , null ],
            ["Büyücü Yatakhanesi"       , 17    , "Şifre"           , 100       , "123456"  , "slytherin"       , "img/locations/slytherin-ortak-salon"      , ".png"        , "Slytherin"       , "Pasif"       , "Slytherin"       , 21           , null ],
            ["Cadı Yatakhanesi"         , 18    , "Şifre"           , 100       , "123456"  , "slytherin"       , "img/locations/slytherin-ortak-salon"      , ".png"        , "Slytherin"       , "Pasif"       , "Slytherin"       , 22           , null ],
            ["Büyücü Yatakhanesi"       , 17    , "Şifre"           , 100       , "123456"  , "hufflepuff"      , "img/locations/hufflepuff-ortak-salon"     , ".png"        , "Hufflepuff"      , "Pasif"       , "Hufflepuff"      , 21           , null ],
            ["Cadı Yatakhanesi"         , 18    , "Şifre"           , 100       , "123456"  , "hufflepuff"      , "img/locations/hufflepuff-ortak-salon"     , ".png"        , "Hufflepuff"      , "Pasif"       , "Hufflepuff"      , 22           , null ],
        ];
        foreach ($location_houses as $location_house) {
            Location::create([
                'name'                  => $location_house[0],
                'description'           => $location_house[0] . " hakkında bilgi",
                'location_type_id'      => $location_house[1],
                'permit'                => $location_house[2],
                'password_strength'     => $location_house[3],
                'password'              => $location_house[4],
                'image'                 => $location_house[6] . $location_house[7],
                'location_affiliation'  => $location_house[8],
                'sub_location_status'   => $location_house[9],
                'short_link'            => $location_house[5],
                'house_affiliation'     => $location_house[10],
            ]);
        }

        // Alt Mekanlar
        $location_lists = [
            // Hogwarts Yerleşkeler
            // name(0)                  type(1) permit(2)           pass_str(3) pass(4)     short-link(5)               img-short(6)                img-type(7)     region(8)           sub-loc(9)      rol-stat(10)    title(11)
            ["Büyük Salon"              , 4     , "Herkese Açık"    , 0         , ""        ,  "buyuk-salon"            , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Baş Yönetici Ofisi"       , 4     , "Şifre"           , 75        , "123456"  ,  "bas-yonetici-ofisi"     , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Kütüphane"                , 4     , "Herkese Açık"    , 0         , ""        ,  "kutuphane"              , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["İhtiyaç Odası"            , 4     , "Şifre"           , 50        , "123456"  ,  "ihtiyac-odasi"          , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Astroloji Kulesi"         , 4     , "Şifre"           , 25        , "123456"  ,  "astroloji-kulesi"       , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Baykuşhane"               , 4     , "Herkese Açık"    , 0         , ""        ,  "baykushane"             , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Revir"                    , 4     , "Herkese Açık"    , 0         , ""        ,  "revir"                  , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Mutfak"                   , 4     , "Herkese Açık"    , 0         , ""        ,  "mutfak"                 , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Okul Bahçesi"             , 4     , "Herkese Açık"    , 0         , ""        ,  "okul-bahcesi"           , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Göl Kenarı"               , 4     , "Şifre"           , 10        , "123456"  ,  "gol-kenari"             , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Tahta Köprü"              , 4     , "Herkese Açık"    , 0         , ""        ,  "tahta-kopru"            , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Quidditch Sahası"         , 4     , "Herkese Açık"    , 0         , ""        ,  "quidditch-sahasi"       , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],
            ["Karanlık Orman"           , 4     , "Girilmez"        , 0         , ""        ,  "karanlik-orman"         , "img/locations/"   , ".png"        , "Hogwarts"        , "Pasif"       , "Aktif"       , null],

            // Hogsmeade | https://harrypotter.fandom.com/wiki/Hogsmeade
            // name(0)                              type(1) permit(2)           pass_str(3) pass(4)     short-link(5)           img-short(6)                img-type(7)     region(8)           sub-loc(9)      rol-stat(10)    title(11)
            ["Dervish ve Banges"                    , 10    , "Herkese Açık"    , 0         , ""        ,  "dervish-banges"     , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Gringotts Sihirbaz Bankası"           , 5     , "Herkese Açık"    , 0         , ""        ,  "gringotts"          , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Scrivenshaft'ın Tüy Kalem Dükkânı"    , 21    , "Herkese Açık"    , 0         , ""        ,  "scrivenshaft"       , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Ollivander Asaları"                   , 6     , "Herkese Açık"    , 0         , ""        ,  "ollivander"         , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Baykuşhane"                           , 4     , "Herkese Açık"    , 0         , ""        ,  "baykushane"         , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Üç Süpürge"                           , 12    , "Herkese Açık"    , 0         , ""        ,  "uc-supurge"         , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Domuz Kafası"                         , 12    , "Herkese Açık"    , 0         , ""        ,  "domuz-kafasi"       , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Köpekotu & Ölükapak"                  , 11    , "Herkese Açık"    , 0         , ""        ,  "kopekotu-olukapak"  , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Ceridwen'in Kazan Dükkanı"            , 11    , "Herkese Açık"    , 0         , ""        ,  "ceridwen"           , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Gladgras Sihirbaz Cüppeleri"          , 7     , "Herkese Açık"    , 0         , ""        ,  "gladgras"           , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Kitaplar & Tomarlar"                  , 13    , "Herkese Açık"    , 0         , ""        ,  "kitaplar-tomarlar"  , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Zonko'nun Şaka Dükkânı"               , 4     , "Herkese Açık"    , 0         , ""        ,  "zonko"              , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Baldükü"                              , 4     , "Herkese Açık"    , 0         , ""        ,  "balduku"            , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Balyumruk Şekerci Dükkanı"            , 4     , "Herkese Açık"    , 0         , ""        ,  "balyumruk"          , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Madam Puddifoot'un Çay Dükkânı"       , 4     , "Herkese Açık"    , 0         , ""        ,  "puddifoot"          , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Bağıran Baraka"                       , 4     , "Şifre"           , 100       , "123456"  ,  "bagiran-baraka"     , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            ["Hogsmeade Tren İstasyonu"             , 14    , "Herkese Açık"    , 0         , ""        ,  "tren-istasyonu"     , "img/locations/"   , ".png"        , "Hogsmeade"       , "Pasif"       , "Aktif"       , null],
            // Diagon Yolu | https://harrypotter.fandom.com/wiki/Diagon_Alley
            // name(0)                                          type(1) permit(2)           pass_str(3) pass(4)     short-link(5)           img-short(6)                img-type(7)    region(8)            sub-loc(9)      rol-stat(10)    title(11)
            ["Gelecek Postası Ana Binası"                       , 4     , "Şifre"           , 50        , "123456"  ,  "gelecek-postasi"    ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Gringotts Sihirbaz Bankası"                       , 5     , "Herkese Açık"    , 0         , ""        ,  "gringotts"          ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Ollivander Asaları"                               , 6     , "Herkese Açık"    , 0         , ""        ,  "ollivander"         ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Madam Malkin'in Her Duruma Göre Cüppeleri"        , 7     , "Herkese Açık"    , 0         , ""        ,  "madam-malkin"       ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Kaliteli Quidditch Eşyaları"                      , 8     , "Herkese Açık"    , 0         , ""        ,  "kaliteli-quidditch" ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Flourish ve Blotts"                               , 13    , "Herkese Açık"    , 0         , ""        ,  "flourish-blotts"    ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Obscurus Kitapçısı"                               , 13    , "Herkese Açık"    , 0         , ""        ,  "obscurus"           ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Eeylops Bin Bir Çeşit Baykuş Dükkânı"             , 9     , "Herkese Açık"    , 0         , ""        ,  "eeylops"            ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Büyülü Hayvan Mağazası"                           , 9     , "Herkese Açık"    , 0         , ""        ,  "buyulu-hayvan"      ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Çatlak Kazan"                                     , 12    , "Herkese Açık"    , 0         , ""        ,  "catlak-kazan"       ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Hurdacı Dükkanı"                                  , 10    , "Herkese Açık"    , 0         , ""        ,  "hurdaci-dukkani"    ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Amanuensis Tüy Kalemleri"                         , 21    , "Herkese Açık"    , 0         , ""        ,  "amanuensis"         ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Borgin & Burkes"                                  , 10    , "Herkese Açık"    , 0         , ""        ,  "borgin-burkes"      ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Eczane"                                           , 11    , "Herkese Açık"    , 0         , ""        ,  "eczane"             ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Madam Primpernelle'in Güzelleştirici İksirleri"   , 11    , "Herkese Açık"    , 0         , ""        ,  "madam-primpernelle" ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Potage'nin Kazan Dükkanı"                         , 11    , "Herkese Açık"    , 0         , ""        ,  "potage-kazan"       ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Slug & Jiggers"                                   , 11    , "Herkese Açık"    , 0         , ""        ,  "slug-jiggers"       ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Florean Fortescue'nun Dondurma Salonu"            , 4     , "Herkese Açık"    , 0         , ""        ,  "florean-fortescue"  ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],
            ["Gambol ve Japes Büyücü Şakaları"                  , 4     , "Herkese Açık"    , 0         , ""        ,  "gambol-japes"       ,"img/locations/"    , ".png"       , "Diagon Yolu"      , "Pasif"       , "Aktif"       , null],

            // Sihir Bakanlıkları
            // name(0)                       type(1)    permit(2)           pass_str(3) pass(4)         short-link(5)                      img-short(6)                 img-type(7)     region(8)                   sub-loc(9)      rol-stat(10)    title(11)
            ["İngiltere Sihir Bakanlığı"    , 23        , "Şifre"           , 100       , "123456"      , "ingiltere-sihir-bakanligi"      ,"img/locations/"     , ".png"        , "Sihir Bakanlıkları"      , "Aktif"       , "Pasif"       , null],
            ["Amerika Sihir Bakanlığı"      , 23        , "Şifre"           , 100       , "123456"      , "amerika-sihir-bakanligi"        ,"img/locations/"     , ".png"        , "Sihir Bakanlıkları"      , "Aktif"       , "Pasif"       , null],

            // Aile Evleri Yerleşkeleri
            // name(0)                    //type(1)  //permit(2)          //pass_str(3)   //pass(4)     //short-link(5)                    //img-short(6)               //img-type(7)   //region(8)             //sub-loc(9)    //rol-stat(10)
            // ["Privet Drive"               , 4        , "Herkese Açık"     , 0             , ""          , "privet-drive"                   , "img/locations/"   , ".png"         , "Aile Evleri"         , "Aktif"       , "Pasif"       , null],
            // ["Godric's Hollow"            , 4        , "Herkese Açık"     , 0             , ""          , "godrics-hollow"                 , "img/locations/"   , ".png"         , "Aile Evleri"         , "Aktif"       , "Pasif"       , null],
            // ["Grimmauld Meydanı"          , 4        , "Herkese Açık"     , 0             , ""          , "grimmauld-meydani"              , "img/locations/"   , ".png"         , "Aile Evleri"         , "Aktif"       , "Pasif"       , null],

            // Aile Evleri
            // name(0)                    //type(1)  //permit(2)          //pass_str(3)   //pass(4)     //short-link(5)                    //img-short(6)               //img-type(7)   //region(8)             //sub-loc(9)    //rol-sta(10)   title(11)
//            ["Privet Drive 101"           , 4        , "Herkese Açık"     , 0             , ""          , "privet-drive"                   , "img/locations/"   , ".png"         , "Privet Drive"        , "Pasif"       , "Aktif"       , null],
//            ["Privet Drive 102"           , 4        , "Herkese Açık"     , 0             , ""          , "privet-drive"                   , "img/locations/"   , ".png"         , "Privet Drive"        , "Pasif"       , "Aktif"       , null],
//            ["Privet Drive 103"           , 4        , "Herkese Açık"     , 0             , ""          , "privet-drive"                   , "img/locations/"   , ".png"         , "Privet Drive"        , "Pasif"       , "Aktif"       , null],
//            ["Godric's Hollow 101"        , 4        , "Herkese Açık"     , 0             , ""          , "godrics-hollow"                 , "img/locations/"   , ".png"         , "Godric's Hollow"     , "Pasif"       , "Aktif"       , null],
//            ["Godric's Hollow 102"        , 4        , "Herkese Açık"     , 0             , ""          , "godrics-hollow"                 , "img/locations/"   , ".png"         , "Godric's Hollow"     , "Pasif"       , "Aktif"       , null],
//            ["Godric's Hollow 103"        , 4        , "Herkese Açık"     , 0             , ""          , "godrics-hollow"                 , "img/locations/"   , ".png"         , "Godric's Hollow"     , "Pasif"       , "Aktif"       , null],
//            ["Grimmauld Meydanı 101"      , 4        , "Herkese Açık"     , 0             , ""          , "grimmauld-meydani"              , "img/locations/"   , ".png"         , "Grimmauld Meydanı"   , "Pasif"       , "Aktif"       , null],
//            ["Grimmauld Meydanı 102"      , 4        , "Herkese Açık"     , 0             , ""          , "grimmauld-meydani"              , "img/locations/"   , ".png"         , "Grimmauld Meydanı"   , "Pasif"       , "Aktif"       , null],
//            ["Grimmauld Meydanı 103"      , 4        , "Herkese Açık"     , 0             , ""          , "grimmauld-meydani"              , "img/locations/"   , ".png"         , "Grimmauld Meydanı"   , "Pasif"       , "Aktif"       , null],
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
                'role_play_status'      => $location_list[10],
            ]);
        }
    }
}
