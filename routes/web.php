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

Route::get('/', 'DaerahController@index');
Route::get('/daerah/kabupatenkota/{provinsi}', 'DaerahController@kabupatenkota');
Route::get('/daerah/kecamatan/{provinsi}/{kabupatenkota}', 'DaerahController@kecamatan');
Route::get('/daerah/kelurahan/{provinsi}/{kabupatenkota}/{kecamatan}', 'DaerahController@kelurahan');

Route::resource('mahasiswa', 'MahasiswaController');