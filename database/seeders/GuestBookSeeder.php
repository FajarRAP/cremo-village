<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guestbooks = [];

        for ($i = 0; $i < 100; $i++) {
            $guestbooks[] = [
                'name' => fake()->name(),
                'origin' => fake()->country(),
                'visit_date' => fake()->dateTime(),
                'purpose' => fake()->sentence(),
                'description' => fake()->paragraph(),
            ];
        }

        DB::table('guest_books')->insert($guestbooks);
    }
}
