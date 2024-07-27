<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('RatingID');
            $table->unsignedInteger('JobID');
            $table->unsignedInteger('ClientID');
            $table->unsignedInteger('FreelancerID');
            $table->integer('RatingValue')->check('RatingValue between 1 and 5');
            $table->text('Comment')->nullable();
            $table->foreign('JobID')->references('JobID')->on('jobs')->onDelete('cascade');
            $table->foreign('ClientID')->references('ClientID')->on('clients')->onDelete('cascade');
            $table->foreign('FreelancerID')->references('FreelancerID')->on('freelancers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
