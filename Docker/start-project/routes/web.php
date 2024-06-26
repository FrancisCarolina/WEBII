<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('site');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::resource('/eixo', 'App\Http\Controllers\EixoController');
Route::resource('/nivel', 'App\Http\Controllers\NivelController');
Route::resource('/cursos', 'App\Http\Controllers\CursoController');
Route::resource('/permission', 'App\Http\Controllers\PermissionController');
Route::resource('/turma', 'App\Http\Controllers\TurmaController');
Route::resource('/categoria', 'App\Http\Controllers\CategoriaController');
Route::resource('/aluno', 'App\Http\Controllers\AlunoController');
Route::resource('/usuario', 'App\Http\Controllers\UserController');
Route::resource('/comprovante', 'App\Http\Controllers\ComprovanteController');
Route::resource('/declaracao', 'App\Http\Controllers\DeclaracaoController');

Route::get('/site/register', 'App\Http\Controllers\AlunoController@register')->name('site.register');;
Route::post('/site/register', 'App\Http\Controllers\AlunoController@registerStore')->name('site.submit');
