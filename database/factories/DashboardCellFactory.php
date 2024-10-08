<?php

namespace Database\Factories;

use App\Models\DashboardCell;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class DashboardCellFactory extends Factory
{
    protected $model = DashboardCell::class;

    public function definition(): array
    {
        // Ensure at least one Color exists
        if (Color::count() === 0) {
            Color::factory()->create(['color_code' => '#FFFFFF', 'color_name' => 'Default Color']);
        }

        return [
            'url' => $this->faker->url,
            'color_id' => Color::inRandomOrder()->first()->id,
        ];
    }
}
