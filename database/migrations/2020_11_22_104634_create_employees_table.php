<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->unsignedBigInteger('position_id');
            $table->date('employment_date');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->integer('salary');
            $table->unsignedBigInteger('photo_id');
            $table->unsignedBigInteger('head_id')->unsigned()->nullable();
            $table->unsignedBigInteger('admin_created_at_id')->nullable();
            $table->unsignedBigInteger('admin_updated_at_id')->nullable();
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade');
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('head_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('admin_created_id')->references('id')->on('users');
            $table->foreign('admin_updated_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
