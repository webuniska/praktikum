<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\User;
use App\Dosen;
use App\Kelas;
use App\Mahasiswa;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  protected $redirectTo = '/home';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);
  }

  public function RegisterDosen()
  {
    return view('auth.RegisterDosen');
  }

  public function submitRegisterDosen(Request $request)
  {
    $User = new User;
    $User->username = $request->username;
    $User->password = bcrypt($request->password);
    $User->tipe     = 2;
    $User->save();

    $UserID = User::orderBy('id', 'desc')
                ->first()
                ->id;

    $Dosen = new Dosen;
    $Dosen->nidn    = $request->nidn;
    $Dosen->nama    = $request->nama;
    $Dosen->nohp    = $request->nohp;
    $Dosen->email   = $request->email;
    $Dosen->user_id = $UserID;
    $Dosen->save();

    return redirect('/')->with('success', 'Registrasi Akun Dosen '.$Dosen->nama.' Berhasil');
  }

  public function RegisterMahasiswa()
  {
    $Kelas = Kelas::all();

    return view('auth.RegisterMahasiswa', ['Kelas' => $Kelas]);
  }

  public function submitRegisterMahasiswa(Request $request)
  {
    $User = new User;
    $User->username = $request->username;
    $User->password = bcrypt($request->password);
    $User->tipe     = 3;
    $User->save();

    $UserID = User::orderBy('id', 'desc')
                ->first()
                ->id;

    $Mahasiswa = new Mahasiswa;
    $Mahasiswa->npm      = $request->npm;
    $Mahasiswa->nama     = $request->nama;
    $Mahasiswa->nohp     = $request->nohp;
    $Mahasiswa->email    = $request->email;
    $Mahasiswa->kelas_id = $request->kelas_id;
    $Mahasiswa->user_id  = $UserID;
    $Mahasiswa->save();

    return redirect('/')->with('success', 'Registrasi Akun Mahasiswa '.$Mahasiswa->nama.' Berhasil');
  }
}
