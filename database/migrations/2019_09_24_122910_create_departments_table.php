<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
  public function up()
  {
    Schema::create('departments', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('parent_id')->default(1);
      $table->string('name', 50)->unique();
      $table->string('slug', 50)->unique();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('departments');
  }
}
