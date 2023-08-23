<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('username',191)->nullable();
            $table->string('email',191)->unique();
            $table->string('password');
            $table->boolean('is_confirmed')->default(0);
            $table->boolean('status')->default(0)->comment('0 => pending , 1 => active, 2 => deactivate'); // 0 not active, 1 => active
            $table->string('fcm_token')->nullable();
            $table->string('email_verified_at')->nullable();

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
        Schema::dropIfExists('students');
    }
}
