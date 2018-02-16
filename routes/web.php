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
Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::GET('/register-dosen', 'Auth\RegisterController@RegisterDosen');
Route::POST('/register-dosen', 'Auth\RegisterController@submitRegisterDosen');
Route::GET('/register-mahasiswa', 'Auth\RegisterController@RegisterMahasiswa');
Route::POST('/register-mahasiswa', 'Auth\RegisterController@submitRegisterMahasiswa');
Route::GET('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['UserMiddleware']], function () {
  Route::GET('/home', 'UserController@Home')->name('Home');

  //Admin
  //Kelas
  Route::GET('/data-kelas', 'UserController@DataKelas')->name('DataKelas');
  Route::GET('/data-kelas/tambah', 'UserController@TambahDataKelas')->name('TambahDataKelas');
  Route::POST('/data-kelas/tambah', 'UserController@submitTambahDataKelas')->name('submitTambahDataKelas');
  Route::GET('/data-kelas/{Id}/edit', 'UserController@EditDataKelas')->name('EditDataKelas');
  Route::POST('/data-kelas/{Id}/edit', 'UserController@submitEditDataKelas')->name('submitEditDataKelas');
  Route::GET('/data-kelas/{Id}/hapus', 'UserController@HapusDataKelas')->name('HapusDataKelas');
  // Periode
  Route::GET('/data-periode', 'UserController@DataPeriode')->name('DataPeriode');
  Route::GET('/data-periode/tambah', 'UserController@TambahDataPeriode')->name('TambahDataPeriode');
  Route::POST('/data-periode/tambah', 'UserController@submitTambahDataPeriode')->name('submitTambahDataPeriode');
  Route::GET('/data-periode/{Id}/edit', 'UserController@EditDataPeriode')->name('EditDataPeriode');
  Route::POST('/data-periode/{Id}/edit', 'UserController@submitEditDataPeriode')->name('submitEditDataPeriode');
  Route::GET('/data-periode/{Id}/status', 'UserController@UbahStatusDataPeriode')->name('UbahStatusDataPeriode');

});


// BATAS SUCI
Route::get('/dashboard', 'UserController@Dashboard')->name('Dashboard');


// Route::get('/home', 'HomeController@index')->name('home');
