<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelaspraktikumsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('kelaspraktikums', function (Blueprint $table) {
      $table->increments('id');
      $table->string('namakelas');
      $table->string('ruangan');
      $table->tinyInteger('status');
      $table->tinyInteger('dosen_id');
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
    Schema::dropIfExists('kelaspraktikums');
  }
}
