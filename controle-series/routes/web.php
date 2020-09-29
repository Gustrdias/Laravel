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
    return redirect()->route('listar_Series');
});
Route::get('/series','serieController@index')->name('listar_Series');
Route::get('/series/create','serieController@create')->name('adicionar_Series')->middleware('auth');
Route::post('/series','serieController@store')->name('armazenar_Series')->middleware('auth');
Route::get('/series/{id}/edit','serieController@edit')->name('editar_Series')->middleware('auth');
Route::put('/series/{id}','serieController@update')->name('atualizar_Series')->middleware('auth');
Route::delete('/series/{id}','serieController@destroy')->name('destruir_Series')->middleware('auth');

Route::get('/series/{serieId}/detalhes', 'detalheController@index')->name('detalhes');
Route::get('/series/{serieId}/detalhes/create', 'detalheController@create');
Route::post('/series/{serieId}/detalhes', 'detalheController@store');
Route::get('/series/{serieId}/detalhes/{id}/edit', 'detalheController@edit');
Route::put('/series/{serieId}/detalhes/{id}', 'detalheController@update');
Route::delete('/series/{serieId}/detalhes/{id}', 'detalheController@destroy');

Route::get('/series/{serieId}/detalhes/temporada/create', 'temporadaController@create');
Route::post('/series/{serieId}/detalhes/temporada', 'temporadaController@store');
Route::get('/series/{serieId}/detalhes/temporada/{tempId}/edit', 'temporadaController@edit');
Route::put('/series/{serieId}/detalhes/temporada/{tempId}', 'temporadaController@update');
Route::delete('/series/{serieId}/detalhes/temporada/{tempId}', 'temporadaController@destroy');

Route::get('/series/{serieId}/detalhes/temporada/{{tempId}}/episodios', 'episodioController@index')->name('listar_Episodios');
Route::get('/series/{serieId}/detalhes/temporada/{{tempId}}/episodios/create', 'episodioController@create');
Route::post('/series/{serieId}/detalhes/temporada/{{tempId}}/episodios', 'episodioController@store');
Route::get('/series/{serieId}/detalhes/temporada/{tempId}/episodios/{epId}/edit', 'temporadaController@edit');
Route::put('/series/{serieId}/detalhes/temporada/{tempId}/episodios/{epId}', 'episodioController@update');
Route::delete('/series/{serieId}/detalhes/temporada/{tempId}/episodios/{epId}', 'episodioController@destroy');

Auth::routes();
Route::get('/login','Auth\LoginController@index')->name('login');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/register','Auth\RegisterController@create');
Route::post('/register','Auth\RegisterController@store');