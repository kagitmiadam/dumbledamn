<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = "Cantürk";
        $user->email = "canturk@rpgproject.com";
        $user->password = bcrypt("123456");
        $user->save();
    }
}
