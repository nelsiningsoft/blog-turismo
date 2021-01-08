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
    return view('plantilla');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS QUE INCLUYEN TODOS LOS MÉTODOS HTTP
//Route::resource
//php artisan route:list

Route::resource('/', 'BlogController');
Route::resource('/blog', 'BlogController');
Route::resource('/administradores', 'AdministradoresController');
Route::resource('/categorias', 'CategoriasController');
Route::resource('/articulos', 'ArticulosController');
Route::resource('/opiniones', 'OpinionesController');
Route::resource('/banner', 'BannerController');
Route::resource('/anuncios', 'AnunciosController');
Route::resource('/comparativa', 'ComparativaController');
Route::resource('/recuperacion', 'RecuperacionController');


