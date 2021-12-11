<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpellLevel;

class SpellLevelSeeder extends Seeder
{
    public function run()
    {
        /* Büyü Seviyeleri */
        $spell_levels = [
            // 0: Seviye    1: Gerekli EXP
            ["1"            , 100   ],
            ["2"            , 250   ],
            ["3"            , 500   ],
            ["4"            , 1000  ],
            ["5"            , 2500  ],
            ["6"            , 5000  ],
            ["7"            , 10000 ],
        ];
        foreach ($spell_levels as $spell) {
            SpellLevel::create([
                'level'                     => $spell[0],
                'name'                      => "Seviye " . $spell[0],
                'requirement_experience'    => $spell[1],
            ]);
        }
    }
}
