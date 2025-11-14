<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle; // <-- ADICIONE ESTA LINHA

class FrontController extends Controller
{
    /**
     * Exibe a página inicial pública do site.
     */
    public function home()
    {
       $vehicles = Vehicle::with('vehicleModel.brand')->latest()->get();
       return view('front.home', ['vehicles' => $vehicles]);
    }

    public function show(Vehicle $vehicle)
    {
        // O Route Model Binding já nos entrega o veículo correto.
        // Vamos carregar as relações para garantir que temos a marca e o modelo.
        $vehicle->load('vehicleModel.brand', 'color');

        return view('front.show', compact('vehicle'));
    }
}