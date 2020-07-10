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
    return view('tanya.table');
});
Route::get('/data-tables', function () {
    return view('tanya.datatable');
});
Route::group(['middleware'=>'auth'],function(){
	/* ------------------------ pertanyaan ------------------------ */
	Route::get('/pertanyaan','PertanyaanController@index');
	Route::get('/pertanyaan/create','PertanyaanController@create');
	Route::post('/pertanyaan','PertanyaanController@store');
	Route::get('/pertanyaan/{id}','PertanyaanController@show');
	Route::get('/pertanyaan/{id}/edit','PertanyaanController@edit');
	Route::put('/pertanyaan/{id}','PertanyaanController@update');
	Route::delete('/pertanyaan/{id}','PertanyaanController@destroy');

	/* ------------------------ komentar ------------------------ */
	Route::get('/komentarpertanyaan/{pertanyaan_id}','KomentarpertanyaanController@index');
	Route::post('/komentarpertanyaan/{pertanyaan_id}','KomentarpertanyaanController@store');
	Route::get('/komentarjawaban/{jawaban_id}','KomentarjawabanController@index');
	Route::post('/komentarjawaban/{jawaban_id}','KomentarjawabanController@store');

	/* ------------------------ jawaban ------------------------ */
	Route::get('/jawaban/{pertanyaan_id}','JawabanController@index');
	Route::post('/jawaban/{pertanyaan_id}','JawabanController@store');
	Route::get('/jawaban/{id}/vote','JawabanController@vote');
	Route::get('/jawaban/{id}/upvote','VoteController@upjawab');
	Route::get('/jawaban/{id}/downvote','VoteController@downjawab');
});
Route::resource('jawab','JawabController');
Route::get('/profile','ProfileController@index');
Route::get('/pengguna','PenggunaController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
