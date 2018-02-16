<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DataUser;
use IDCrypt;
use App\User;
use App\Kelas;
use App\Mahasiswa;

class UserController extends Controller
{
  public function Home()
  {
    $DataUser = DataUser::DataUser(Auth::user());

    return view('User.Home', ['DataUser' => $DataUser]);
  }

  public function DataKelas()
  {
    $DataUser = DataUser::DataUser(Auth::user());

    $Kelas = Kelas::all();

    return view('User.DataKelas', ['DataUser' => $DataUser, 'Kelas' => $Kelas]);
  }

  public function TambahDataKelas()
  {
    $DataUser = DataUser::DataUser(Auth::user());

    return view('User.TambahDataKelas', ['DataUser' => $DataUser]);
  }

  public function submitTambahDataKelas(Request $request)
  {
    $Kelas = new Kelas;
    $Kelas->namakelas = $request->namakelas;
    $Kelas->save();

    return redirect(route('DataKelas'))->with('success', 'Data Kelas '.$request->namakelas.' Berhasil di Tambahkan');
  }

  public function EditDataKelas($Id)
  {
    $DataUser = DataUser::DataUser(Auth::user());

    $Id = IDCrypt::Decrypt($Id);
    $Kelas = Kelas::find($Id);

    return view('user.EditDataKelas', ['DataUser' => $DataUser, 'Kelas' => $Kelas]);
  }

  public function submitEditDataKelas(Request $request, $Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Kelas = Kelas::find($Id);
    $Kelas->namakelas = $request->namakelas;
    $Kelas->save();

    return redirect(route('DataKelas'))->with('success', 'Data Kelas '.$request->namakelas.' Berhasil di Ubah');
  }

  public function HapusDataKelas($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Kelas = Kelas::find($Id);
    $Kelas->delete();

    return redirect(route('DataKelas'))->with('success', 'Data Kelas Berhasil di Hapus');
  }
}
