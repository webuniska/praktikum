<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Auth;
use File;
use Carbon;
use IDCrypt;
use Tanggal;
use DataUser;
use ArrayHelper;
use App\User;
use App\Admin;
use App\Dosen;
use App\Kelas;
use App\Periode;
use App\Mahasiswa;
use App\MateriPeriode;
use App\MateriPraktikum;

class UserController extends Controller
{
  public function Home()
  {
    return view('user.Home');
  }

  public function DataKelas()
  {
    $Kelas = Kelas::all();

    return view('user.DataKelas', ['Kelas' => $Kelas]);
  }

  public function TambahDataKelas()
  {
    return view('user.TambahDataKelas');
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

  public function HapusDataMateri($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $MateriPraktikum = MateriPraktikum::find($Id);
    File::delete('images/Materi/'.$MateriPraktikum->foto);

    $MateriPraktikum->delete();

    return redirect(route('DataMateri'))->with('success', 'Data Materi Berhasil di Hapus');
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

  public function DataMateriPeriode()
  {
    $Periode      = Periode::orderBy('id', 'desc')
                           ->first();

    count($Periode) ? $IdPeriode = $Periode->id : $IdPeriode = '01012011';;

    $MateriPeriode = MateriPeriode::where('periode_id', $IdPeriode)
                                  ->get();

    return view('user.DataMateriPeriode', ['Periode' => $Periode, 'MateriPeriode' => $MateriPeriode]);
  }

  public function TambahDataMateriPeriode()
  {
    $Periode         = Periode::orderBy('id', 'desc')
                              ->first();
    $MateriPraktikum = MateriPraktikum::all();
    $MateriPeriode   = MateriPeriode::where('periode_id', $Periode->id)
                                    ->get();

    if (count($MateriPeriode)) {
      foreach ($MateriPeriode as $Index=>$DataMateriPeriode) {
        $AddedIdMateriPeriode[$Index] = $DataMateriPeriode->materi_praktikum_id;
      }
    } else {
      $AddedIdMateriPeriode[112011] = 1111;
    }

    return view('user.TambahDataMateriPeriode', ['MateriPraktikum' => $MateriPraktikum, 'AddedIdMateriPeriode' => $AddedIdMateriPeriode]);
  }

  public function StatusDataMateriPeriode($Id, $FromRoute)
  {
    $IdMateri  = IDCrypt::Decrypt($Id);
    $IdPeriode = Periode::orderBy('id', 'desc')
                        ->first()
                        ->id;
    $MateriPeriode = MateriPeriode::where('periode_id', $IdPeriode)
                                  ->where('materi_praktikum_id', $IdMateri)
                                  ->get();
    if (count($MateriPeriode)) {
      $Materi = MateriPeriode::find($MateriPeriode->first()->id);
      $Materi->delete();
    }else{
      $MateriPeriode = new MateriPeriode;
      $MateriPeriode->periode_id          = $IdPeriode;
      $MateriPeriode->materi_praktikum_id = $IdMateri;
      $MateriPeriode->save();
    }

    return redirect(route($FromRoute))->with('success', 'Berhasil');
  }

  public function DataAdmin()
  {
    $Admin = Admin::all();

    return view('user.DataAdmin', ['Admin' => $Admin]);
  }

  public function TambahDataAdmin()
  {
    return view('user.TambahDataAdmin');
  }

  public function submitTambahDataAdmin(Request $request)
  {
    $this->validate($request, [
      'username' => [
          Rule::unique('users')
        ],
    ]);

    $User  = new User;

    $User->username = $request->username;
    $User->password = bcrypt($request->password);;
    $User->tipe     = 1;
    $User->save();

    $IdUser = User::orderBy('id', 'desc')
                  ->first()
                  ->id;

    $Admin = new Admin;

    $Admin->nomorinduk = $request->nomorinduk;
    $Admin->nama       = $request->nama;
    $Admin->nohp       = $request->nohp;
    $Admin->email      = $request->email;
    if ($request->foto) {
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $FotoName = 'Admin - '.$request->nama.' - '.IDCrypt::Encrypt($User->id);
      $Foto     = $FotoName.'.'.$FotoExt;
      $request->foto->move('images/User', $Foto);
      $Admin->foto = $Foto;
    }else {
      $Admin->foto = 'default.png';
    }
    $Admin->user_id = $IdUser;
    $Admin->save();

    return redirect(route('DataAdmin'))->with('success', 'Data Admin '.$request->nama.' Berhasil di Tambah');
  }

  public function EditDataAdmin($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Admin = Admin::find($Id);

    return view('user.EditDataAdmin', ['Admin'=>$Admin]);
  }
  public function submitEditDataAdmin(Request $request, $Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Admin = Admin::find($Id);
    $User  = User::find($Admin->user_id);

    $this->validate($request, [
      'username' => [
          Rule::unique('users')->ignore($User->username, 'username'),
        ],
    ]);

    $User->username = $request->username;
    if ($request->password) {
      $User->password = bcrypt($request->password);
    }

    $Admin->nomorinduk = $request->nomorinduk;
    $Admin->nama       = $request->nama;
    $Admin->nohp       = $request->nohp;
    $Admin->email      = $request->email;
    if ($request->foto) {
      if ($Admin->foto != 'default.png') {
        File::delete('images/User/'.$Admin->foto);
      }
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $FotoName = 'Admin - '.$request->nama.' - '.IDCrypt::Encrypt($User->id);
      $Foto     = $FotoName.'.'.$FotoExt;
      $request->foto->move('images/User', $Foto);
      $Admin->foto = $Foto;
    }

    $User->save();
    $Admin->save();

    return redirect(route('DataAdmin'))->with('success', 'Data Admin '.$request->nama.' Berhasil di Ubah');
  }

  public function HapusDataAdmin($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Admin = Admin::find($Id);
    $User = User::find($Admin->user_id);

    if ($Admin->foto != 'default.png') {
      File::delete('images/User/'.$Admin->foto);
    }

    $Admin->delete();
    $User->delete();

    return redirect(route('DataAdmin'))->with('success', 'Data Admin Berhasil di Hapus');
  }

  public function DataDosen()
  {
    $Dosen = Dosen::all();

    return view('user.DataDosen', ['Dosen' => $Dosen]);
  }

  public function UbahStatusDosen($Id){
    $Id = IDCrypt::Decrypt($Id);
    $Dosen = Dosen::find($Id);
    $Dosen->status = $Dosen->status ? 0 : 1;
    $return = $Dosen->save();

    return $return ? 1 : 0;
  }

  public function TambahDataDosen()
  {
    return view('user.TambahDataDosen');
  }

  public function submitTambahDataDosen(Request $request)
  {
    $this->validate($request, [
      'username' => [
          Rule::unique('users')
        ],
    ]);

    $User  = new User;

    $User->username = $request->username;
    $User->password = bcrypt($request->password);;
    $User->tipe     = 2;
    $User->save();

    $IdUser = User::orderBy('id', 'desc')
                  ->first()
                  ->id;

    $Dosen = new Dosen;

    $Dosen->nomorinduk = $request->nomorinduk;
    $Dosen->nama       = $request->nama;
    $Dosen->nohp       = $request->nohp;
    $Dosen->email      = $request->email;
    if ($request->foto) {
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $FotoName = 'Dosen - '.$request->nama.' - '.IDCrypt::Encrypt($User->id);
      $Foto     = $FotoName.'.'.$FotoExt;
      $request->foto->move('images/User', $Foto);
      $Dosen->foto = $Foto;
    }else {
      $Dosen->foto = 'default.png';
    }
    $Dosen->status      = $request->status;
    $Dosen->user_id = $IdUser;
    $Dosen->save();

    return redirect(route('DataDosen'))->with('success', 'Data Dosen '.$request->nama.' Berhasil di Tambah');
  }



  public function EditDataDosen($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Dosen = Dosen::find($Id);

    return view('user.EditDataDosen', ['Dosen'=>$Dosen]);
  }
  public function submitEditDataDosen(Request $request, $Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Dosen = Dosen::find($Id);
    $User  = User::find($Dosen->user_id);

    $this->validate($request, [
      'username' => [
          Rule::unique('users')->ignore($User->username, 'username'),
        ],
    ]);

    $User->username = $request->username;
    if ($request->password) {
      $User->password = bcrypt($request->password);
    }

    $Dosen->nomorinduk = $request->nomorinduk;
    $Dosen->nama       = $request->nama;
    $Dosen->nohp       = $request->nohp;
    $Dosen->email      = $request->email;
    if ($request->foto) {
      if ($Dosen->foto != 'default.png') {
        File::delete('images/User/'.$Dosen->foto);
      }
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $FotoName = 'Dosen - '.$request->nama.' - '.IDCrypt::Encrypt($User->id);
      $Foto     = $FotoName.'.'.$FotoExt;
      $request->foto->move('images/User', $Foto);
      $Dosen->foto = $Foto;
    }

    $User->save();
    $Dosen->save();

    return redirect(route('DataDosen'))->with('success', 'Data Dosen '.$request->nama.' Berhasil di Ubah');
  }

  public function HapusDataDosen($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Dosen = Dosen::find($Id);
    $User = User::find($Dosen->user_id);

    if ($Dosen->foto != 'default.png') {
      File::delete('images/User/'.$Dosen->foto);
    }

    $Dosen->delete();
    $User->delete();

    return redirect(route('DataDosen'))->with('success', 'Data Dosen Berhasil di Hapus');
  }

  public function DataMahasiswa()
  {
    return view ('user.DataMahasiswa');
  }

  public function TambahDataMahasiswa()
  {
    return view('user.TambahDataMahasiswa');
  }

  public function EditDataMahasiswa()
  {
    return view ('user.EditDataMahasiswa');
  }

}
