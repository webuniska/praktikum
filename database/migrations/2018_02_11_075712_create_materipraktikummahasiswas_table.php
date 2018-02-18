<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateripraktikummahasiswasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('materipraktikummahasiswas', function (Blueprint $table) {
      $table->increments('id');
      $table->tinyInteger('mahasiswa_id');
      $table->tinyInteger('materi_periode_id');
      $table->tinyInteger('kelas_praktikum_id');
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
    Schema::dropIfExists('materipraktikummahasiswas');
  }
}
