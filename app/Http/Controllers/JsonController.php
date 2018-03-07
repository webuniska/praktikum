<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use IDCrypt;
use App\User;
use App\Admin;
use App\Dosen;

class JsonController extends Controller
{
  public function JsonAllDataDosen(){
    $Dosen = Dosen::all();
    return response()->json($Dosen);
  }

  public function JsonStatusDosen(){
    $Dosen = Dosen::all()
                  ->pluck('status','id');

    return response()->json($Dosen);
  }

  public function JsonUbahStatusDosen($Id){
    $Dosen = Dosen::find($Id);

    $Dosen->status = $Dosen->status ? 0 : 1;
    $Response = $Dosen->save();

    return $Dosen->status;
  }

  public function JsonDataAdmin($Id){
    $Admin = Admin::with('User')
                  ->find($Id);

    return $Admin;
  }

  public function JsonDataDosen($Id){
    $Dosen = Dosen::find($Id);

    return response()->json($Dosen);
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
