<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('activation_token');
            $table->string('provider');
            $table->string('provider_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('company_name')->nullable();
            $table->string('nationality');
            $table->string('country_of_residence');
            $table->string('mobile_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('position')->nullable();
            $table->boolean('account_status')->default(false);
            $table->string('profile_image')->nullable();
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
