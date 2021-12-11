<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SchoolSeeder::class);
        $this->call(SchoolClassSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(CoreSeeder::class);
        $this->call(WoodSeeder::class);
        $this->call(ItemSeeder::class);
    }
}
