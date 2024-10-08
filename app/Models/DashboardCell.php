<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardCell extends Model
{
    use HasFactory;

    protected $table = 'dashboard_cells';

    protected $fillable = [
        'title',
        'url',
        'color_id',
    ];
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
