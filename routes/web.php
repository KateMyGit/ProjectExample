<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [App\Http\Controllers\AuthController::class, 'getLogin'])->name('login');
Route::post('/', [App\Http\Controllers\AuthController::class, 'postLogin'])->name('login');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'getRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'postRegister'])->name('register');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'getLogout'])->name('logout');
Route::get('/main', [App\Http\Controllers\MainController::class, 'getIndex'])->name('main');
Route::get('/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');
Route::post('/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('edit');