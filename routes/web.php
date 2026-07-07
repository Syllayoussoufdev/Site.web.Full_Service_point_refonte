<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route pour lister les utilisateurs, accessible uniquement aux administrateurs
Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/utilisateurs', [UserController::class, 'index'])->name('utilisateurs.index');
});

// route pour accéder au tableau de bord, accessible aux administrateurs et aux éditeurs
Route::middleware(['auth', 'role:admin,editeur'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
