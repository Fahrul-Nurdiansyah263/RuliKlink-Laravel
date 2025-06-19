<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'arul',
            'email' => 'arul@gmail.com',
            'password' => bcrypt('arul'),
        ]);
    }
}
