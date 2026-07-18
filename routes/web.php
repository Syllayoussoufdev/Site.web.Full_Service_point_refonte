<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route pour lister les utilisateurs, accessible uniquement aux administrateurs
Route::middleware(['auth', 'role:admin'])->prefix('dashboard')->group(function (){
    Route::get('/utilisateurs', [UserController::class, 'index'])->name('utilisateurs');
    Route::resource('services', ServiceController::class);
});

// route pour accéder au tableau de bord, accessible aux administrateurs et aux éditeurs
Route::middleware(['auth', 'role:admin,editeur'])->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('articles', ArticleController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
