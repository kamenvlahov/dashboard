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
        Schema::create('colors', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement(); // Match type
            $table->string('color_code', 7)->unique(); // HEX color code
            $table->string('color_name', 50)->nullable(); // Optional color name
            $table->timestamps();

            $table->engine = 'InnoDB'; // Ensure using InnoDB
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
