<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class CreateServeinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serveins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('company_address');
            $table->bigInteger('longitude');
            $table->bigInteger('latitude');
            $table->bigInteger('company_phone');
            $table->string('company_email');
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
        Schema::dropIfExists('serveins');
    }
}