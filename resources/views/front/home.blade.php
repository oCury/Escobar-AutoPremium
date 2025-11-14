{{-- Diz ao Blade para usar nosso novo layout --}}
@extends('layouts.guest')

{{-- Define a seção de conteúdo que será injetada no @yield('content') --}}
@section('content')

    <!-- Header -->
    <header class="header">
        {{-- ALTERADO: de container para container-fluid para ocupar toda a largura --}}
        <div class="container-fluid py-3 px-4">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="d-flex align-items-center gap-3 text-decoration-none">
                    <div class="logo-box"></div>
                    <h1 class="brand-name">AutoPremium</h1>
                </a>
                            
                <div class="d-flex align-items-center gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-red"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="btn btn-gradient" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-red">Entrar</a>
                        <a href="{{ route('register') }}" class="btn btn-gradient">Cadastrar</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="container position-relative" style="z-index: 1;">
            <div class="text-center mb-5 pt-5 animate-fade-in-up">
                <span class="badge badge-gradient mb-3 px-4 py-2">
                    <i class="bi bi-stars me-2"></i>Mais de 10.000 veículos disponíveis
                </span>
                <h2 class="display-4 fw-bold text-gray-900 mb-3">Encontre o Carro dos Seus Sonhos</h2>
                <p class="lead text-gray-600 mb-0">Milhares de veículos seminovos e novos com as melhores condições</p>
            </div>
        </div>
        <div class="position-absolute top-0 end-0 opacity-25" style="width: 50%; height: 100%; background: radial-gradient(circle at top right, rgba(239, 68, 68, 0.1), transparent 60%);"></div>
    </section>

    <!-- Filters and Results -->
    <section class="py-5">
        <div class="container-fluid px-4">
            {{-- REMOVIDO: O <div class="row"> e <div class="col-lg-9 col-xl-10"> que limitavam a largura --}}
            
            <div class="card card-custom mb-4 p-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success">{{ $vehicles->count() }} veículo(s)</span>
                        <span class="text-gray-600">encontrados</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <select class="form-select form-select-custom form-select-sm" style="width: 200px;">
                            <option>Ordenar por: Relevância</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @forelse ($vehicles as $vehicle)
                    <!-- Car Card Dinâmico -->
                    {{-- ALTERADO: para 4 colunas em telas extra grandes --}}
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <a href="{{ route('vehicles.show', $vehicle) }}" class="text-decoration-none">
                            <div class="car-card hover-lift">
                                <div class="car-card-image">
                                    <img src="{{ $vehicle->main_photo_url }}" alt="{{ $vehicle->vehicleModel->name }}">
                                    <span class="car-card-badge">{{ $vehicle->year }}</span>
                                    <button class="car-card-favorite" onclick="event.preventDefault(); toggleFavorite(this);"><i class="bi bi-heart"></i></button>
                                </div>
                                <div class="p-4">
                                    <h3 class="h6 fw-bold text-gray-900 mb-2">
                                        {{ $vehicle->vehicleModel->brand->name }} {{ $vehicle->vehicleModel->name }}
                                    </h3>
                                    <div class="price-tag mb-3">
                                        <span class="price-small">R$ {{ number_format($vehicle->price, 2, ',', '.') }}</span>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <span class="btn btn-gradient"><i class="bi bi-eye me-2"></i>Ver Detalhes</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <!-- Mensagem se não houver veículos -->
                    <div class="col-12">
                        <div class="card card-custom p-5 text-center">
                            <p class="h5 text-gray-600 mb-0">Nenhum veículo encontrado no momento.</p>
                            <p class="text-gray-500 mt-2">Cadastre um novo veículo no seu dashboard para vê-lo aqui.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        {{-- Conteúdo do footer aqui --}}
    </footer>

@endsection

{{-- Define a seção de scripts que será injetada no @yield('scripts') --}}
@section('scripts')
<script>
    // Função para o botão de favoritar
    function toggleFavorite(button) {
        button.classList.toggle('active');
        const icon = button.querySelector('i');
        if (button.classList.contains('active')) {
            icon.classList.remove('bi-heart');
            icon.classList.add('bi-heart-fill');
        } else {
            icon.classList.remove('bi-heart-fill');
            icon.classList.add('bi-heart');
        }
    }
</script>
@endsection