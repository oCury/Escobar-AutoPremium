<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::latest()->paginate(10);
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:colors']);
        Color::create($request->all());
        return redirect()->route('colors.index')->with('success', 'Cor criada com sucesso!');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $request->validate(['name' => 'required|string|max:255|unique:colors,name,' . $color->id]);
        $color->update($request->all());
        return redirect()->route('colors.index')->with('success', 'Cor atualizada com sucesso!');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index')->with('success', 'Cor excluída com sucesso!');
    }
}