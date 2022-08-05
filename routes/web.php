<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/listagem', function(){
    return view('listagem');
});

Route::get('/alunoDisciplina', function(){
    return view('alunoDisciplina');
});

Route::get('/suasDisciplina', function(){
    return view('suasDisciplina');
});

Route::get('/seusAlunos', function(){
    return view('seusAlunos');
});

Route::get('/mostradisciplina', function(){
    return view('mostradisciplina');
});

Route::post('cadastrardiciplinaback', 'App\Http\Controllers\MainController@cadastrardiciplinaback');

Route::post('registra',  'App\Http\Controllers\MainController@registra');

Route::post('alunoDisciplinaCadastra', 'App\Http\Controllers\MainController@alunoDisciplinaCadastra');

Route::post('cadastrarProfessor', 'App\Http\Controllers\MainController@cadastrarProfessor');


