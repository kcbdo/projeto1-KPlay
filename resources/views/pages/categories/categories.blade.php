@extends('template')
@section('page-container')

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
    
<h1>Categoria</h1>

<div class="card-buttons">
    <a href="/" class="btn btn-secondary btn-sm text-white">Retornar para a página inicial</a>
    <a href="{{ route('categories.create') }}" class="btn btn-secondary btn-sm text-white">Criar categoria</a>
</div>

<div class="card-body">
    <form action="{{ route('categories.index') }}" method="GET">
        <div class="row">
            <div class="search-container">
                <input type="text" name="pesquisar" class="form-control" placeholder="Busque por nome">
                <button type="submit" class="btn btn-secondary btn-sm">Pesquisar</button>
            </div>
        </div>
    </form>
</div>

<table class="table mt-3">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    
    <tbody class="kit-kat">
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $category->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $category->id }}">
                    <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">
                        <i class="fa-solid fa-pen mr-1"></i> Editar
                    </a>
                    <form action="{{ route('categories.delete', $category->id) }}" method="POST" onsubmit="return confirm('Deseja excluir esta categoria?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item">
                        <i class="fa-solid fa-trash mr-1"></i> Excluir
                    </button>  
                    </form>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="card-footer">
    {{ $categories->links('pagination::bootstrap-4') }}
</div>

@endsection
