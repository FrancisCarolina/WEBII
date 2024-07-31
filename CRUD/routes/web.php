<?php

use App\Http\Controllers\EixoController;
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
    return view('welcome');
});

// Route::get('/aula', function(){
//     return "<h1>Aula de Revisão</h1>";
// });

//Route::get('/eixo', [EixoController::class, 'index']);
Route::resource('/eixo', EixoController::class);
//Route::get('/report/{eixo_id}', 'App\Http\Controllers\EixoController@report')->name('eixo.report');