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

//Rutas de Metodos
Route::get('metodos', 'MetodoPagoController@index');
Route::get('metodos/selectMetodo', 'MetodoPagoController@selectMetodo');
Route::post('metodos/registrar', 'MetodoPagoController@store');
Route::put('metodos/actualizar', 'MetodoPagoController@update');
Route::put('metodos/activar', 'MetodoPagoController@activar');
Route::put('metodos/desactivar', 'MetodoPagoController@desactivar');

//Rutas de Roles
Route::get('roles', 'RolesController@index');
Route::put('roles/actualizar', 'RolesController@update');
Route::put('roles/activar', 'RolesController@activar');
Route::put('roles/desactivar', 'RolesController@desactivar');

//Rutas de Personas
Route::get('personas', 'PersonasController@index');

//Rutas de Ciudades
Route::get('ciudades/selectCiudad', 'CiudadController@selectCiudad');

//Rutas de Pagos
   /* Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
