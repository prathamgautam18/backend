<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('ProposalID');
            $table->unsignedInteger('JobID');
            $table->unsignedInteger('FreelancerID');
            $table->text('ProposalDetails')->nullable();
            $table->decimal('Amount', 10, 2)->nullable();
            $table->foreign('JobID')->references('JobID')->on('jobs')->onDelete('cascade');
            $table->foreign('FreelancerID')->references('FreelancerID')->on('freelancers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
