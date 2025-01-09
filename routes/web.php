<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReporteController;


Route::get('/', [AuthController::class, 'redirectToLogin']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::resource('usuarios', UsuarioController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('insumos', InsumoController::class);
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
