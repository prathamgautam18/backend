<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('PaymentID');
            $table->unsignedInteger('JobID');
            $table->decimal('Amount', 10, 2);
            $table->date('PaymentDate')->nullable();
            $table->enum('PaymentStatus', ['Pending', 'Completed', 'Failed']);
            $table->foreign('JobID')->references('JobID')->on('jobs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
