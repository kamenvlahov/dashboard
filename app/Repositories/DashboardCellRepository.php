<?php
namespace App\Repositories;

use App\Models\DashboardCell;
use App\Models\Color;

class DashboardCellRepository implements DashboardCellRepositoryInterface
{
    public function all()
    {
        return DashboardCell::all();
    }

    public function find($id)
    {
        return DashboardCell::findOrFail($id);
    }

    public function create(array $data)
    {
        return DashboardCell::create($data);
    }

    public function update($id, array $data)
    {
        return $id->update($data);
    }

    public function delete(DashboardCell $dashboardCell)
    {
        return $dashboardCell->delete();
    }
    public function getAllColors()
    {
        return Color::all();
    }
}
