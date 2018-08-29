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
    return view('/home');
});


Route::get('/vendedores', 'SellerController@list');
Route::get('/vendedores/novo', 'SellerController@new');
Route::get('/vendedores/editar/{id}', 'SellerController@edit');
Route::get('/vendedores/remove/{id}', 'SellerController@delete');
Route::get('/vendedores/detalhe/{id}', 'SellerController@detail');

Route::post('/vendedores/adiciona', 'SellerController@add');
Route::post('/vendedores/update/{id}', 'SellerController@update');

Route::get('/estoque', 'ItemController@list');
Route::get('/estoque/novo', 'ItemController@new');
Route::get('/estoque/editar/{id}', 'ItemController@edit');
Route::get('/estoque/remove/{id}', 'ItemController@delete');
Route::get('/estoque/detalhe/{id}', 'ItemController@detail');

Route::post('/estoque/adiciona', 'ItemController@add');
Route::post('/estoque/update/{id}', 'ItemController@update');
