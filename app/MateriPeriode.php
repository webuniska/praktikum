<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriPeriode extends Model
{
  public function MateriPraktikum()
  {
    return $this->belongsTo('App\MateriPraktikum');
  }

  public function Periode()
  {
    return $this->belongsTo('App\Periode');
  }
}
