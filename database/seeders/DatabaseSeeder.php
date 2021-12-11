<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(SchoolClassSeeder::class);
        $this->call(SchoolGradeSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(CoreSeeder::class);
        $this->call(WoodSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(LocationTypeSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(SpellTypeSeeder::class);
        $this->call(SpellSeeder::class);
        $this->call(SpellLevelSeeder::class);
        $this->call(PeriodCupSeeder::class);
        $this->call(CharacterSeeder::class);
        $this->call(PeriodCupDetailSeeder::class);
        $this->call(CharacterSpellSeeder::class);
    }
}
