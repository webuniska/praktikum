<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function Home()
  {
    return view('User.Dashboard');
  }

  public function Dashboard()
  {
    return view('User.Dashboard');
  }
}
