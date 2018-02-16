<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('admins', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nomorinduk');
      $table->string('nama');
      $table->string('nohp');
      $table->string('email');
      $table->string('foto')->default('default.png');
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
    Schema::dropIfExists('admins');
  }
}
