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
    return view('contenido/contenido');
});


//Rutas de Usuarios
Route::get('usuarios', 'UsuariosController@index');
Route::post('usuarios/registrar', 'UsuariosController@store');
Route::put('usuarios/actualizar', 'UsuariosController@update');
Route::put('usuarios/activar', 'UsuariosController@activar');
Route::put('usuarios/desactivar', 'UsuariosController@desactivar');


