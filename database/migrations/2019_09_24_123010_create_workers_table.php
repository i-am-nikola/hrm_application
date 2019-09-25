<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
  public function up()
  {
    Schema::create('workers', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('department_id');
      $table->unsignedInteger('position_id');
      $table->unsignedInteger('education_id');
      $table->string('record_id', 50)->nullable();
      $table->string('code', 50)->unique()->nullable();
      $table->string('name', 100);
      $table->date('birthday')->nullable();
      $table->boolean('gender')->default(true)->comment('0: female, 1: male');
      $table->string('id_no', 20)->unique()->nullable();
      $table->date('issued_on')->nullable();
      $table->string('issued_by', 100)->nullable();
      $table->string('email', 100)->nullable();
      $table->string('phone', 20)->nullable();
      $table->string('permanent_address')->nullable();
      $table->string('temporary_address')->nullable();
      $table->string('graduate_school', 100)->nullable();
      $table->year('graduate_year')->nullable();
      $table->string('certificate', 100)->nullable();
      $table->string('skill', 100)->nullable();
      $table->date('start_work')->nullable();
      $table->date('end_work')->nullable();
      $table->tinyInteger('status')->default(1)->comment('0: thử việc, 1: chính thức, -1: nghỉ việc');
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('department_id')->references('id')->on('departments');
      $table->foreign('position_id')->references('id')->on('positions');
      $table->foreign('education_id')->references('id')->on('educations');
    });
  }

  public function down()
  {
    Schema::dropIfExists('workers');
  }
}
