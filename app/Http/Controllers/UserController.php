<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use File;
use Carbon;
use IDCrypt;
use DataUser;
use Tanggal;
use App\User;
use App\Kelas;
use App\Periode;
use App\Mahasiswa;
use App\MateriPraktikum;

class UserController extends Controller
{
  public function Home()
  {
    return view('User.Home');
  }

  public function DataKelas()
  {
    $Kelas = Kelas::all();

    return view('User.DataKelas', ['Kelas' => $Kelas]);
  }

  public function TambahDataKelas()
  {
    return view('User.TambahDataKelas');
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
    $Id = IDCrypt::Decrypt($Id);
    $Kelas = Kelas::find($Id);

    return view('user.EditDataKelas', ['Kelas' => $Kelas]);
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

  public function DataMateri()
  {
    $MateriPraktikum = MateriPraktikum::all();

    return view('user.DataMateri', ['MateriPraktikum' => $MateriPraktikum]);
  }

  public function TambahDataMateri()
  {
    return view('user.TambahDataMateri');
  }

  public function submitTambahDataMateri(Request $request)
  {
    $MateriPraktikum = new MateriPraktikum;

    $FotoExt  = $request->foto->getClientOriginalExtension();
    $FotoName = Carbon::now()->format('dmYHiS').' - '.$request->namamateri;
    $Foto     = $FotoName.'.'.$FotoExt;
    $request->foto->move('images/Materi', $Foto);

    $MateriPraktikum->kodemateri      = $request->kodemateri;
    $MateriPraktikum->namamateri      = $request->namamateri;
    $MateriPraktikum->semesterminimal = $request->semesterminimal;
    $MateriPraktikum->foto            = $Foto;
    $MateriPraktikum->save();

    return redirect(route('DataMateri'))->with('success', 'Data Materi '.$request->namamateri.' Berhasil di Tambahkan');
  }

  public function EditDataMateri($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $MateriPraktikum = MateriPraktikum::find($Id);

    return view('user.EditDataMateri', ['MateriPraktikum' => $MateriPraktikum]);
  }

  public function submitEditDataMateri(Request $request, $Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $MateriPraktikum = MateriPraktikum::find($Id);

    if ($request->foto) {
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $FotoName = Carbon::now()->format('dmYHiS').' - '.$request->namamateri;
      $Foto     = $FotoName.'.'.$FotoExt;
      $request->foto->move('images/Materi', $Foto);
      File::delete('images/Materi/'.$MateriPraktikum->foto);
      $MateriPraktikum->foto            = $Foto;
    }

    $MateriPraktikum->kodemateri      = $request->kodemateri;
    $MateriPraktikum->namamateri      = $request->namamateri;
    $MateriPraktikum->semesterminimal = $request->semesterminimal;
    $MateriPraktikum->save();

    return redirect(route('DataMateri'))->with('success', 'Data Materi '.$request->namamateri.' Berhasil di Tambahkan');
  }

  public function DataPeriode()
  {
    $Periode = Periode::all();

    return view('user.DataPeriode', ['Periode' => $Periode]);
  }

  public function TambahDataPeriode()
  {
    return view('user.TambahDataPeriode');
  }

  public function submitTambahDataPeriode(Request $request)
  {
    $Periode = new Periode;

    $Periode->namaperiode  = $request->namaperiode;
    $Periode->tanggalbuka  = $request->tanggalbuka;
    $Periode->tanggaltutup = $request->tanggaltutup;
    $Periode->status       = $request->status;
    $Periode->save();

    return redirect(route('DataPeriode'))->with('success', 'Data Periode '.$request->namaperiode.' Berhasil di Tambahkan');
  }

  public function EditDataPeriode($Id)
  {
    $Id = IDCrypt::Decrypt($Id);

    $Periode = Periode::find($Id);

    return view('user.EditDataPeriode', ['Periode' => $Periode]);
  }

  public function submitEditDataPeriode(Request $request, $Id)
  {
    $Id = IDCrypt::Decrypt($Id);

    $Periode = Periode::find($Id);
    $Periode->namaperiode  = $request->namaperiode;
    $Periode->tanggalbuka  = $request->tanggalbuka;
    $Periode->tanggaltutup = $request->tanggaltutup;
    $Periode->status       = $request->status;
    $Periode->save();

    return redirect(route('DataPeriode'))->with('success', 'Data Periode '.$request->namaperiode.' Berhasil di Ubah');
  }

  public function UbahStatusDataPeriode($Id)
  {
    $Id = IDCrypt::Decrypt($Id);

    $Periode = Periode::find($Id);
    if ($Periode->status) {
      $Periode->status = 0;
    }else{
      $Periode->status = 1;
    }
    $Periode->save();

    return redirect(route('DataPeriode'))->with('success', 'Status Data Periode '.$Periode->namaperiode.' Berhasil di Ubah');
  }
}
