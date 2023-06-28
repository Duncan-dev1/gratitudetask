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
        Schema::create('car_mechanic_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')
                  ->references('id')
                  ->on('cars')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('mechanic_id');
            $table->foreign('mechanic_id')
                  ->references('id')
                  ->on('mechanics')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_mechanic_assignments');
    }
};
