<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('/golongan', 'golonganController');
Route::resource('/jabatan', 'jabatanController');
Route::resource('/pegawai', 'pegawaiController');
Route::resource('/kategori', 'kategoriController');
Route::resource('/lemburp','lemburpegawaiController');
Route::resource('/error1','lemburpegawaiController@error1');
Route::resource('/error2','tunjanganpController@error2');
Route::resource('/tunjangan', 'tunjanganController');
Route::resource('/tunjanganp', 'tunjanganpController');
Route::resource('/penggajian', 'PenggajianController');
Route::get('query', 'PenggajianController@search');
Route::get('bulanlembur','lemburpegawaiController@searchbulan');
Route::get('namalembur','lemburpegawaiController@searchnama');
Route::resource('/gaji', 'gajiController');
Route::get('bulangaji','gajiController@search');

Route::get('coba',function(){
	return view('layouts.coba');
});