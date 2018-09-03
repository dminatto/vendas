<?php

use Illuminate\Support\Facades\Auth;

Route::auth();

Route::resource('auth', 'Auth\AuthController');
Route::resource('password', 'Auth\PasswordController');

Route::get('/', 'Auth\LoginController@index');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/authenticate', 'Auth\LoginController@authenticate');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/error/{id}', 'Auth\LoginController@error');

Route::group(['middleware' => 'web'], function () {

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

Route::get('/venda', 'SaleController@list');
Route::get('/venda/novo', 'SaleController@new');
Route::get('/venda/editar/{id}', 'SaleController@edit');
Route::get('/venda/remove/{id}', 'SaleController@delete');
Route::get('/venda/detalhe/{id}', 'SaleController@detail');

Route::post('/venda/adiciona', 'SaleController@add');
Route::post('/venda/update/{id}', 'SaleController@update');

Route::post('/estoque/getPrecoItem/{id}', 'SaleController@get_price');

});