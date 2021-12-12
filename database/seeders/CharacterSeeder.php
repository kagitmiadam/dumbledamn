<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $character = new Character();
        $character->user_id = 1;
        $character->gender_id = 1;
        $character->school_id = 1;
        $character->school_class_id = 1;
        $character->school_grade_id = 1;
        $character->preffered_core = 1;
        $character->galleon = 10000;
        $character->wand_id = 1;
        $character->gown_id = 36;
        $character->broom_id = 76;
        $character->pet_id = 21;
        $character->status = "Aktif";
        $character->save();
    }
}
