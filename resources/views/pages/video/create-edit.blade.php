@extends('template')
@section('page-container')
<div class="card-header">

    @if ( isset($video) && $video->id)
        <h1>Editar Vídeo</h1>
        
        <form action="{{ route('video.update') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <input type="hidden" name="id" class="form-control" value="{{ $video->id }}">
    @else
        <h1>Criar Vídeo</h1>
        <form action="{{ route('video.insert') }}" method="POST" enctype="multipart/form-data">
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        </div>
    @endif

    @csrf

    <div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Título</label>
        <input type="text" name ="title" class="form-control" value="{{ old('title', $video->title ?? '') }}"
        placeholder="Digite o título do vídeo" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <input type="text" name="description" class="form-control"  value="{{ old('description', $video->description ?? '')}}"
        placeholder="Digite a descrição do vídeo" required>
    </div>
    <div class="form-group">
        <label for="thumbnail">Thumbnail</label>
            {{-- verifica se o objeto imagem foi mandando para a view, se a imagem  está salvo  e se possui arquivo de imagem associado --}}
        {{-- se sim, exibe a imagem atual, se não, exibe o campo de upload de imagem --}}
        @if(isset($video) && $video->id && $video->thumbnail)
            <div class="mb-2">
                <label>Thumbnail atual:</label><br>
                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="Thumbnail atual" class="thumbail-image">
            </div>
        @endif
        <input type="file" name="thumbnail" class="form-control" accept="image/*" {{ isset($video) && $video->id ? '' : 'required' }}>
    </div>
    <div class="form-group">
        <label for="video">Vídeo</label>

    {{-- verifica se o objeto video foi mandando para a view, se o vídeo está salvo  e se possui arquivo de video associado --}}
    {{-- se sim, exibe o vídeo atual, se não, exibe o campo de upload de vídeo --}}
        @if(isset($video) && $video->id && $video->video)
            <div class="mb-2">
                <label>Vídeo atual:</label><br>
                <video width="120" height="90" controls>
                    <source src="{{ asset('storage/' . $video->video) }}" type="{{ $video->video_mimetype ?? 'video/mp4' }}" >
                    Seu navegador não suporta o vídeo.
                </video>
            </div>
        @endif
        <input type="file" name="video" class="form-control" accept="video/*" {{ isset($video) && $video->id ? '' : 'required' }}>
    </div>
    
    <div class="form-group">
        <label for="duration">Duração</label>
        <input type="time" name="duration" class="form-control" value="{{ old('duration', $video->duration ?? '')}}"
         required>
    </div>
   <div class="form-group">
        <label for="categories">Categorias</label>
        <select name="categories[]" id="categories" class="form-control" multiple>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                {{ in_array($category->id, old('categories', $video->categories->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    </div>
    <br>
    <button type="submit" class="btn btn-secondary btn-sm">
        {{ $video->id ? 'Atualizar' : 'Criar' }}
    </button> 
    <a href={{  route('video.index')}} class="btn btn-secondary btn-sm">Voltar</a>
</form>

@endsection