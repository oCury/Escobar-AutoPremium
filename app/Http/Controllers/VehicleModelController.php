<?php

namespace App\Http\Controllers;

use App\Models\VehicleModel;
use App\Models\Brand; // Importar o model de Marca
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{
    public function index()
    {
        $models = VehicleModel::with('brand')->get();
        return view('admin.vehicle_models.index', ['models' => $models]);
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get(); // Pega todas as marcas para o dropdown
        return view('admin.vehicle_models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id', // Valida se a marca existe
        ]);
        VehicleModel::create($request->all());
        return redirect()->route('modelos.index')->with('success', 'Modelo criado com sucesso!');
    }

    public function show(VehicleModel $vehicleModel)
    {
        //
    }

    public function edit(VehicleModel $vehicleModel)
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.vehicle_models.edit', compact('vehicleModel', 'brands'));
    }

    public function update(Request $request, VehicleModel $vehicleModel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
        ]);
        $vehicleModel->update($request->all());
        return redirect()->route('modelos.index')->with('success', 'Modelo atualizado com sucesso!');
    }

    public function destroy(VehicleModel $vehicleModel)
    {
        $vehicleModel->delete();
        return redirect()->route('modelos.index')->with('success', 'Modelo excluído com sucesso!');
    }
}