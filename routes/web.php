<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});

//admin dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');

//eleve dashboard
Route::get('/eleve/dashboard', function () {
    return view('eleve.dashboard');
})->middleware(['auth', 'verified', 'role:eleve'])->name('eleve.dashboard');

//instructeur dashboard
Route::get('/instructeur/dashboard', function () {
    return view('instructeur.dashboard');
})->middleware(['auth', 'verified', 'role:instructeur'])->name('instructeur.dashboard');

//student

//instructeur

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
