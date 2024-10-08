<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\DashboardCell;
use App\Models\Color;
use App\Repositories\DashboardCellRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardCellRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $dashboardCellRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->dashboardCellRepository = new DashboardCellRepository();
    }

    /** @test */
    public function it_can_create_a_dashboard_cell()
    {
        $color = Color::factory()->create();

        $data = [
            'url' => 'https://example.com',
            'color_id' => $color->id,
        ];

        $dashboardCell = $this->dashboardCellRepository->create($data);

        $this->assertDatabaseHas('dashboard_cells', [
            'id' => $dashboardCell->id,
            'url' => 'https://example.com',
            'color_id' => $color->id,
        ]);
    }

    /** @test */
    public function it_can_update_a_dashboard_cell()
    {
        $color = Color::factory()->create(); // Create a color using the factory
        $dashboardCell = DashboardCell::factory()->create(['color_id' => $color->id]);

        $updatedData = [
            'url' => 'https://updated-url.com',
            'color_id' => $color->id,
        ];

        $this->dashboardCellRepository->update($dashboardCell, $updatedData);

        $this->assertDatabaseHas('dashboard_cells', [
            'id' => $dashboardCell->id,
            'url' => 'https://updated-url.com',
        ]);
    }

    /** @test */
    public function it_can_delete_a_dashboard_cell()
    {
        $dashboardCell = DashboardCell::factory()->create();

        $this->dashboardCellRepository->delete($dashboardCell);

        $this->assertDatabaseMissing('dashboard_cells', [
            'id' => $dashboardCell->id,
        ]);
    }

    /** @test */
    public function it_can_retrieve_all_dashboard_cells()
    {
        $color = Color::factory()->create(); // Create a color using the factory
        DashboardCell::factory()->count(3)->create(['color_id' => $color->id]);

        $cells = $this->dashboardCellRepository->all();

        $this->assertCount(3, $cells);
    }

    /** @test */
    public function it_can_find_a_dashboard_cell_by_id()
    {
        $dashboardCell = DashboardCell::factory()->create();

        $foundCell = $this->dashboardCellRepository->find($dashboardCell->id);

        $this->assertEquals($dashboardCell->id, $foundCell->id);
    }
}
