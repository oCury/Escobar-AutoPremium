<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerenciar Marcas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- ADICIONE ESTE BLOCO PARA MOSTRAR A MENSAGEM --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    {{-- Link para criar nova marca --}}
                    <a href="{{ route('marcas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        Adicionar Nova Marca
                    </a>

                    {{-- Tabela de listagem de marcas --}}
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">ID</th>
                                <th class="py-2 px-4 border-b text-left">Nome</th>
                                <th class="py-2 px-4 border-b text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ $brand->id }}</td>
                                    <td class="py-2 px-4">{{ $brand->name }}</td>
                                    <td class="py-2 px-4">
                                        {{-- ▼▼▼ BOTÃO DE EDITAR ▼▼▼ --}}
                                        <a href="{{ route('marcas.edit', $brand) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">
                                            Editar
                                        </a>
                                        {{-- ▼▼▼ FORMULÁRIO DE EXCLUIR ▼▼▼ --}}
                                        <form action="{{ route('marcas.destroy', $brand) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta marca?');">
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
                                    <td colspan="3" class="py-2 px-4 text-center">Nenhuma marca cadastrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>