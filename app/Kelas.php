<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
  public function Mahasiswa()
  {
    return $this->hasMany('App\Mahasiswa');
  }
}
