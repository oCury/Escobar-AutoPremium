<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\Color;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        // Carrega os veículos com suas relações para evitar múltiplas queries (N+1 problem)
        $vehicles = Vehicle::with(['model.brand', 'color'])->get();
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        // Busca os dados para preencher os dropdowns do formulário
        $models = VehicleModel::with('brand')->orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        return view('admin.vehicles.create', compact('models', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required|exists:vehicle_models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|digits:4|integer|min:1900',
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'main_photo_url' => 'required|url',
            'photo_url_2' => 'nullable|url',
            'photo_url_3' => 'nullable|url',
            'details' => 'nullable|string',
        ]);

        Vehicle::create($request->all());

        return redirect()->route('veiculos.index')->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function show(Vehicle $vehicle)
    {
        //
    }

    public function edit(Vehicle $vehicle)
    {
        // Busca os dados para os dropdowns e o veículo específico para edição
        $models = VehicleModel::with('brand')->orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        return view('admin.vehicles.edit', compact('vehicle', 'models', 'colors'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'model_id' => 'required|exists:vehicle_models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|digits:4|integer|min:1900',
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'main_photo_url' => 'required|url',
            'photo_url_2' => 'nullable|url',
            'photo_url_3' => 'nullable|url',
            'details' => 'nullable|string',
        ]);

        $vehicle->update($request->all());

        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('veiculos.index')->with('success', 'Veículo excluído com sucesso!');
    }
}