<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    public function run()
    {
        // Ders Sayısı: 10 - Sınıf Sayısı: 70
        // Okul dönemi 7 sene olarak ayarlanmıştır.
        $school_year = 7;
        $list = [
            #0                                      #1      #2      #3
            ["Karanlık Sanatlara Karşı Savunma"     , 1     , 6     , "img/lesson/1.jpg" ],
            ["Tılsım"                               , 1     , 7     , "img/lesson/2.jpg" ],
            ["Biçim Değiştirme"                     , 1     , 8     , "img/lesson/3.jpg" ],
            ["İksir"                                , 1     , 9     , "img/lesson/4.jpg" ],
            ["Bitki Bilim"                          , 1     , 10    , "img/lesson/5.jpg" ],
            ["Sihirli Yaratıklar"                   , 1     , 11    , "img/lesson/6.jpg" ],
            ["Kehanet"                              , 1     , 13    , "img/lesson/7.jpg" ],
            ["Sihir Tarihi"                         , 1     , 14    , "img/lesson/8.jpg" ],
            ["Kadim Rünler"                         , 1     , 15    , "img/lesson/9.jpg" ],
            ["Quidditch"                            , 1     , 12    , "img/lesson/10.jpg"],
        ];
        foreach ($list as $list) {
            for ($i = 1; $i <= $school_year; $i++) {
                Lesson::create([
                    'name'              => $list[0],
                    'description'       => $list[0] . " " . $i . ". Sınıf dersi hakkında bilgi.",
                    'school_grade_id'   => $i,
                    'location_id'       => $list[2],
                    'image'             => $list[3],
                ]);
            }
        }
    }
}
