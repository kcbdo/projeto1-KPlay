@extends('template')
@section('page-container')

<div class="card">

    <div class="card-header text-center">
        <h1>Categorias</h1>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($categories as $category)
                <li class="list-group-item">{{ $category->name }}</li>
            @endforeach
        </ul>

    </div>
    <div class="card-footer">
        <div class ="card-buttons">
            <a href="/" class="btn btn-secondary btn-sm text-white">Retornar para a página inicial</a>
            {{ $categories->links('pagination::bootstrap-4') }}
            <a href="{{ route('categories.create') }}" class="btn btn-secondary btn-sm text-white">Criar categoria</a>
        </div>
        
    </div>
    
</div>

@endsection
