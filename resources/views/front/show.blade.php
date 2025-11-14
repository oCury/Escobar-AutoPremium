@extends('layouts.guest')

@section('content')
    <div class="bg-white">
        <div class="container-fluid py-5 px-4">
            <!-- Breadcrumb e Título -->
            <div class="mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalhes do Veículo</li>
                    </ol>
                </nav>
                <h2 class="h1 fw-bold text-gray-900">{{ $vehicle->vehicleModel->brand->name }} {{ $vehicle->vehicleModel->name }}</h2>
                <p class="text-muted">{{ $vehicle->year }} | {{ number_format($vehicle->mileage, 0, '', '.') }} km</p>
            </div>

            <div class="row g-5">
                <!-- Coluna da Galeria de Imagens (AGORA COM CARROSSEL) -->
                <div class="col-lg-7">
                    
                    {{-- INÍCIO DO CARROSSEL BOOTSTRAP --}}
                    <div id="vehicleCarousel" class="carousel slide shadow-lg rounded-3" data-bs-ride="carousel">
                        
                        {{-- Indicadores (as bolinhas embaixo) --}}
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#vehicleCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            @if($vehicle->photo_url_2)
                                <button type="button" data-bs-target="#vehicleCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            @endif
                            @if($vehicle->photo_url_3)
                                <button type="button" data-bs-target="#vehicleCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            @endif
                        </div>

                        {{-- Slides (as imagens) --}}
                        <div class="carousel-inner rounded-3">
                            <div class="carousel-item active">
                                <img src="{{ $vehicle->main_photo_url }}" class="d-block w-100" style="aspect-ratio: 16/10; object-fit: cover;" alt="Foto principal do {{ $vehicle->vehicleModel->name }}">
                            </div>
                            @if($vehicle->photo_url_2)
                                <div class="carousel-item">
                                    <img src="{{ $vehicle->photo_url_2 }}" class="d-block w-100" style="aspect-ratio: 16/10; object-fit: cover;" alt="Foto 2 do {{ $vehicle->vehicleModel->name }}">
                                </div>
                            @endif
                            @if($vehicle->photo_url_3)
                                <div class="carousel-item">
                                    <img src="{{ $vehicle->photo_url_3 }}" class="d-block w-100" style="aspect-ratio: 16/10; object-fit: cover;" alt="Foto 3 do {{ $vehicle->vehicleModel->name }}">
                                </div>
                            @endif
                        </div>

                        {{-- Controles (setas de próximo/anterior) --}}
                        <button class="carousel-control-prev" type="button" data-bs-target="#vehicleCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#vehicleCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    </div>
                    {{-- FIM DO CARROSSEL BOOTSTRAP --}}

                </div>

                <!-- Coluna de Informações e Preço -->
                <div class="col-lg-5">
                    <div class="card card-custom p-4">
                        <div class="mb-4">
                            <span class="text-gray-600">Preço</span>
                            <p class="display-5 fw-bold price-tag m-0">R$ {{ number_format($vehicle->price, 2, ',', '.') }}</p>
                        </div>

                        <h4 class="h5 fw-bold mb-3">Especificações</h4>
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item d-flex justify-content-between"><strong>Marca:</strong> <span>{{ $vehicle->vehicleModel->brand->name }}</span></li>
                            <li class="list-group-item d-flex justify-content-between"><strong>Modelo:</strong> <span>{{ $vehicle->vehicleModel->name }}</span></li>
                            <li class="list-group-item d-flex justify-content-between"><strong>Ano:</strong> <span>{{ $vehicle->year }}</span></li>
                            <li class="list-group-item d-flex justify-content-between"><strong>Cor:</strong> <span>{{ $vehicle->color->name }}</span></li>
                            <li class="list-group-item d-flex justify-content-between"><strong>KM:</strong> <span>{{ number_format($vehicle->mileage, 0, '', '.') }}</span></li>
                        </ul>

                        <h4 class="h5 fw-bold mb-3">Descrição</h4>
                        <p class="text-gray-700 mb-4">{{ $vehicle->details }}</p>

                        <a href="#" class="btn btn-gradient btn-lg w-100"><i class="bi bi-whatsapp me-2"></i>Tenho Interesse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- O JavaScript antigo não é mais necessário, pois o carrossel é automático --}}
@endsection