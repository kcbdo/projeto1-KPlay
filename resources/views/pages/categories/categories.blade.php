@extends('template')
@section('page-container')

<div class="card">

    <div class="card-header text-center">
        <h1>Categorias</h1>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Educação</li>
            <li class="list-group-item">Entretenimento</li>
            <li class="list-group-item">Tecnologia</li>
            <li class="list-group-item">Música</li>
            <li class="list-group-item">Esportes</li>
            <li class="list-group-item">Notícias</li>
            <li class="list-group-item">Ciência</li>
            <li class="list-group-item">Jogos</li>
            <li class="list-group-item">Filmes</li>
            <li class="list-group-item">Documentários</li>
        </ul>

    </div>
    <div class="card-footer">
        <div class ="card-buttons">
            <a href="/" class="btn btn-secondary btn-sm text-white">Retornar para a página inicial</a>
            
            <a href="{{ route('categories.create') }}" class="btn btn-secondary btn-sm text-white">Criar categoria</a>
        </div>
        
    </div>

    
</div>

@endsection
