<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamingTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::rename('materipraktikums', 'materi_praktikums');
    Schema::rename('materiperiodes', 'materi_periodes');
    Schema::rename('materipraktikummahasiswas', 'materi_praktikum_mahasiswas');
    Schema::rename('kelaspraktikums', 'kelas_praktikums');
    Schema::rename('jadwalpraktikums', 'jadwal_praktikums');
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::rename('jadwal_praktikums', 'jadwalpraktikums');
    Schema::rename('kelas_praktikums', 'kelaspraktikums');
    Schema::rename('materi_praktikum_mahasiswas', 'materipraktikummahasiswas');
    Schema::rename('materi_periodes', 'materiperiodes');
    Schema::rename('materi_praktikums', 'materipraktikums');
  }
}
