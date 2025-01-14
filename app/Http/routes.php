<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContasPagarController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/contas', "ContasPagarController@listar")->name('contas');

Route::get('/contas/cadastro', "ContasPagarController@cadastro", function(){

})->middleware("auth.basic");

Route::post('/contas/salvar', "ContasPagarController@salvar", function(){

})->middleware("auth");

Route::get('/contas/editar/{id}', "ContasPagarController@editar");
Route::post('/contas/update/{id}', "ContasPagarController@update");
Route::get('/contas/apagar/{id}', "ContasPagarController@apagar");
Route::auth();

Route::get('/home', 'HomeController@index');
