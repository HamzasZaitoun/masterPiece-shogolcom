<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserToUserReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('user_to_user_reviews', function (Blueprint $table) {
            $table->id('review_id'); 
            $table->foreignId('reviewer_id')->constrained('users');
            $table->foreignId('reviewed_id')->constrained('users');
            $table->enum('reviewer_role', ['worker', 'employer']);
            $table->foreignId('job_id')->constrained('jobs');
            $table->foreignId('application_id')->constrained('applications');
            $table->integer ('rating');
            $table->text('review_text')->nullable();
            $table->timestamps(); 
            $table->softDeletes();
          

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_to_user_reviews');
    }
}

