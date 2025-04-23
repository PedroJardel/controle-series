<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <title>{{ $title }}</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>

    @auth
    <a class="navbar-brand" href="{{ route('logout') }}">Sair</a>
    @endauth

    @guest
    @if(!Request::routeIs('login'))
    <a class="navbar-brand" href="{{ route('login') }}">Entrar</a>
    @endif
    @endguest
    </div>
</nav>
    <div class="container">
        <h1>{{ $title }}</h1>
        @isset($messageSuccess)
        <div class="alert alert-success">
            {{ $messageSuccess }}
        </div>
        @endisset
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{ $slot }}
    </div>
</body>

</html>