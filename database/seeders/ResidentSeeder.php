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
        $genders = ['Laki-laki', 'Perempuan'];
        $marriages = ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati'];

        for ($i = 0; $i < 100; $i++) {
            $arr[] = [
                'name' => fake()->name,
                'gender' => $genders[random_int(0, 1)],
                'birth_date' => fake()->dateTime(),
                'rt' => fake()->numberBetween(1, 5),
                'rw' => 4,
                'marriage' => $marriages[random_int(0, 3)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('residents')->insert([
            ...$arr
        ]);
    }
}
