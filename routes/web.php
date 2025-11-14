<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleModelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rota da Home Pública
Route::get('/', [FrontController::class, 'home'])->name('home');

// Grupo de rotas que exigem APENAS autenticação.
// QUALQUER usuário logado poderá acessar.
Route::middleware(['auth'])->group(function () {
    
    // Rota do Dashboard principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rota para a página de detalhes do veículo
    Route::get('/veiculo/{vehicle}', [FrontController::class, 'show'])->name('vehicles.show');

    // Rotas do Perfil do Usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ROTAS DE RECURSO PARA O DASHBOARD (CRUDs)
    Route::resource('marcas', BrandController::class)->names('brands');
    Route::resource('modelos', VehicleModelController::class)->names('vehicle_models');
    Route::resource('cores', ColorController::class)->names('colors');
    Route::resource('veiculos', VehicleController::class)->names('vehicles');
});

// Arquivo de rotas de autenticação (login, register, etc.)
require __DIR__.'/auth.php';