<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agendas = [];
        for ($i = 1; $i <= 100; $i++) {
            $agendas[] = [
                'title' => fake()->text(50),
                'description' => fake()->sentence(),
                'date' => fake()->dateTime(),
                'location' => fake()->address(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('agendas')->insert($agendas);
    }
}
