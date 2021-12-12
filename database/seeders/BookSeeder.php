<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        $lists = [
            // KARANLIK SANATLARA KARŞI SAVUNMA - DEFENCE AGAINST THE DARK ARTS
            ["Karanlık Güçler: Kendini Koruma Rehberi 1",       1,      2], 
            ["Hortlaklarla Gezinti",                            2,      4], 
            ["Karanlık Sanatlara Karşı Temel Savunma",          3,      8], 
            ["Karanlık Sanatlara Karşı Gelişmiş Savunma",       4,      10],
            ["Büyülü Savunma Teorisi",                          5,      12], 
            ["Karanlık Güçler: Kendini Koruma Rehberi 2",       6,      14],
            ["Karanlık Sanatlara Karşı Savunma Ansiklopedisi",  7,      20],

            // TILSIM - CHARM
            ["Büyü Temelleri 1",                8,      2], 
            ["Büyü Temelleri 2",                9,      5], 
            ["Büyü Temelleri 3",                10,     7], 
            ["Mutlak Büyüler",                  11,     9], 
            ["Büyü Temelleri 4",                12,     12],
            ["Efsun Başarımları",               13,     14],
            ["Büyü Ansiklopedisi",              14,     20],

            // BİÇİM DEĞİŞTİRME - TRANSFUGURATION |
            ["Yeni Başlayanlar için Biçim Değiştirme Kılavuzu",     15,     2], 
            ["Biçim Değiştirme Kuramları 1",                        16,     6], 
            ["Çağlar Boyu Biçim Değiştirme",                        17,     7], 
            ["Orta Seviye Biçim Değiştirme Rehberi 1",              18,     9], 
            ["Orta Seviye Biçim Değiştirme Rehberi 2",              19,     14],
            ["Gelişmiş Biçim Değiştirme Rehberi",                   20,     18],
            ["Biçim Değiştirme Ansiklopedisi",                      21,     20],

            // İKSİR - POTION
            ["Büyülü Taslaklar ve İksirler 1",  22,      2], 
            ["Güçlü İksir Yapımı 1",            23,      7], 
            ["Büyülü Taslaklar ve İksirler 2",  24,      8], 
            ["Güçlü İksir Yapımı 2",            25,      9], 
            ["Büyülü Taslaklar ve İksirler 3",  26,      12],
            ["Gelişmiş İksir Yapımı",           27,      14],
            ["İksir Ansiklopedisi",             28,      20],

            // BİTKİ BİLİM - HERBOLOGHY
            ["Bin Büyülü Ot ve Mantar",         29,      2], 
            ["Mantar Ansiklopedisi 1",          30,      6], 
            ["Et-Yiyen Ağaçlar",                31,      7], 
            ["Mantar Ansiklopedisi 2",          32,      8], 
            ["Biki Bilim Rehberi 1",            33,      9], 
            ["Büyülü Su Bitkileri",             34,      12],
            ["Bileşen Ansiklopedisi",           35,      20],

            // SİHİRLİ YARATIKLAR - MAGICAL CREATURES
            ["Canavar Kitabı 1",                                            39,      2], 
            ["Fantastik Canavarlar Nelerdir, Nerede Bulunurlar 1",          37,      10],
            ["Canavar Kitabı 2",                                            38,      15], 
            ["Fantastik Canavarlar Nelerdir, Nerede Bulunurlar 2",          39,      20],
            ["Canavar Kitabı 3",                                            40,      25], 
            ["Fantastik Canavarlar Nelerdir, Nerede Bulunurlar 3",          41,      30],
            ["Sihirli Yaratıklar Ansiklopedisi",                            42,      35],

            // KEHANET - DIVINATION
            ["Geleceği Çözmek 1",           43,      2 ], 
            ["Rüya Kehaneti 1",             44,      6 ], 
            ["Geleceği Çözmek 2",           45,      7 ], 
            ["Rüya Kehaneti 2",             46,      8 ], 
            ["Geleceği Çözmek 3",           47,      9 ], 
            ["Rüya Kehaneti 3",             48,      12],
            ["Kehanet Ansiklopedisi",       49,      20],

            // SİHİR TARİHİ - HISTORY OF MAGIC
            ["Sihir Tarihi 1",              50,      2 ],
            ["Sihir Tarihi 2",              51,      7 ],
            ["Sihir Tarihi 3",              52,      9 ],
            ["Sihir Tarihi 4",              53,      14],
            ["Sihir Tarihi 5",              54,      18],
            ["Sihir Tarihi 6",              55,      18],
            ["Sihir Tarihi Ansiklopedisi",  56,      20],

            // KADİM RÜN - ANCIENT RUNES
            ["Kolay Kadim Rünler",                      57,      2], 
            ["Kadim Rün Sözlüğü 1",                     58,      6], 
            ["Temel Rün Çevirileri",                    59,      7], 
            ["Büyülü Hiyeroglifler ve Logogramlar",     60,      8], 
            ["Gelişmiş Rün Çevirileri 1",               61,      9], 
            ["Kadim Rün Sözlüğü 2",                     62,      13],
            ["Kadim Rün Ansiklopedisi",                 63,      20],
        ];
        $book_id = 0;
        foreach ($lists as $list) {
            $book_id = $book_id + 1;
            Book::create([
                'name'          => $list[0],
                'description'   => $list[0] . " hakkında bilgi",
                'lesson_id'     => $list[1],
                'price'         => $list[2],
                'image'         => "img/book/" . $book_id . ".jpg",
            ]);
        }
    }
}
