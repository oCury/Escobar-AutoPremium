<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerenciar Modelos de Veículos
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

                    <a href="{{ route('modelos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        Adicionar Novo Modelo
                    </a>

                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">ID</th>
                                <th class="py-2 px-4 border-b text-left">Nome do Modelo</th>
                                <th class="py-2 px-4 border-b text-left">Marca</th>
                                <th class="py-2 px-4 border-b text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- CORREÇÃO AQUI: Usar $vehicleModel no loop --}}
                            @forelse ($models as $vehicleModel)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4 border-b">{{ $vehicleModel->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $vehicleModel->name }}</td>
                                    {{-- Acessando a relação 'brand' que definimos no Model --}}
                                    <td class="py-2 px-4 border-b">{{ $vehicleModel->brand->name ?? 'Marca não encontrada' }}</td>
                                    <td class="py-2 px-4 border-b flex items-center space-x-2">
                                        {{-- CORREÇÃO AQUI: Passar $vehicleModel para a rota --}}
                                        <a href="{{ route('modelos.edit', $vehicleModel) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">
                                            Editar
                                        </a>
                                        <form action="{{ route('modelos.destroy', $vehicleModel) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este modelo?');">
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
                                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">Nenhum modelo cadastrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>