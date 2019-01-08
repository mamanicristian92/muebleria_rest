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

Route::get('muebles','MuebleController@index');	//get all (los disponibles y con tmu_id = 1)
Route::post('muebles','MuebleController@store');	//agregar uno

Route::get('muebles/{id_mueble}','MuebleController@show');	//get for id
Route::put('muebles/{id_mueble}','MuebleController@modify');	//modificar por id
Route::delete('muebles/{id_mueble}','MuebleController@delete');	//borrar por id

Route::post('muebles/{id_mueble}/fotos','MuebleController@agregar_foto');	//
Route::get('muebles/{id_mueble}/fotos','MuebleController@fotos');
Route::get('muebles/{id_mueble}/fotos/{id_mueble_foto}','MuebleController@foto');

//TipoMueble
Route::get('tipo_muebles','TipoMuebleController@index');
Route::post('tipo_muebles','TipoMuebleController@store');
Route::get('tipo_muebles/{id_tipo_mueble}','TipoMuebleController@show');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});