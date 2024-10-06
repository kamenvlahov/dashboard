<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
            ['color_code' => '#FF5733', 'color_name' => 'Red Orange', 'created_at' => now(), 'updated_at' => now()],
            ['color_code' => '#33FF57', 'color_name' => 'Green', 'created_at' => now(), 'updated_at' => now()],
            ['color_code' => '#3357FF', 'color_name' => 'Blue', 'created_at' => now(), 'updated_at' => now()],
            ['color_code' => '#FF33A8', 'color_name' => 'Pink', 'created_at' => now(), 'updated_at' => now()],
            ['color_code' => '#FFFF33', 'color_name' => 'Yellow', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
