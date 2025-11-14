<?php

namespace App\Http\Controllers;

use App\Models\VehicleModel;
use App\Models\Brand;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{
    public function index()
    {
        $vehicle_models = VehicleModel::with('brand')->latest()->paginate(10);
        return view('admin.vehicle_models.index', compact('vehicle_models'));
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.vehicle_models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
        ]);
        VehicleModel::create($request->all());
        return redirect()->route('vehicle_models.index')->with('success', 'Modelo criado com sucesso!');
    }

    public function edit(VehicleModel $vehicle_model)
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.vehicle_models.edit', compact('vehicle_model', 'brands'));
    }

    public function update(Request $request, VehicleModel $vehicle_model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
        ]);
        $vehicle_model->update($request->all());
        return redirect()->route('vehicle_models.index')->with('success', 'Modelo atualizado com sucesso!');
    }

    public function destroy(VehicleModel $vehicle_model)
    {
        $vehicle_model->delete();
        return redirect()->route('vehicle_models.index')->with('success', 'Modelo excluído com sucesso!');
    }
}