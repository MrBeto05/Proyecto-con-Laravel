<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\auth\SignupController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Auth Routes (Public)
|
*/
Route::get('/', function () {
    return view('inicio');
});

/**
 * Contacto - Disabled for now
 */
Route::post('/contacto', [Controller::class, 'enviar'])->name('contacto.enviar');

/**
 * Signup Routes
 */
Route::get('/signup', [SignupController::class, 'create'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->middleware('throttle:5,1')->name('signup.store');

/**
 * Login Routes
 */
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

/**
 * Dashboard (Protected)
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

/**
 * Posts CRUD - Protected Resource
 */
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->names([
        'index' => 'posts.index',
        'create' => 'posts.create',
        'store' => 'posts.store',
        'show' => 'posts.show',
        'edit' => 'posts.edit',
        'update' => 'posts.update',
        'destroy' => 'posts.destroy',
    ]);
});