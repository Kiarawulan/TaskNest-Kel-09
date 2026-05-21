<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

Route::get('/', fn() => redirect('/login'));
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');

    Route::get('/tasks/create',          [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks',                [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit',     [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}',          [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}',       [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

    Route::get('/categories',               [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories',              [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
