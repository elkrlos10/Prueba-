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



Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'Auth\RegisterController@showRegistrationForm');
Route::resource('usuario', 'UsuarioController');
Route::resource('archivo', 'ArchivoController');
Route::post('/subir','ArchivoController@subirArchivo')->name('subir');
Auth::routes();