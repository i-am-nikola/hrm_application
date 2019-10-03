<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id')->autoIncrement();
      $table->unsignedInteger('role_id');
      $table->string('name', 100);
      $table->string('email', 100)->unique();
      $table->string('password', 100);
      $table->string('avatar', 100)->default('avatar6.png');
      $table->boolean('status')->default(true)->comment('0: inactive, 1: active');
      $table->rememberToken();
      $table->timestamps();
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  public function down()
  {
    Schema::dropIfExists('users');
  }
}
