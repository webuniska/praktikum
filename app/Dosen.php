<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
  public function User()
  {
    return $this->hasOne('App\User');
  }
}
