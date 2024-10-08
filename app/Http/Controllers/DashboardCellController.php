<?php

namespace App\Http\Controllers;

use App\Repositories\DashboardCellRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\DashboardSellConfRequest;
use App\Models\DashboardCell;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardCellController extends Controller
{
    protected DashboardCellRepositoryInterface $dashboardCellRepository;

    public function __construct(DashboardCellRepositoryInterface $dashboardCellRepository)
    {
        $this->dashboardCellRepository = $dashboardCellRepository;
    }

    public function index(): View
    {
        $cells = $this->dashboardCellRepository->all();
        return view('dashboard.index', compact('cells'));
    }

    public function edit(int $id): View
    {
        $cell = $this->dashboardCellRepository->find($id);
        $colors = $this->dashboardCellRepository->getAllColors();

        return view('dashboard.config', compact('cell', 'colors'));
    }

    public function update(DashboardSellConfRequest $request, DashboardCell $id): RedirectResponse
    {
        $data = $request->validated();

        $this->dashboardCellRepository->update($id, $data);
        return redirect()->route('dashboard.index');
    }

    public function destroy(DashboardCell $id): RedirectResponse
    {
        $data = ['title' => null, 'url' => null, 'color_id' => null];
        $this->dashboardCellRepository->update($id, $data);
        return redirect()->route('dashboard.index');
    }
}
