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
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    
    <tbody class="kit-kat">
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                <a href="{{ route('categories.edit', $category->id) }}" title="Editar" class="btn-edit">
                    <i class="fa-solid fa-pen"></i>
                </a>
                </td>
                <td>
                <form action="{{ route('categories.delete', $category->id) }}" method="POST" onsubmit="return confirm('Deseja excluir esta categoria?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-icon">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="card-footer">
    {{ $categories->links('pagination::bootstrap-4') }}
</div>

@endsection
