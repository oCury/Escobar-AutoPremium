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
                <h2 class="h3 fw-bold text-center text-gray-900 mb-2">Recuperar Senha</h2>
                <p class="text-center text-gray-600 mb-4">
                    Sem problemas. Informe seu e-mail e enviaremos um link para você criar uma nova senha.
                </p>

                <!-- Status da Sessão (mostra a mensagem de sucesso após enviar o e-mail) -->
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
                    </div>
                @endif

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

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold text-gray-700">Email</label>
                        <input id="email" type="email" name="email" class="form-control form-control-custom" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-gradient btn-lg">
                            Enviar Link de Recuperação
                        </button>
                    </div>
                </form>

                <p class="text-center text-gray-600 mt-4 mb-0">
                    Lembrou a senha? <a href="{{ route('login') }}" class="text-danger fw-semibold text-decoration-none">Voltar para o login</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection