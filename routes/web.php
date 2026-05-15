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

//Hanya yang sudah LOGIN yang bisa menambah data (Create/Store)
Route::middleware('auth')->group(function () {
    Route::post('/livestocks', [LivestockController::class, 'store'])->name('livestocks.store');
    
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