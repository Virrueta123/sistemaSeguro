<?php

use Illuminate\Support\Facades\Auth;
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

// routes propietarios
Route::get('/propietarios', [App\Http\Controllers\propietarioController::class, 'index'])->name('Propietario.index'); 
Route::get('/propietariosdata', [App\Http\Controllers\propietarioController::class, 'data'])->name('Propietario.data'); 
Route::get('/propietarios/crear', [App\Http\Controllers\propietarioController::class, 'create'])->name('Propietario.create'); 
Route::get('/propietarios/{id}/editar', [App\Http\Controllers\propietarioController::class, 'edit'])->name('Propietario.edit');
Route::patch('/propietarios/{id}', [App\Http\Controllers\propietarioController::class, 'update'])->name('Propietario.update');
Route::delete('/propietarios/{id}', [App\Http\Controllers\propietarioController::class, 'destroy'])->name('Propietario.delete');   
Route::post('/propietarios', [App\Http\Controllers\propietarioController::class, 'store'])->name('Propietario.store'); 

// routes accidente
Route::get('/accidente', [App\Http\Controllers\accidenteController::class, 'index'])->name('Accidente.index'); 
Route::get('/accidentedata', [App\Http\Controllers\accidenteController::class, 'data'])->name('Accidente.data'); 
Route::get('/accidente/{id}', [App\Http\Controllers\accidenteController::class, 'show'])->name('Accidente.show');
Route::get('/accidente/crear', [App\Http\Controllers\accidenteController::class, 'create'])->name('Accidente.create'); 
Route::get('/accidente/{id}/editar', [App\Http\Controllers\accidenteController::class, 'edit'])->name('Accidente.edit');
Route::patch('/accidente/{id}', [App\Http\Controllers\accidenteController::class, 'update'])->name('Accidente.update');
Route::delete('/accidente/{id}', [App\Http\Controllers\accidenteController::class, 'destroy'])->name('Accidente.delete');   
Route::post('/accidente/{id}', [App\Http\Controllers\accidenteController::class, 'store'])->name('Accidente.store');

// routes afectados
Route::get('/afectados', [App\Http\Controllers\AfectadosController::class, 'index'])->name('Afectado.index'); 
Route::get('/afectadosdata', [App\Http\Controllers\AfectadosController::class, 'data'])->name('Afectado.data'); 
Route::get('/afectados/{id}', [App\Http\Controllers\AfectadosController::class, 'show'])->name('Afectado.show');
Route::get('/afectados/{id}/crear', [App\Http\Controllers\AfectadosController::class, 'create'])->name('Afectado.create'); 
Route::get('/afectados/{id}/editar', [App\Http\Controllers\AfectadosController::class, 'edit'])->name('Afectado.edit');
Route::patch('/afectados/{id}', [App\Http\Controllers\AfectadosController::class, 'update'])->name('Afectado.update');
Route::delete('/afectados/{id}', [App\Http\Controllers\AfectadosController::class, 'destroy'])->name('Afectado.delete');   
Route::post('/afectados/{id}', [App\Http\Controllers\AfectadosController::class, 'store'])->name('Afectado.store');

Route::post('/consultadniajax', [App\Http\Controllers\propietarioController::class, 'consultadniajax'])->name('consultadniajax');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

