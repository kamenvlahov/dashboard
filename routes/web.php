<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardCellController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardCellController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/cell/{id}/edit', [DashboardCellController::class, 'edit'])->name('dashboard-cell.edit');
Route::patch('/dashboard/cell/{id}', [DashboardCellController::class, 'update'])->name('dashboard-cell.update');
Route::get('/dashboard/cell/{id}/clear', [DashboardCellController::class, 'destroy'])->name('dashboard-cell.clear');
Route::resource('dashboard-cells', DashboardCellController::class);
