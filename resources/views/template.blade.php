<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Esse é o meu primeiro software para assistir vídeos!"> <!--pequena descrição do meu site;-->
        <meta name="keywords" content="vídeos,playlists,músicas"> <!--palavras que vão auxiliar para encontrar conteúdo do site; no entanto, atualmente a IA já consegue varrer os sites de forma eficiente e definir qual o conteúdo do site-->
        <meta name="author" content="Kathleen Barbosa">
        <title>Kplay</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @include ('head')
       
    </head>

    </body>

    <div class="container">
    
        @include ('header')
        
        
        <!--incluir h1 aqui com título-->
        
        @yield ('page-container')
    </div>       
        
    </body>

</html>