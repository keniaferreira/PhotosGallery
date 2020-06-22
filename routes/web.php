<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');

Route::get('album/{codAlbum}', 'IndexController@fotosAlbum');

Route::group(['middleware' => ['auth', 'check.active']], function() {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('criar-album', 'UploadController@index')->name('criar-album');
	Route::post('file-upload/upload', 'UploadController@upload')->name('upload');
	Route::get('adm-albuns', 'AdmAlbumController@index')->name('adm-albuns');
	Route::get('carregar-dados-album/{id}', 'AdmAlbumController@carregarDadosAlbum')->name('carregar-dados-album');
	Route::get('apagar-album/{id}', 'AdmAlbumController@apagarAlbum')->name('apagar-album');

});


