<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CharacterSpell;

class CharacterSpellSeeder extends Seeder
{
    public function run()
    {
        $character_spell = new CharacterSpell();
        $character_spell->character_id = 1;
        $character_spell->spell_id = 1;
        $character_spell->predisposition = 1;
        $character_spell->status = 1;
        $character_spell->level_id = 1;
        $character_spell->experience_points = 0;
        $character_spell->save();
        
        $character_spell = new CharacterSpell();
        $character_spell->character_id = 1;
        $character_spell->spell_id = 2;
        $character_spell->predisposition = 1;
        $character_spell->status = 1;
        $character_spell->level_id = 1;
        $character_spell->experience_points = 0;
        $character_spell->save();
    }
}
