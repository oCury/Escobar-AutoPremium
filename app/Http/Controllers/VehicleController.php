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
        $vehicles = Vehicle::with('vehicleModel.brand', 'color')->latest()->paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $models = VehicleModel::with('brand')->get()->sortBy('brand.name');
        $colors = Color::orderBy('name')->get();
        $currentYear = date('Y');
        $years = range($currentYear + 1, 1950);
        return view('vehicles.create', compact('models', 'colors', 'years'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required|exists:vehicle_models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'mileage' => 'required|numeric',
            'main_photo_url' => 'required|url',
        ]);
        Vehicle::create($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Veículo criado com sucesso!');
    }

    public function edit(Vehicle $vehicle)
    {
        // Carregamos as relações para a view de edição.
        $vehicle->load('vehicleModel.brand', 'color');

        $models = VehicleModel::with('brand')->get()->sortBy('brand.name');
        $colors = Color::orderBy('name')->get();
        $currentYear = date('Y');
        $years = range($currentYear + 1, 1950);
        return view('vehicles.edit', compact('vehicle', 'models', 'colors', 'years'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'model_id' => 'required|exists:vehicle_models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'mileage' => 'required|numeric',
            'main_photo_url' => 'required|url',
        ]);
        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Veículo excluído com sucesso!');
    }
}