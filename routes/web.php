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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/mensagens', 'MensagensController@index')->name('mensagens');
/**
 * Grupo de rotas para os grupos
 */
Route::prefix('/grupo')->group(function () {
    Route::get('/listar', 'GruposController@index')->name('grupo-listar');
    Route::get('/cadastro', 'GruposController@cadastro')->name('grupo-cadastro');
    Route::post('/cadastrar', 'GruposController@registrar')->name('grupo-cadastrar');
    Route::get('/exibir/{id}', 'GruposController@exibir')->name('grupo-exibir');
    Route::post('/convidar', 'EmailController@convidar')->name('grupo-convidar');
    Route::get('/listar-participantes/{id}', 'GruposController@participantes')->name('grupo-participantes');

    Route::get('/listar-sessoes/{id}', 'GruposController@listaSessoes')->name('grupo-sessoes');

    Route::post('/inserir-usuario', 'GruposController@inserirParticipante')->name('usuario-inserir');
});

/**
 * Grupo de rotas para as sessões
 */
Route::prefix('/sessao')->group(function () {
    Route::get('/listar/{id}', 'SessoesController@listaSessoes')->name('sessao-sessoes');
    Route::post('/cadastrar', 'SessoesController@registrar')->name('sessao.cadastrar');
});

/**
 * Grupo de rotas para os usuários
 */
Route::prefix('/usuario')->group(function () {
    Route::get('/dados', 'UsuariosController@index')->name('usuarios-dados');
    Route::post('/editar', 'UsuariosController@editar')->name('usuarios-editar');
    Route::get('/exibir-lista', 'UsuariosController@lista')->name('usuarios-lista');
    Route::get('/item/{id}', 'UsuariosController@itemListar')->name('item-listar');
    Route::post('/item-cadastrar', 'UsuariosController@itemCadastrar')->name('item-cadastrar');

    Route::get('/logout', 'UsuariosController@logout')->name('usuario-logout');
});
