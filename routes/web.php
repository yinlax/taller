<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/index', function () {
    return view('index');
})->name('index');

Route::resource('usuarios', UsuarioController::class);
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
