<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\SoilTypeController;
use App\Http\Controllers\IrrigationMethodController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('farmers')->group(function () {
    Route::get('/', [FarmerController::class, 'index'])->name('farmers.index');
    Route::get('/create', [FarmerController::class, 'create'])->name('farmers.create');
    Route::get('/{farmer}/edit', [FarmerController::class, 'edit'])->name('farmers.edit');
    Route::get('/{farmer}', [FarmerController::class, 'show'])->name('farmers.show');
    Route::post('/', [FarmerController::class, 'store'])->name('farmers.store');
    Route::put('/{farmer}', [FarmerController::class, 'update'])->name('farmers.update');
    Route::delete('/{id}', [FarmerController::class, 'destroy'])->name('farmers.destroy');
});

Route::prefix('crops')->group(function () {
    Route::get('/', [CropController::class, 'index'])->name('crops.index');
    Route::get('/create', [CropController::class, 'create'])->name('crops.create');
    Route::get('/{crop}/edit', [CropController::class, 'edit'])->name('crops.edit');
    Route::get('/{crop}', [CropController::class, 'show'])->name('crops.show');
    Route::post('/', [CropController::class, 'store'])->name('crops.store');
    Route::put('/{crop}', [CropController::class, 'update'])->name('crops.update');
    Route::delete('/{id}', [CropController::class, 'destroy'])->name('crops.destroy');
});

Route::prefix('farms')->group(function () {
    Route::get('/', [FarmController::class, 'index'])->name('farms.index');
    Route::get('/create', [FarmController::class, 'create'])->name('farms.create');
    Route::get('/{farm}/edit', [FarmController::class, 'edit'])->name('farms.edit');
    Route::get('/{farm}', [FarmController::class, 'show'])->name('farms.show');
    Route::post('/', [FarmController::class, 'store'])->name('farms.store');
    Route::put('/{farm}', [FarmController::class, 'update'])->name('farms.update');
    Route::delete('/{id}', [FarmController::class, 'destroy'])->name('farms.destroy');
});

Route::prefix('soil_types')->group(function () {
    Route::get('/', [SoilTypeController::class, 'index'])->name('soil_types.index');
    Route::get('/create', [SoilTypeController::class, 'create'])->name('soil_types.create');
    Route::get('/{soilType}/edit', [SoilTypeController::class, 'edit'])->name('soil_types.edit');
    Route::get('/{soilType}', [SoilTypeController::class, 'show'])->name('soil_types.show');
    Route::post('/', [SoilTypeController::class, 'store'])->name('soil_types.store');
    Route::put('/{soilType}', [SoilTypeController::class, 'update'])->name('soil_types.update');
    Route::delete('/{id}', [SoilTypeController::class, 'destroy'])->name('soil_types.destroy');
});

Route::prefix('irrigation_methods')->group(function () {
    Route::get('/', [IrrigationMethodController::class, 'index'])->name('irrigation_methods.index');
    Route::get('/create', [IrrigationMethodController::class, 'create'])->name('irrigation_methods.create');
    Route::get('/{irrigationMethod}/edit', [IrrigationMethodController::class, 'edit'])->name('irrigation_methods.edit');
    Route::get('/{irrigationMethod}', [IrrigationMethodController::class, 'show'])->name('irrigation_methods.show');
    Route::post('/', [IrrigationMethodController::class, 'store'])->name('irrigation_methods.store');
    Route::put('/{irrigationMethod}', [IrrigationMethodController::class, 'update'])->name('irrigation_methods.update');
    Route::delete('/{id}', [IrrigationMethodController::class, 'destroy'])->name('irrigation_methods.destroy');
});
