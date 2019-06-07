<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('uuid');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->text('address')->nullable();
            $table->string('user_name')->nullable();
            $table->string('job_title')->nullable();
            // $table->string('user_status')->nullable(); All user status are roles [Disabled, Suspended, Dismissed, Active, Onboarding, On vacation]
            $table->string('nationality')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
