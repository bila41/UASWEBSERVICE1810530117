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

Route::get('barang', 'API\barangController@index');
Route::get('/detail/{id}', 'API\barangController@show');
Route::delete('/deletedatabarang/{id}', 'API\barangController@deletebarang');
Route::post('/tambahbarang', 'API\barangController@tambahbarang');
Route::post('/updatedatabarang/{id}', 'API\barangController@update');

Route::get('pesanan', 'API\pesananController@index');


Route::get('detailpesanan', 'API\detailpesananController@index');