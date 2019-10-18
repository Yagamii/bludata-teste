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

Route::get('/', function(){
    return redirect('/fornecedores');
});

Route::prefix('fornecedores')->group(function(){
    Route::get('/', 'FornecedorControlador@index');

    Route::post('/busca', 'BuscaFornecedorControlador@filtrar');

    Route::get('/novo', 'FornecedorControlador@create');

    Route::post('/novo', 'FornecedorControlador@store');

    Route::get('/editar/{id}', 'FornecedorControlador@edit');
    
    Route::post('/{id}', 'FornecedorControlador@update');

    Route::get('/apagar/{id}', 'FornecedorControlador@destroy');
});

Route::prefix('empresas')->group(function(){
    Route::get('/', 'EmpresaControlador@index');

    Route::get('/novo', 'EmpresaControlador@create');

    Route::post('/novo', 'EmpresaControlador@store');

    Route::get('/editar/{id}', 'EmpresaControlador@edit');

    Route::post('/{id}', 'EmpresaControlador@update');

    Route::get('/apagar/{id}', 'EmpresaControlador@destroy');
});
