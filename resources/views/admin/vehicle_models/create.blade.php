<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Adicionar Novo Modelo</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('modelos.store') }}" method="POST">
                        @csrf
                        {{-- Campo Nome --}}
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-bold mb-2">Nome do Modelo:</label>
                            <input type="text" name="name" id="name" class="shadow rounded w-full py-2 px-3" required>
                        </div>
                        {{-- Campo Marca (Dropdown) --}}
                        <div class="mb-4">
                            <label for="brand_id" class="block text-sm font-bold mb-2">Marca:</label>
                            <select name="brand_id" id="brand_id" class="shadow rounded w-full py-2 px-3" required>
                                <option value="">Selecione uma marca</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Botões --}}
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
                            <a href="{{ route('modelos.index') }}" class="text-blue-500 hover:text-blue-800">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>