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

Route::get('/register-dosen', 'Auth\RegisterController@RegisterDosen');
Route::POST('/register-dosen', 'Auth\RegisterController@submitRegisterDosen');
Route::get('/register-mahasiswa', 'Auth\RegisterController@FormRegisterMahasiswa');

Route::get('/dashboard', 'UserController@Dashboard')->name('Dashboard');


Route::get('/home', 'HomeController@index')->name('home');
