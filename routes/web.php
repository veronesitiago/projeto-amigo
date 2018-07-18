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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/grupo')->group(function () {
    Route::get('/listar', 'GruposController@index')->name('grupo-listar');
    Route::get('/cadastro', 'GruposController@cadastro')->name('grupo-cadastro');
    Route::post('/cadastrar', 'GruposController@registrar')->name('grupo-cadastrar');
    Route::get('/exibir/{id}', 'GruposController@exibir')->name('grupo-exibir');
    Route::get('/convidar/{id}', 'GruposController@convidar')->name('grupo-convidar');
});
