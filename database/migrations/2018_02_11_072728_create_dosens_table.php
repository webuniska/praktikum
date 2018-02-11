<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosensTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('dosens', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nidn');
      $table->string('nama');
      $table->string('nohp');
      $table->string('email');
      $table->string('foto');
      $table->tinyInteger('status');
      $table->integer('user_id');
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
    Schema::dropIfExists('dosens');
  }
}
