<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca todas as marcas no banco de dados
        $brands = Brand::all();
        
        // Retorna a view de listagem e passa a variável com as marcas
        return view('admin.brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Apenas retorna a view que contém o formulário de criação
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // 1. Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
        ]);

        // 2. Criação do registro no banco de dados
        Brand::create([
            'name' => $request->name,
        ]);

        // 3. Redirecionamento com mensagem de sucesso
        return redirect()->route('marcas.index')->with('success', 'Marca criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        // O Laravel já encontra a marca pelo ID na URL (Route Model Binding)
        // Apenas retornamos a view de edição, passando a marca encontrada
        return view('admin.brands.edit', ['brand' => $brand]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        // 1. Validação (com uma pequena mudança)
        $request->validate([
            // Ignora a regra 'unique' para o ID da própria marca que estamos editando
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
        ]);

        // 2. Atualiza o registro no banco
        $brand->update([
            'name' => $request->name,
        ]);

        // 3. Redireciona com mensagem de sucesso
        return redirect()->route('marcas.index')->with('success', 'Marca atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        // 1. Deleta o registro do banco
        $brand->delete();

        // 2. Redireciona com mensagem de sucesso
        return redirect()->route('marcas.index')->with('success', 'Marca excluída com sucesso!');
    }
}