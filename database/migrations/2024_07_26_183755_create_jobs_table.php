<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('JobID');
            $table->string('Title', 100);
            $table->text('Description')->nullable();
            $table->decimal('Budget', 10, 2)->nullable();
            $table->date('Deadline')->nullable();
            $table->string('Location', 100)->nullable();
            $table->decimal('Salary', 10, 2)->nullable();
            $table->string('JobType', 50)->nullable();
            $table->text('Skills')->nullable();
            $table->unsignedInteger('ClientID');
            $table->unsignedInteger('FreelancerID')->nullable();
            $table->foreign('ClientID')->references('ClientID')->on('clients')->onDelete('cascade');
            $table->foreign('FreelancerID')->references('FreelancerID')->on('freelancers')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
