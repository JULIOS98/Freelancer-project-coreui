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

Route::get('/main', function () {
    return view('contenido/contenido');
})->name('main');





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
Route::get('/envio', 'EnvioController@index');
Route::post('/envio/registrar', 'EnvioController@store');
Route::put('/envio/desactivar', 'EnvioController@desactivar');
Route::get('/envio/obtenerCabecera', 'EnvioController@obtenerCabecera');
Route::get('/envio/obtenerDetalles', 'EnvioController@obtenerDetalles');



Route::get('/usuario', 'UsuarioController@index');
Route::post('/usuario/registrar', 'UsuarioController@store');
Route::put('/usuario/actualizar', 'UsuarioController@update');

Route::get('/retiros', 'RetiroController@index');

//Auth::routes();
//RUTAS DE LOGIN
Route::get('/','Auth\LoginController@showLoginForm');
Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');




//RUTAS DE MILESTONES
Route::get('/milestone', 'MilestonesController@index');
Route::post('/milestone/registrar', 'MilestonesController@store');
Route::put('/milestone/actualizar', 'MilestonesController@update');
Route::put('/milestone/desactivar', 'MilestonesController@desactivar');
Route::put('/milestone/activar', 'MilestonesController@activar');
Route::get('/milestone/selectMilestone', 'MilestonesController@selectMilestone');