<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use IDCrypt;
use App\Admin;

class JsonController extends Controller
{
  public function JsonDataAdmin($Id){
    // $Id = IDCrypt::Decrypt($Id);
    $Admin = Admin::find($Id);

    return $Admin;
  }
}
