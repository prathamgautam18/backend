<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('NotificationID');
            $table->unsignedInteger('UserID'); // Can be either ClientID or FreelancerID
            $table->string('NotificationType', 50);
            $table->text('NotificationMessage')->nullable();
            $table->date('NotificationDate')->nullable();
            $table->enum('UserType', ['Client', 'Freelancer']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
