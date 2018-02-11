<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateripraktikumsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('materipraktikums', function (Blueprint $table) {
      $table->increments('id');
      $table->string('kodemateri');
      $table->string('namamateri');
      $table->tinyInteger('semesterminimal');
      $table->string('foto');
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
    Schema::dropIfExists('materipraktikums');
  }
}
