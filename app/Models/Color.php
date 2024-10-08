<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $fillable = [
        'color_code',
        'color_name',
    ];

    public function dashboardCells()
    {
        return $this->hasMany(DashboardCell::class);
    }
}
