<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

// Mostrar formulário de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Processar login
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protege as rotas de dashboard com middleware de autenticação e função
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:professor'])->group(function () {
    Route::get('/professor/dashboard', [ProfessorController::class, 'index'])->name('professor.dashboard');
});