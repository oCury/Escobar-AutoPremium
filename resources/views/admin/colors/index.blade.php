<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerenciar Cores
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <a href="{{ route('cores.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        Adicionar Nova Cor
                    </a>

                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">ID</th>
                                <th class="py-2 px-4 border-b text-left">Nome</th>
                                <th class="py-2 px-4 border-b text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $color)
                                 <tr class="border-b">
                                    <td class="py-2 px-4">{{ $color->id }}</td>
                                    <td class="py-2 px-4">{{ $color->name }}</td>
                                    <td class="py-2 px-4">
                                        {{-- ▼▼▼ BOTÃO DE EDITAR ▼▼▼ --}}
                                        <a href="{{ route('cores.edit', $color) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">
                                            Editar
                                        </a>
                                        {{-- ▼▼▼ FORMULÁRIO DE EXCLUIR ▼▼▼ --}}
                                        <form action="{{ route('cores.destroy', $color) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta cor?');">
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
                                    <td colspan="3" class="py-4 px-4 text-center text-gray-500">Nenhuma cor cadastrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>