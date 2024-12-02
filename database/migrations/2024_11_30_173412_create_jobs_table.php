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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('job_title', 255);
            $table->text('job_description');
            $table->string('job_governate', 255);
            $table->string('job_city', 255);
            $table->string('job_detailed_location', 255);
            $table->enum('job_type', ['day', 'month', 'project']);
            $table->decimal('payment_amount', 10, 2);
            $table->integer('job_duration')->nullable(); // Optional
            $table->boolean('is_urgent')->default(false);
            $table->timestamp('post_deadline');
            $table->integer('max_applicants');
            $table->timestamp('start_date');
            $table->string('job_media', 255)->nullable(); // Optional
            $table->unsignedBigInteger('job_category');
            $table->foreign('job_category')->references('category_id')->on('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->enum('job_status', ['open', 'closed', 'completed', 'cancelled']);
            $table->enum('payment_status', ['pending', 'paid']);
            $table->enum('job_visibility', ['public', 'private']);
            $table->integer('priority_level')->default(0);
            $table->boolean('is_custom_category')->default(false);
            $table->string('custom_category', 255)->nullable(); // Optional
            $table->integer('number_of_workers')->nullable()->default(1); // Optional
            $table->text('cancellation_reason')->nullable();
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at (soft delete)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
