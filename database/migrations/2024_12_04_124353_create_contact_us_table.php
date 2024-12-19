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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id('contact_id'); // Primary key
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to users
            $table->string('name', 255)->nullable(); // Name of the contact person
            $table->string('email', 255); // Email address
            $table->enum('category', ['Technical Issue', 'Feedback', 'General Inquiry', 'Other']); // Message category
            $table->text('message'); // Detailed message
            $table->enum('status', ['pending', 'reviewed', 'resolved', 'closed'])->default('pending'); // Message status
            $table->text('response')->nullable(); // Admin response
            $table->timestamps(); // Includes `created_at` and `updated_at`
            $table->timestamp('responded_at')->nullable(); // When the admin responded
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
