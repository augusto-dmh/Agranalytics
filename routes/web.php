<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/farmers', [FarmerController::class, 'index'])->name('farmers.index');
Route::get('/farmers/{farmer}', [FarmerController::class, 'show'])->name('farmers.show');
Route::post('/farmers', [FarmerController::class, 'store'])->name('farmers.store');
Route::put('/farmers/{farmer}', [FarmerController::class, 'update'])->name('farmers.update');
Route::delete('/farmers/{id}', [FarmerController::class, 'destroy'])->name('farmers.destroy');
Route::get('/farmers/create', [FarmerController::class, 'create'])->name('farmers.create');
Route::get('/farmers/{farmer}/edit', [FarmerController::class, 'edit'])->name('farmers.edit');
