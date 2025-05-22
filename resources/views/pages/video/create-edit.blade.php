@extends('template')
@section('page-container')

<h1>Criar vídeo</h1>

<form action="{{route('video.insert') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Título</label>
        <input type="text" name ="titulo" class="form-control" placeholder="Digite o título do vídeo"required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <input type="text" name="descricao" class="form-control"  placeholder="Digite a descrição do vídeo" required>
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" name="link" class="form-control" placeholder="Digite o link do vídeo" required>
    </div>
    <div class="form-group">
        <label for="duration">Duração</label>
        <input type="time" name="duration" class="form-control" placeholder="Ex: 10:45" required>
    </div>
    <div class="form-group">
        <label for="duration">Categorias</label>
        <select name="select">
        type="text"

        </select>
    </div>

    <br>
    
  
  <button type="submit" class="btn btn-primary">Criar</button>
</form>

@endsection