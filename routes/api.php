<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::get('/barang', 'API\barangController@index')->middleware('auth:api');
Route::get('/barang/{id}', 'API\barangController@show')->middleware('auth:api');
Route::delete('/barangdelete/{id}', 'API\barangController@delete')->middleware('auth:api');
Route::post('/barangtambah', 'API\barangController@store')->middleware('auth:api');
Route::patch('/barangupdate/{id}', 'API\barangController@update')->middleware('auth:api');

Route::get('semuapesanan', 'API\pesananController@index')->middleware('auth:api');
Route::get('pesanan/{id}', 'API\pesananController@show')->middleware('auth:api');
Route::patch('pesananupdate/{id}', 'API\pesananController@update')->middleware('auth:api');


Route::get('detailpesanan', 'API\detailpesananController@index')->middleware('auth:api');
Route::get('detailpesanan/{id}', 'API\detailpesananController@show')->middleware('auth:api');