<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


use App\Http\Controllers\ApplicationController;



Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout']);





Route::middleware('auth')->group(function () {

    Route::get('/applications', [ApplicationController::class, 'index']);

    Route::get('/applications/create', [ApplicationController::class, 'create']);

    Route::post('/applications/create', [ApplicationController::class, 'store']);
});


Route::get('/admin', [AuthController::class, 'admin'])
    ->middleware('auth');