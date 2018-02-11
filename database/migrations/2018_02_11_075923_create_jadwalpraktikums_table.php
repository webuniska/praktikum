<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalpraktikumsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('jadwalpraktikums', function (Blueprint $table) {
      $table->increments('id');
      $table->tinyInteger('pertemuan');
      $table->date('tanggal');
      $table->time('waktumulai');
      $table->time('waktuselesai');
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
    Schema::dropIfExists('jadwalpraktikums');
  }
}
