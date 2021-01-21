<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('career_id')->unsigned();
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('career_type',['freelance','full-time','part-time']);
            $table->bigInteger('rate_range_monthly_from');
            $table->bigInteger('rate_range_monthly_to');
            $table->bigInteger('rate_range_hourly_from');
            $table->bigInteger('rate_range_hourly_to');
            $table->string('cv_file');
			$table->softDeletes();
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
        Schema::dropIfExists('teams');
    }
}