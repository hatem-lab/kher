<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_type'); // student, user
            $table->string('type');
            $table->string('fcm_message_en')->nullable();
            $table->string('fcm_title_en')->nullable();
            $table->string('fcm_message_ar')->nullable();
            $table->string('fcm_title_ar')->nullable();
            $table->text('fcm_data')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
