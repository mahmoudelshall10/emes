<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class CreateServiceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('project_location')->unsigned();
            $table->foreign('project_location')->references('id')->on('countries')->onDelete('cascade');
            $table->longtext('business_requirements');
            $table->string('other_country');
            $table->string('page_url');
            $table->string('additional_attachments');
            $table->string('linked_files');
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
        Schema::dropIfExists('service_forms');
    }
}