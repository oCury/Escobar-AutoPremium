@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="d-inline-flex align-items-center gap-3 text-decoration-none">
                    <div class="logo-box"></div>
                    <h1 class="brand-name">AutoPremium</h1>
                </a>
            </div>

            <div class="card card-custom p-4 p-lg-5">
                <h2 class="h3 fw-bold text-center text-gray-900 mb-2">Crie sua Conta</h2>
                <p class="text-center text-gray-600 mb-4">É rápido e fácil. Vamos começar!</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nome -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold text-gray-700">Nome Completo</label>
                        <input id="name" type="text" name="name" class="form-control form-control-custom" value="{{ old('name') }}" required autofocus>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-gray-700">Email</label>
                        <input id="email" type="email" name="email" class="form-control form-control-custom" value="{{ old('email') }}" required>
                    </div>

                    <!-- Senha -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold text-gray-700">Senha</label>
                        <input id="password" type="password" name="password" class="form-control form-control-custom" required>
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold text-gray-700">Confirmar Senha</label>
                        <input id="password_confirmation" type="password" class="form-control form-control-custom" name="password_confirmation" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-gradient btn-lg">
                            Cadastrar
                        </button>
                    </div>
                </form>

                <p class="text-center text-gray-600 mt-4 mb-0">
                    Já tem uma conta? <a href="{{ route('login') }}" class="text-danger fw-semibold text-decoration-none">Faça login</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection