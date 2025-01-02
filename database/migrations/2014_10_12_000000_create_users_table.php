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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->Date('birth_date')->nullable();
            $table->string('mobile_number',15)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->integer('user_level')->nullable();
            $table->string('user_governorate', 255);
            $table->string('user_city', 255);
            $table->string('user_detailed_location', 255)->nullable();
            $table->decimal('balance',10,2)->nullable();
            $table->string('bio')->nullable();
            $table->decimal('rating',3,2)->default(1);
            $table->integer('rating_count')->default(0);
            $table->enum('verification_status',['pending','verified','rejected'])->default('pending');
            $table->enum('account_status',['active','suspended','banned'])->default('active');
            $table->enum('role',['admin','user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->json('preferences')->nullable();
            $table->string('device_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
