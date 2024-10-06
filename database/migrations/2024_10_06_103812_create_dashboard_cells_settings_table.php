<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dashboard_cells_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dashboard_cell_id');
            $table->string('url', 255);
            $table->unsignedBigInteger('color_id')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('dashboard_cell_id')
                  ->references('id')->on('dashboard_cells')
                  ->onDelete('cascade');

            $table->foreign('color_id')
                  ->references('id')->on('colors')
                  ->onDelete('set null');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_cells_settings');
    }
};
