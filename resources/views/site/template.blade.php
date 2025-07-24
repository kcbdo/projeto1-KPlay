<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Esse é o meu primeiro software para assistir vídeos!" />
    <meta name="keywords" content="vídeos,playlists,músicas" />
    <meta name="author" content="Kathleen Barbosa" />
    <title>Kplaysy</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @include('site.layouts.head')
  </head>

  <body>
    @include('site.layouts.header')

    <div class="container mx-auto pb-8">
      @yield('page-container')
    </div>
  </body>
</html>
