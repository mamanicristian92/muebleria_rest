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

Route::get('muebles/{id_mueble}','MuebleController@show')->where('id_mueble','[1-9]+');	//get for id
Route::put('muebles/{id_mueble}','MuebleController@modify')->where('id_mueble','[1-9]+');	//modificar por id
Route::delete('muebles/{id_mueble}','MuebleController@delete')->where('id_mueble','[1-9]+');	//borrar por id

Route::post('muebles/{id_mueble}/fotos','MuebleController@agregar_foto');	//
Route::get('muebles/{id_mueble}/fotos','MuebleController@fotos');
Route::get('muebles/{id_mueble}/fotos/{id_mueble_foto}','MuebleController@foto');

//TipoMueble
Route::get('muebles/tipos','TipoMuebleController@index');
Route::post('muebles/tipos','TipoMuebleController@store');
Route::get('muebles/tipos/{id_tipo_mueble}','TipoMuebleController@show')->where('id_tipo_mueble','[1-9]+');
Route::put('muebles/tipos/{id_tipo_mueble}','TipoMuebleController@modify')->where('id_tipo_mueble','[1-9]+');

//TipoLinea
Route::get('muebles/tipos/lineas','TipoMuebleController@index');
//TipoMadera
Route::get('muebles/tipos/maderas','TipoMaderaController@index');

//Productos
Route::get('productos','ProductoController@index');
//Productos
Route::post('productos','ProductoController@store');
Route::get('productos/{id_producto}','ProductoController@show')->where('id_producto','[1-9]+');	//get for id
Route::put('productos/{id_producto}','ProductoController@modify')->where('id_producto','[1-9]+');
Route::delete('productos/{id_producto}','ProductoController@delete')->where('id_producto','[1-9]+');

Route::post('productos/{id_producto}/fotos','ProductoController@agregar_foto');	//
Route::get('productos/{id_producto}/fotos','ProductoController@fotos');
Route::get('productos/{id_producto}/fotos/{id_producto_foto}','ProductoController@foto');
Route::delete('productos/{id_producto}/fotos/{id_producto_foto}','ProductoController@deletefoto');




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});