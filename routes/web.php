<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CineController;
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

Route::get('/', [CineController::class, 'index'])->name('Cine.index');

Route::post('/store', [CineController::class, 'store'])->name('Cine.store');

Route::get('/agregar', [CineController::class, 'agregar'])->name('Cine.agregar');

Route::post('/funcion', [CineController::class, 'funcion'])->name('Cine.funcion');

Route::post('/stori', [CineController::class, 'stori'])->name('Cine.stori');