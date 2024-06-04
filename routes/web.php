<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

Route::resource('permissions', PermissionController::class);

Route::get('/', function () {
    return view('signup');
});

Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Add a user
Route::post('/users', [UserController::class, 'add']);

// Edit a user
Route::get('/users/{id}/edit',  [UserController::class, 'edit']);
Route::patch('/users/{id}',  [UserController::class, 'update']);

// Delete a user
Route::get('/users/{id}/delete', [UserController::class, 'destroy']);