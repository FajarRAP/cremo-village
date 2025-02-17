<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];

        for ($i = 0; $i < 100; $i++) {
            $arr[] = [
                'name' => fake()->name,
                'birth_date' => fake()->dateTime(),
                'rt' => fake()->numberBetween(1, 5),
                'rw' => 4,
            ];
        }

        DB::table('residents')->insert([
            ...$arr
        ]);
    }
}
