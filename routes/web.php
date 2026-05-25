<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivestockController;
use App\Models\Livestock;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//BAGIAN CRUD LIVESTOCK 

//Siapa saja bisa melihat daftar ternak (Read)
Route::get('/livestocks', [LivestockController::class, 'index'])->name('livestocks.index');

// Hanya yang sudah LOGIN yang bisa Create, Update, Delete
Route::middleware('auth')->group(function () {
    Route::post('/livestocks', [LivestockController::class, 'store'])->name('livestocks.store');
    Route::get('/livestocks/{livestock}/edit', [LivestockController::class, 'edit'])->name('livestocks.edit');
    Route::put('/livestocks/{livestock}', [LivestockController::class, 'update'])->name('livestocks.update');
    Route::delete('/livestocks/{livestock}', [LivestockController::class, 'destroy'])->name('livestocks.destroy');

    // Rute bawaan Breeze untuk Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    $livestocks = Livestock::latest()->get();

    return view('dashboard', compact('livestocks'));
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';