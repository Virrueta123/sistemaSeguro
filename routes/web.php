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

Route::post('/consultadniajax', [App\Http\Controllers\propietarioController::class, 'consultadniajax'])->name('consultadniajax'); 


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


// routes usuarios
Route::get('/usuarios', [App\Http\Controllers\usuarioController::class, 'index'])->name('Usuario.index'); 
Route::get('/usuariosdata', [App\Http\Controllers\usuarioController::class, 'data'])->name('Usuario.data');
Route::get('/usuarios/crear', [App\Http\Controllers\usuarioController::class, 'create'])->name('Usuario.create');  
Route::get('/usuarios/{id}', [App\Http\Controllers\usuarioController::class, 'show'])->name('Usuario.show');
Route::get('/usuarios/{id}/editar', [App\Http\Controllers\usuarioController::class, 'edit'])->name('Usuario.edit');
Route::get('/usuarios/{id}/editarperfil', [App\Http\Controllers\usuarioController::class, 'editperfil'])->name('Usuario.editPerfil');
Route::patch('/usuarios/{id}', [App\Http\Controllers\usuarioController::class, 'update'])->name('Usuario.update');
Route::patch('/usuarios/{id}', [App\Http\Controllers\usuarioController::class, 'updates'])->name('Usuario.updates');
Route::delete('/usuarios/{id}', [App\Http\Controllers\usuarioController::class, 'destroy'])->name('Usuario.delete');   
Route::patch('/usuarios/{id}/suspender', [App\Http\Controllers\usuarioController::class, 'suspender'])->name('Usuario.suspender');
Route::patch('/usuarios/{id}/activar', [App\Http\Controllers\usuarioController::class, 'activar'])->name('Usuario.activar');

Route::post('/usuarios/{id}', [App\Http\Controllers\usuarioController::class, 'store'])->name('Usuario.store');
Route::post('/uniqueuser', [App\Http\Controllers\usuarioController::class, 'uniqueuser'])->name('uniqueuser');

// routes afectados
Route::get('/vencidos', [App\Http\Controllers\HomeController::class, 'vencidos'])->name('Reporte.vencidos'); 
Route::get('/diavencidos/{fecha}', [App\Http\Controllers\HomeController::class, 'diavencidos'])->name('Reporte.diavencidos'); 
Route::get('/siniestro', [App\Http\Controllers\HomeController::class, 'siniestro'])->name('Reporte.siniestros'); 

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

