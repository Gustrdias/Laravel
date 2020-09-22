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
    return view('welcome');
});
Route::get('/Series','listaController@index')->name('listar_Series');
Route::get('/Series/create','listaController@create')->name('adicionar_Series');
Route::post('/Series','listaController@store')->name('armazenar_Series');
Route::get('/Series/{id}/edit','listaController@edit')->name('editar_Series');
Route::put('/Series/{id}','listaController@update')->name('atualizar_Series');
Route::delete('/Series/{id}','listaController@destroy')->name('destruir_Series');

Route::get('/Series/{serieId}/detalhes', 'detalheController@index')->name('detalhes');
Route::get('/Series/{serieId}/detalhes/create', 'detalheController@create');
Route::post('/Series/{serieId}/detalhes', 'detalheController@store');
Route::get('/Series/{serieId}/detalhes/{id}/edit', 'detalheController@edit');
Route::put('/Series/{serieId}/detalhes/{id}', 'detalheController@update');
Route::delete('/Series/{serieId}/detalhes/{id}', 'detalheController@destroy');
