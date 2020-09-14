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
Route::get('/Series', 'listaController@index')->name('listar_Series');
Route::get('/Series/Adicionar', 'listaController@adicionar')->name('adicionar_Series');
Route::post('/Series/Adicionar', 'listaController@criar')->name('criar_Series');