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
        User::insert([
            ['name' => 'Joe Gitonga', 'email' => 'thekiharani@gmail.com', 'password' => \Hash::make('pass_12345'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aria Gitonga', 'email' => 'thearia@gmail.com', 'password' => \Hash::make('pass_12345'), 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
