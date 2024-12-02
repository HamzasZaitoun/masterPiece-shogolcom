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
       Schema::create('locations', function (Blueprint $table) {
            $table->id('location_id'); // Primary key
            $table->foreignId('city_id')->constrained('cities'); // Foreign key to cities table
            $table->string('location_name', 255); // Location name as varchar
            $table->timestamps(); // For created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
