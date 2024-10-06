<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardCellsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 9; $i++) {
            DB::table('dashboard_cells')->insert([
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
