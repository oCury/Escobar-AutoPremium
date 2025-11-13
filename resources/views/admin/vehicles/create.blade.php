<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastrar Novo Veículo</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('veiculos.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Coluna da Esquerda -->
                            <div>
                                <div class="mb-4">
                                    <label for="model_id" class="block text-sm font-bold mb-2">Modelo:</label>
                                    <select name="model_id" id="model_id" class="shadow rounded w-full py-2 px-3" required>
                                        <option value="">Selecione um modelo</option>
                                        @foreach ($models as $model)
                                            <option value="{{ $model->id }}">{{ $model->brand->name }} {{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="color_id" class="block text-sm font-bold mb-2">Cor:</label>
                                    <select name="color_id" id="color_id" class="shadow rounded w-full py-2 px-3" required>
                                        <option value="">Selecione uma cor</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="year" class="block text-sm font-bold mb-2">Ano:</label>
                                    <input type="number" name="year" id="year" placeholder="Ex: 2023" class="shadow rounded w-full py-2 px-3" required>
                                </div>
                                <div class="mb-4">
                                    <label for="mileage" class="block text-sm font-bold mb-2">Quilometragem:</label>
                                    <input type="number" name="mileage" id="mileage" placeholder="Ex: 25000" class="shadow rounded w-full py-2 px-3" required>
                                </div>
                                <div class="mb-4">
                                    <label for="price" class="block text-sm font-bold mb-2">Preço (R$):</label>
                                    <input type="number" step="0.01" name="price" id="price" placeholder="Ex: 75990.50" class="shadow rounded w-full py-2 px-3" required>
                                </div>
                            </div>
                            <!-- Coluna da Direita -->
                            <div>
                                <div class="mb-4">
                                    <label for="main_photo_url" class="block text-sm font-bold mb-2">URL da Foto Principal:</label>
                                    <input type="url" name="main_photo_url" id="main_photo_url" class="shadow rounded w-full py-2 px-3" required>
                                </div>
                                <div class="mb-4">
                                    <label for="photo_url_2" class="block text-sm font-bold mb-2">URL da Foto 2 (Opcional):</label>
                                    <input type="url" name="photo_url_2" id="photo_url_2" class="shadow rounded w-full py-2 px-3">
                                </div>
                                <div class="mb-4">
                                    <label for="photo_url_3" class="block text-sm font-bold mb-2">URL da Foto 3 (Opcional):</label>
                                    <input type="url" name="photo_url_3" id="photo_url_3" class="shadow rounded w-full py-2 px-3">
                                </div>
                                <div class="mb-4">
                                    <label for="details" class="block text-sm font-bold mb-2">Detalhes:</label>
                                    <textarea name="details" id="details" rows="4" class="shadow rounded w-full py-2 px-3"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Botões -->
                        <div class="mt-6 flex items-center justify-between">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Salvar Veículo</button>
                            <a href="{{ route('veiculos.index') }}" class="text-blue-500 hover:text-blue-800">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>