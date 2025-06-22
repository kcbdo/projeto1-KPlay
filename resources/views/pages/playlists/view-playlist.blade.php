@extends('template')
@section('page-container')

<h1>Playlist: {{ $playlist->title }}</h1>

<div class="card-buttons">
    <a href="{{ route('playlists.index') }}" class="btn btn-secondary btn-sm text-white">Voltar</a>
</div>

@if($playlist->videos->count() > 0)
    <table class="table mt-3">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Link</th>
                <th>Duração</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($playlist->videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->title }}</td>
                    <td>
                        <a href="https://www.youtube.com/watch?v={{ $video->link }}" target="_blank">
                            {{ 'https://www.youtube.com/watch?v='.$video->link }}
                        </a>
                    </td>
                    <td>{{ $video->duration }}</td>
                    <td>{{ $video->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info">
        Nenhum vídeo cadastrado nesta playlist.
    </div>
@endif
<div class="card-footer">
    {{ $playlists->appends(request()->input())->links('pagination::bootstrap-4') }}
</div>

@endsection
