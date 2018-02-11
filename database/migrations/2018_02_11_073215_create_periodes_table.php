<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('periodes', function (Blueprint $table) {
      $table->increments('id');
      $table->string('namaperiode');
      $table->date('tanggalbuka');
      $table->date('tanggaltutup');
      $table->tinyInteger('status');
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
    Schema::dropIfExists('periodes');
  }
}
