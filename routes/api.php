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

Route::get('muebles','MuebleController@index');
Route::post('muebles','MuebleController@store');

Route::get('muebles/{id_mueble}','MuebleController@show');
Route::put('muebles/{id_mueble}','MuebleController@modify');
Route::delete('muebles/{id_mueble}','MuebleController@delete');

Route::post('muebles/{id_mueble}/fotos','MuebleController@agregar_foto');
Route::get('muebles/{id_mueble}/fotos','MuebleController@fotos');
Route::get('muebles/{id_mueble}/fotos/{id_mueble_foto}','MuebleController@foto');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});