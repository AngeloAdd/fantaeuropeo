<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Angelo Adduci',
            'password' => bcrypt('angeloadduci'),
            'admin' => true,
            'games_mod' => true,
            'users_mod' => true
        ]);       
        User::create([
            'name' => 'Giovanni Zilio',
            'password' => bcrypt('giovannizilio'),
            'admin' => false,
            'games_mod' => false,
            'users_mod' => true
        ]);       
        User::create([
            'name' => 'Erik Lerjefors',
            'password' => bcrypt('eriklerjefors'),
            'admin' => false,
            'games_mod' => false,
            'users_mod' => true
        ]);       
    }
}
