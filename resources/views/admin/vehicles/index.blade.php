<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerenciar Veículos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <a href="{{ route('veiculos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        Cadastrar Novo Veículo
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">ID</th>
                                    <th class="py-2 px-4 border-b text-left">Modelo</th>
                                    <th class="py-2 px-4 border-b text-left">Cor</th>
                                    <th class="py-2 px-4 border-b text-left">Ano</th>
                                    <th class="py-2 px-4 border-b text-left">Preço</th>
                                    <th class="py-2 px-4 border-b text-left">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vehicles as $vehicle)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $vehicle->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $vehicle->model->brand->name }} {{ $vehicle->model->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $vehicle->color->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $vehicle->year }}</td>
                                        <td class="py-2 px-4 border-b">R$ {{ number_format($vehicle->price, 2, ',', '.') }}</td>
                                        <td class="py-2 px-4 border-b flex items-center space-x-2">
                                            <a href="{{ route('veiculos.edit', $vehicle) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">
                                                Editar
                                            </a>
                                            <form action="{{ route('veiculos.destroy', $vehicle) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este veículo?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">
                                                    Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center text-gray-500">Nenhum veículo cadastrado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>