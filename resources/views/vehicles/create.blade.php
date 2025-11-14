<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Adicionar Novo Veículo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Bloco para exibir erros de validação --}}
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-200 rounded-md">
                            <p class="font-bold">Por favor, corrija os erros abaixo:</p>
                            <ul class="list-disc list-inside mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('vehicles.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Modelo (Obrigatório) -->
                            <div>
                                <label for="model_id" class="block font-medium text-sm text-gray-700">Modelo</label>
                                <select name="model_id" id="model_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Selecione um modelo</option>
                                    @foreach ($models as $model)
                                        <option value="{{ $model->id }}" {{ old('model_id') == $model->id ? 'selected' : '' }}>
                                            {{ $model->brand->name }} - {{ $model->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Cor (Obrigatório) -->
                            <div>
                                <label for="color_id" class="block font-medium text-sm text-gray-700">Cor</label>
                                <select name="color_id" id="color_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Selecione uma cor</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" {{ old('color_id') == $color->id ? 'selected' : '' }}>
                                            {{ $color->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Ano (NOVO - agora é um select) -->
                            <div>
                                <label for="year" class="block font-medium text-sm text-gray-700">Ano</label>
                                <select name="year" id="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Selecione o ano</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quilometragem -->
                            <div>
                                <label for="mileage" class="block font-medium text-sm text-gray-700">Quilometragem</label>
                                <input type="number" name="mileage" id="mileage" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('mileage') }}" required>
                            </div>
                            <!-- Preço -->
                            <div>
                                <label for="price" class="block font-medium text-sm text-gray-700">Preço</label>
                                <input type="text" name="price" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('price') }}" required>
                            </div>
                            <!-- URL da Foto Principal -->
                            <div>
                                <label for="main_photo_url" class="block font-medium text-sm text-gray-700">URL da Foto Principal</label>
                                <input type="url" name="main_photo_url" id="main_photo_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('main_photo_url') }}" required>
                            </div>
                            <!-- Detalhes -->
                            <div class="md:col-span-2">
                                <label for="details" class="block font-medium text-sm text-gray-700">Detalhes</label>
                                <textarea name="details" id="details" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('details') }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('vehicles.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Salvar Veículo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>