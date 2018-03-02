<?php

namespace App\Helpers;

use App\User;
use App\Admin;
use App\Dosen;
use App\Mahasiswa;

class DataUserHelper
{
  public static function DataUser($User)
  {
    if ($User->tipe == 1) {
      $DataUser = Admin::where('user_id', $User->id)
                       ->first();
    } elseif ($User->tipe == 2) {
      $DataUser = Dosen::where('user_id', $User->id)
                       ->first();
    } elseif ($User->tipe == 3) {
      $DataUser = Mahasiswa::where('user_id', $User->id)
                           ->first();
    }
    return $DataUser;
  }

  public static function ShowStatusDosen($Status)
  {
    if ($Status) {
      $return = '<span class="badge bg-green">Aktif</span>';
    }else {
      $return = '<span class="badge bg-red">Non-Aktif</span>';
    }
    return $return;
  }
}
