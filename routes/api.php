<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
  Route::GET('/status-dosen', 'JsonController@JsonStatusDosen');
  Route::GET('/ubah-status-dosen/{id}', 'JsonController@JsonUbahStatusDosen');
  Route::GET('/kelas/{id}', 'JsonController@JsonSingleDataKelas');
});

Route::GET('/login/{username}', 'JsonController@JsonLogin');
