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
            'password' => bcrypt('fantapronostico2021angeloadduci'),
        ]);
        User::create([
            'name' => 'Erik Lerjefors',
            'password' => bcrypt('fantapronostico2021eriklerjefors'),
        ]);
        User::create([
            'name' => 'Giovanni Zilio',
            'password' => bcrypt('fantapronostico2021giovannizilio'),
        ]);
        User::create([
            'name' => 'Marco Tattoli',
            'password' => bcrypt('fantapronostico2021marcotattoli'),
        ]);
        User::create([
            'name' => 'Elia Liguori',
            'password' => bcrypt('fantapronostico2021elialiguori'),
        ]);
       
    }
}
