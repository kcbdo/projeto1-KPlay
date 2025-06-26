@extends('template')
@section ('page-container')

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<h1>Playlists</h1>

<div class="card-buttons">
    <a href="/" class="btn btn-secondary btn-sm text-white">Retornar para a página inicial</a>
    <a href="{{ route('playlists.create') }}" class="btn btn-secondary btn-sm text-white">Criar playlist</a>
</div>

<div class="card-body">
    <form action="{{ route('playlists.index') }}" method="GET">
        <div class="row">
            <div class="search-container">
                <input type="text" name="pesquisar" class="form-control" placeholder="Busque por título" value="{{ request('pesquisar') }}">
                <button type="submit" class="btn btn-secondary btn-sm btn">Pesquisar</button>
            </div>
        </div>
    </form>
</div>

<table class="table mt-3">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Título</th>
        <th scope="col">Pública?</th>
        <th scope="col">Visualizar playlist</th>
        <th scope="col">Ações</th>
    </tr>
</thead>

<tbody>
    @foreach ($playlists as $playlist)
        <tr>
            <td>{{ $playlist->id }}</td>
            <td>{{ $playlist->title }}</td>
            <td>{{ $playlist->is_public ? 'Sim' : 'Não' }}</td>
             <td>
                <a href="{{ route('playlists.show', $playlist->id) }}" class="btn btn-secondary btn-sm">
                    <i class="fa-solid fa-eye mr-1"></i> Visualizar
                </a>
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $playlist->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $playlist->id }}">
                        <a class="dropdown-item" href="{{ route('playlists.edit', $playlist->id) }}">
                            <i class="fa-solid fa-pen mr-1"></i> Editar
                        </a>
                        <form action="{{ route('playlists.delete', $playlist->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta playlist?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">
                                <i class="fa-solid fa-trash mr-1"></i> Excluir
                            </button>
                        </form>
                    </div>
                </div>        
            </td>
        </tr>
    @endforeach
</tbody>

</table>

<div class="card-footer">
    {{ $playlists->appends(request()->input())->links('pagination::bootstrap-4') }}
</div>

@endsection



