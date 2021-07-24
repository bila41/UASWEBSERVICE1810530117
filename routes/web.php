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


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/shop', 'shopController@index');
Route::get('/detail/{id}', 'shopController@show');
Route::post('/pesan/{id}', 'shopController@pesan');
Route::get('/cart', 'shopController@cart');
Route::delete('/cart/{id}', 'shopController@delete');
Route::get('konfirmasi-checkout', 'shopController@konfirmasi');

Route::get('profil', 'ProfilController@index');
Route::post('profil', 'ProfilController@update');

Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@detail');