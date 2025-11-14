<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Veículo: {{ $vehicle->vehicleModel->brand->name }} {{ $vehicle->vehicleModel->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Importante: Usar o método PUT para atualização --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Modelo -->
                            <div>
                                <label for="model_id" class="block font-medium text-sm text-gray-700">Modelo</label>
                                <select name="model_id" id="model_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    @foreach ($models as $model)
                                        <option value="{{ $model->id }}" {{ $vehicle->model_id == $model->id ? 'selected' : '' }}>
                                            {{ $model->brand->name }} - {{ $model->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Cor -->
                            <div>
                                <label for="color_id" class="block font-medium text-sm text-gray-700">Cor</label>
                                <select name="color_id" id="color_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" {{ $vehicle->color_id == $color->id ? 'selected' : '' }}>
                                            {{ $color->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Ano -->
                            <div>
                                <label for="year" class="block font-medium text-sm text-gray-700">Ano</label>
                                <select name="year" id="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}" {{ $vehicle->year == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Preço -->
                            <div>
                                <label for="price" class="block font-medium text-sm text-gray-700">Preço</label>
                                <input type="number" name="price" id="price" value="{{ $vehicle->price }}" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>

                            <!-- Quilometragem -->
                            <div>
                                <label for="mileage" class="block font-medium text-sm text-gray-700">Quilometragem</glabel>
                                <input type="number" name="mileage" id="mileage" value="{{ $vehicle->mileage }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>

                            <!-- URL da Foto -->
                            <div class="md:col-span-2">
                                <label for="main_photo_url" class="block font-medium text-sm text-gray-700">URL da Foto Principal</label>
                                <input type="url" name="main_photo_url" id="main_photo_url" value="{{ $vehicle->main_photo_url }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('vehicles.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Atualizar Veículo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>