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
                <h2 class="h3 fw-bold text-center text-gray-900 mb-2">Bem-vindo de volta!</h2>
                <p class="text-center text-gray-600 mb-4">Acesse sua conta para continuar.</p>

                <!-- Exibe mensagens de erro de validação -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-gray-700">Email</label>
                        <input id="email" type="email" name="email" class="form-control form-control-custom" value="{{ old('email') }}" required autofocus>
                    </div>

                    <!-- Senha -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="form-label fw-semibold text-gray-700">Senha</label>
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none text-danger small" href="{{ route('password.request') }}">
                                    Esqueceu a senha?
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" class="form-control form-control-custom" required>
                    </div>

                    <!-- Lembrar-me -->
                    <div class="mb-4 form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label class="form-check-label" for="remember_me">Lembrar-me</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-gradient btn-lg">
                            Entrar
                        </button>
                    </div>
                </form>

                <p class="text-center text-gray-600 mt-4 mb-0">
                    Não tem uma conta? <a href="{{ route('register') }}" class="text-danger fw-semibold text-decoration-none">Cadastre-se</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection