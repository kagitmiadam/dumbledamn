<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpellType;

class SpellTypeSeeder extends Seeder
{
    public function run()
    {
        
        $spellType = new SpellType();
        $spellType->name = "Efsun";
        $spellType->description = "Efsun hakkında açıklama.";
        $spellType->save();

        $spellType = new SpellType();
        $spellType->name = "Çağrı";
        $spellType->description = "Çağrı hakkında açıklama.";
        $spellType->save();

        $spellType = new SpellType();
        $spellType->name = "Başkalaşım";
        $spellType->description = "Başkalaşım hakkında açıklama.";
        $spellType->save();

        $spellType = new SpellType();
        $spellType->name = "Karşı Saldırı";
        $spellType->description = "Karşı Saldırı hakkında açıklama.";
        $spellType->save();
    }
}
