<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <div class="card">
            <h2>Entrar no KPlay</h2>
            <form method="POST" action="/login">
              @csrf
              <div class="form-group">
                <input type="email" name="email" placeholder="E-mail" required>
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Senha" required>
              </div>
              <button type="submit" class="btn-login">Entrar</button>
            </form>
            <div class="footer-text">
              Não tem uma conta? <a href="/register">Cadastre-se</a>
            </div>
          </div>
    </body>
</html>
