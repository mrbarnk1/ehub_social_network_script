<?php

// Copyright Bankole Emmnauel 2019 
// mrbarnk.COM

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
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('mob')->nullable();
            $table->string('yob')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('about')->nullable();
            $table->string('school')->nullable();
            $table->string('school_from')->nullable();
            $table->string('school_to')->nullable();
            $table->text('school_about')->nullable();
            $table->string('school_is_grad')->nullable();
            $table->string('work')->nullable();
            $table->string('work_as')->nullable();
            $table->string('work_from')->nullable();
            $table->string('work_to')->nullable();
            $table->string('work_city')->nullable();
            $table->text('work_decription')->nullable();
            $table->text('intrests')->nullable();
            $table->string('follow')->nullable();
            $table->string('notifications')->nullable();
            $table->string('message')->nullable();
            $table->string('tag')->nullable();
            $table->string('sound')->nullable();
            $table->string('passwords');
            $table->string('can_post')->nullable();
            $table->string('can_message')->nullable();
            $table->string('can_login')->nullable();
            $table->string('following')->nullable();
            $table->string('followers')->nullable();
            $table->string('email', 190)->unique();
            $table->string('is_verified');
            $table->string('is_admin')->nullable();
            $table->string('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
