<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('job_id');
            // $table->unsignedBigInteger('user_id');
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('payment_amount', 10, 2);
            $table->decimal('platform_commission', 10, 2);
            $table->enum('payment_status', ['pending', 'escrow', 'completed', 'refunded']);
            $table->decimal('net_payment', 10, 2);
            $table->enum('payment_method', ['cash', 'wallet', 'bank_transfer', 'visa']);
            $table->string('transaction_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('job_id')->references('job_id')->on('jobs')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
}
