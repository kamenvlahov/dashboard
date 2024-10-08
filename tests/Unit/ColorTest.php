<?php

namespace Tests\Unit;

use App\Models\Color;
use App\Models\DashboardCell;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ColorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a color can be created.
     */
    public function test_color_creation()
    {
        $color = Color::factory()->create([
            'color_code' => '#FF0000',
            'color_name' => 'Red',
        ]);

        $this->assertDatabaseHas('colors', [
            'color_code' => '#FF0000',
            'color_name' => 'Red',
        ]);
    }

    /**
     * Test if a color has many dashboard cells.
     */
    public function test_color_has_many_dashboard_cells()
    {
        $color = Color::factory()->create();

        $dashboardCells = DashboardCell::factory()->count(3)->create([
            'color_id' => $color->id,
        ]);

        $this->assertEquals(3, $color->dashboardCells->count());
    }
}
