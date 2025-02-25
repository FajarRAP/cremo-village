<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->createMany([
            [
                'name' => 'Heru Prihana',
                'email' => 'heruprihana@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Fajar Riansyah',
                'email' => 'fajary781@gmail.com',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}
