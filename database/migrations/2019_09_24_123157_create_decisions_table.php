<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionsTable extends Migration
{
  public function up()
  {
    Schema::create('decisions', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('decision_type_id');
      $table->unsignedInteger('worker_id');
      $table->unsignedInteger('user_id');
      $table->string('code', 50)->unique();
      $table->string('reason')->nullable();
      $table->integer('old_department')->nullable();
      $table->integer('new_department')->nullable();
      $table->integer('old_position')->nullable();
      $table->integer('new_position')->nullable();
      $table->string('old_salary', 20)->nullable();
      $table->string('new_salary', 20)->nullable();
      $table->date('effective_date')->nullable();
      $table->date('sign_date')->nullable();
      $table->boolean('status')->default(true)->comment('0: chưa ký, 1: đã ký');
      $table->foreign('decision_type_id')->references('id')->on('decision_types');
      $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')->on('users');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('decisions');
  }
}
