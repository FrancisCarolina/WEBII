<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ProfileController;
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
Route::resource('/eixo', EixoController::class)->middleware(['auth']);
Route::resource('/nivel', NivelController::class)->middleware(['auth']);
Route::resource('/curso', CursoController::class)->middleware(['auth']);

Route::get('/report/eixo/', [EixoController::class, 'report'])->name('report');
Route::get('/graph/eixo/', [EixoController::class, 'graph'])->name('graph');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    return view('home');
    })->name('home')->middleware(['auth']);

require __DIR__.'/auth.php';
