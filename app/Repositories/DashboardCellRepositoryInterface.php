<?php

namespace App\Repositories;

use App\Models\DashboardCell;

interface DashboardCellRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(DashboardCell $dashboardCell, array $data);
    public function delete(DashboardCell $dashboardCell);
    public function getAllColors(); 
}
