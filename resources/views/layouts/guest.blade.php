<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPremium - Compre e Venda Carros</title>
    
    {{-- CSS do Bootstrap via CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    {{-- Nosso CSS customizado da pasta public --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-color: #f9fafb;">

    {{-- O conteúdo das páginas de login/registro será injetado aqui --}}
    @yield('content')

    {{-- JavaScript do Bootstrap via CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>