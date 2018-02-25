<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use IDCrypt;
use App\Admin;

class JsonController extends Controller
{
  public function JsonDataAdmin($Id){
    $Admin = Admin::with('User')
                  ->find($Id);

    return $Admin;
  }
}
