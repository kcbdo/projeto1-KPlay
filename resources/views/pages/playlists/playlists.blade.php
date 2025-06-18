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
        <th scope="col">Editar</th>
        <th scope="col">Visualizar playlist</th>
        <th scope="col">Excluir</th>
    </tr>
</thead>

<tbody>
    @foreach ($playlists as $playlist)
        <tr>
            <td>{{ $playlist->id }}</td>
            <td>{{ $playlist->title }}</td>
            <td>{{ $playlist->is_public ? 'Sim' : 'Não' }}</td>
            <td>
                <a href="{{ route('playlists.edit', $playlist->id) }}" title="Editar" class="btn-edit">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </td>
            <td>
                <a href="{{ route('playlists.show', $playlist->id) }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-eye"></i>
                </a>

            </td>
            <td>
                <form action="{{ route('playlists.delete', $playlist->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link" onclick="return confirm('Tem certeza que deseja excluir esta playlist?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

</table>

<div class="card-footer">
    {{ $playlists->appends(request()->input())->links('pagination::bootstrap-4') }}
</div>

@endsection



