@extends('template')
@section('page-container')

@if (isset($playlist) && $playlist->id)
    <div class="card-header">
        <h1>Editar Playlist</h1>
    </div>
    <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
        @csrf
        @method('PUT')
@else
    <div class="card-header">
        <h1>Criar Playlist</h1>
    </div>
    <form action="{{ route('playlists.insert') }}" method="POST">
        @csrf
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-body">
    <div class="form-group">
        <label for="title">Título</label>
        <input id="title" type="text" name="title" class="form-control"
            value="{{ old('title', $playlist->title ?? '') }}" placeholder="Digite o título da playlist" required>
    </div>

    <div class="form-group">
        <label for="is_public">Pública?</label>
        <select name="is_public" id="is_public" class="form-control" required>
            <option value="1" {{ old('is_public', $playlist->is_public ?? '') == 1 ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ old('is_public', $playlist->is_public ?? '') == 0 ? 'selected' : '' }}>Não</option>
        </select>
    </div>

    <div class="form-group">
        <label for="videos">Vídeos</label>
        <select name="videos[]" id="videos" class="form-control" multiple>
            @foreach($videos as $video)
                <option value="{{ $video->id }}"
                    {{ in_array($video->id, old('videos', $playlist->videos->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                    {{ $video->title }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="card-buttons">
    <button type="submit" class="btn btn-secondary btn-sm">
        {{ isset($playlist) && $playlist->id ? 'Atualizar' : 'Criar' }}
    </button>
    <a href="{{ route('playlists.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
    </div>

</form>
@endsection
