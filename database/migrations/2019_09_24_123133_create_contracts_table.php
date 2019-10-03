<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
  public function up()
  {
    Schema::create('contracts', function (Blueprint $table) {
      $table->increments('id')->autoIncrement();
      $table->unsignedInteger('contract_type_id');
      $table->unsignedInteger('worker_id');
      $table->unsignedInteger('user_id');
      $table->string('code', 50)->unique()->nullable();
      $table->string('salary', 20)->nullable();
      $table->date('effective_date');
      $table->date('expiry_date')->nullable();
      $table->date('sign_date')->nullable();
      $table->boolean('status')->default(true)->comment('0: chưa ký, 1: đã ký');
      $table->timestamps();
      $table->foreign('contract_type_id')->references('id')->on('contract_types');
      $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  public function down()
  {
    Schema::dropIfExists('contracts');
  }
}
