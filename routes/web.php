<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\InstructeurController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ------------ Group admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/filieres', FiliereController::class);
    Route::resource('/matieres', MatiereController::class);
    Route::resource('/instructeurs', InstructeurController::class);
    // Route::resource('/students', EleveController::class);
});

// --------Home page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ------- users Dashboards
Route::middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

// -----------Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
