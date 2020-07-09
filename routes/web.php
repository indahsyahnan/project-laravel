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

Route::get('/', function () {
    return view('items.table');
});
Route::get('/data-tables', function () {
    return view('items.datatable');
});
Route::group(['middleware'=>'auth'],function(){
	Route::get('/pertanyaan','PertanyaanController@index');
	Route::get('/pertanyaan/create','PertanyaanController@create');
	Route::post('/pertanyaan','PertanyaanController@store');
	Route::get('/pertanyaan/{id}','PertanyaanController@show');
	Route::get('/pertanyaan/{id}/edit','PertanyaanController@edit');
	Route::put('/pertanyaan/{id}','PertanyaanController@update');
	Route::delete('/pertanyaan/{id}','PertanyaanController@destroy');
	Route::get('/komentarpertanyaan/{pertanyaan_id}','KomentarpertanyaanController@index');
	Route::post('/komentarpertanyaan/{pertanyaan_id}','KomentarpertanyaanController@store');
	Route::get('/komentarjawaban/{jawaban_id}','KomentarjawabanController@index');
	Route::post('/komentarjawaban/{jawaban_id}','KomentarjawabanController@store');
	Route::get('/jawaban/{pertanyaan_id}','JawabanController@index');
	Route::post('/jawaban/{pertanyaan_id}','JawabanController@store');
});
Route::resource('jawab','JawabController');
Route::get('/profile','ProfileController@index');
Route::get('/pengguna','PenggunaController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
