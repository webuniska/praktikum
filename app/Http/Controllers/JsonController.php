<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use IDCrypt;
use App\User;
use App\Admin;

class JsonController extends Controller
{
  public function JsonDataAdmin($Id){
    $Admin = Admin::with('User')
                  ->find($Id);

    return $Admin;
  }

  public function JsonLogin($username){
    $User = User::where('username', $username)
                ->first();
    if ($User) {
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
    return 'default.png';
  }
}
