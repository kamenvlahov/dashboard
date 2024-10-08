<?php

namespace Tests\Unit;

use App\Models\DashboardCell;
use App\Models\Color;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardCellTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a dashboard cell can be created.
     */
    public function test_dashboard_cell_creation()
    {
        // Create a color
        $color = Color::factory()->create();

        // Create a dashboard cell
        $dashboardCell = DashboardCell::factory()->create([
            'url' => 'https://example.com',
            'color_id' => $color->id,
        ]);

        // Assertions
        $this->assertDatabaseHas('dashboard_cells', [
            'url' => 'https://example.com',
            'color_id' => $color->id,
        ]);
    }

    /**
     * Test the relationship between dashboard cell and color.
     */
    public function test_dashboard_cell_belongs_to_color()
    {
        // Create a color
        $color = Color::factory()->create();

        // Create a dashboard cell with the color
        $dashboardCell = DashboardCell::factory()->create([
            'color_id' => $color->id,
        ]);

        // Assert the relationship
        $this->assertTrue($dashboardCell->color->is($color));
    }

    /**
     * Test updating a dashboard cell.
     */
    public function test_dashboard_cell_update()
    {
        $dashboardCell = DashboardCell::factory()->create([
            'url' => 'https://oldurl.com',
        ]);

        // Update the dashboard cell
        $dashboardCell->update([
            'url' => 'https://newurl.com',
        ]);

        // Assert the update
        $this->assertEquals('https://newurl.com', $dashboardCell->fresh()->url);
    }
}
