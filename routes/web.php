<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VehicleModelController; // <-- Nome correto
use App\Http\Controllers\ColorController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Nossas rotas de CRUD com os parâmetros nomeados corretamente
    Route::resource('marcas', BrandController::class)->parameters(['marcas' => 'brand']);
    Route::resource('modelos', VehicleModelController::class)->parameters(['modelos' => 'vehicleModel']);
    Route::resource('cores', ColorController::class)->parameters(['cores' => 'color']);
    Route::resource('veiculos', VehicleController::class)->parameters(['veiculos' => 'vehicle']);
});

require __DIR__.'/auth.php';