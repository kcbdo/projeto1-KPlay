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
        <input type="file" name="thumbnail" class="form-control" value="{{ old('thumbmail', $video->thumbail ?? '')}}"
         accept="image/*" required>
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