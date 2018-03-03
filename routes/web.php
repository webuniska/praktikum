<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/blank', function(){
  return view('user.aBlank');
});
Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::GET('/register-dosen', 'Auth\RegisterController@RegisterDosen');
Route::POST('/register-dosen', 'Auth\RegisterController@submitRegisterDosen');
Route::GET('/register-mahasiswa', 'Auth\RegisterController@RegisterMahasiswa');
Route::POST('/register-mahasiswa', 'Auth\RegisterController@submitRegisterMahasiswa');
Route::GET('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['UserMiddleware']], function () {
  Route::GET('/home', 'UserController@Home')
       ->name('Home');

  //Admin
  //Kelas
  Route::GET('/data-kelas', 'UserController@DataKelas')
       ->name('DataKelas');
  Route::GET('/data-kelas/tambah', 'UserController@TambahDataKelas')
       ->name('TambahDataKelas');
  Route::POST('/data-kelas/tambah', 'UserController@submitTambahDataKelas')
       ->name('submitTambahDataKelas');
  Route::GET('/data-kelas/{Id}/edit', 'UserController@EditDataKelas')
       ->name('EditDataKelas');
  Route::POST('/data-kelas/{Id}/edit', 'UserController@submitEditDataKelas')
       ->name('submitEditDataKelas');
  Route::GET('/data-kelas/{Id}/hapus', 'UserController@HapusDataKelas')
       ->name('HapusDataKelas');
  // Materi Praktikum
  Route::GET('/data-materi', 'UserController@DataMateri')
       ->name('DataMateri');
  Route::GET('/data-materi/tambah', 'UserController@TambahDataMateri')
       ->name('TambahDataMateri');
  Route::POST('/data-materi/tambah', 'UserController@submitTambahDataMateri')
       ->name('submitTambahDataMateri');
  Route::GET('/data-materi/{Id}/edit', 'UserController@EditDataMateri')
       ->name('EditDataMateri');
  Route::POST('/data-materi/{Id}/edit', 'UserController@submitEditDataMateri')
       ->name('submitEditDataMateri');
  Route::GET('/data-materi/{Id}/hapus', 'UserController@HapusDataMateri')
       ->name('HapusDataMateri');
  // Periode
  Route::GET('/data-periode', 'UserController@DataPeriode')
       ->name('DataPeriode');
  Route::GET('/data-periode/tambah', 'UserController@TambahDataPeriode')
       ->name('TambahDataPeriode');
  Route::POST('/data-periode/tambah', 'UserController@submitTambahDataPeriode')
       ->name('submitTambahDataPeriode');
  Route::GET('/data-periode/{Id}/edit', 'UserController@EditDataPeriode')
       ->name('EditDataPeriode');
  Route::POST('/data-periode/{Id}/edit', 'UserController@submitEditDataPeriode')
       ->name('submitEditDataPeriode');
  Route::GET('/data-periode/{Id}/status', 'UserController@UbahStatusDataPeriode')
       ->name('UbahStatusDataPeriode');
  // MateriPeriode
  Route::GET('/data-materiperiode', 'UserController@DataMateriPeriode')
       ->name('DataMateriPeriode');
  Route::GET('/data-materiperiode/tambah', 'UserController@TambahDataMateriPeriode')
       ->name('TambahDataMateriPeriode');
  Route::GET('/data-materiperiode/{id}/status/{fromroute}', 'UserController@StatusDataMateriPeriode')
       ->name('StatusDataMateriPeriode');

  //Data Admin
  Route::GET('/data-admin', 'UserController@DataAdmin')
       ->name('DataAdmin');
  Route::GET('/data-admin/tambah', 'UserController@TambahDataAdmin')
       ->name('TambahDataAdmin');
  Route::POST('/data-admin/tambah', 'UserController@submitTambahDataAdmin')
       ->name('submitTambahDataAdmin');
  Route::GET('/data-admin/{id}/edit', 'UserController@EditDataAdmin')
       ->name('EditDataAdmin');
  Route::POST('/data-admin/{id}/edit', 'UserController@submitEditDataAdmin')
       ->name('submitEditDataAdmin');
  Route::GET('/data-admin/{id}/hapus', 'UserController@HapusDataAdmin')
       ->name('HapusDataAdmin');

  //Data dosen
  Route::GET('/data-dosen', 'UserController@DataDosen')
       ->name('DataDosen');
  Route::GET('/data-dosen/tambah', 'UserController@TambahDataDosen')
       ->name('TambahDataDosen');
  Route::POST('/data-dosen/tambah', 'UserController@submitTambahDataDosen')
       ->name('submitTambahDataDosen');
  Route::GET('/data-dosen/{id}/edit', 'UserController@EditDataDosen')
       ->name('EditDataDosen');
  Route::POST('/data-dosen/{id}/edit', 'UserController@submitEditDataDosen')
       ->name('submitEditDataDosen');
  Route::GET('/data-dosen/{id}/status', 'UserController@UbahStatusDosen')
       ->name('UbahStatusDosen');
  Route::GET('/data-dosen/{id}/hapus', 'UserController@HapusDataDosen')
       ->name('HapusDataDosen');

  //Data mahasiswa
  Route::GET('/data-mahasiswa', 'UserController@DataMahasiswa')
       ->name('DataMahasiswa');
  Route::GET('/data-mahasiswa/tambah', 'UserController@TambahDataMahasiswa')
       ->name('TambahDataMahasiswa');
  Route::POST('/data-mahasiswa/tambah', 'UserController@submitTambahDataMahasiswa')
       ->name('submitTambahDataMahasiswa');
  Route::GET('/data-mahasiswa//edit', 'UserController@EditDataMahasiswa')
       ->name('EditDataMahasiswa');
  Route::POST('/data-mahasiswa//edit', 'UserController@submitEditDataMahasiswa')
       ->name('submitEditDataMahasiswa');
  Route::GET('/data-mahasiswa//hapus', 'UserController@HapusDataMahasiswa')
       ->name('HapusDataMahasiswa');

  // JSON
  Route::GET('/json/data-admin/{id}', 'JsonController@JsonDataAdmin')
       ->name('JsonDataAdmin');
  Route::GET('/json/data-dosen/{id}', 'JsonController@JsonDataDosen')
       ->name('JsonDataAdmin');
});

// Json
Route::GET('/json/login/{username}', 'JsonController@JsonLogin')
     ->name('JsonLogin');

// BATAS SUCI
Route::get('/dashboard', 'UserController@Dashboard')->name('Dashboard');


// Route::get('/home', 'HomeController@index')->name('home');
