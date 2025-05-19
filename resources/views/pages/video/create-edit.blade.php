@extends('template')
@section('page-container')

<h1>Criar vídeo</h1>

<form action="{{route('video.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Título</label>
        <input type="text" name ="titulo" class="form-control"   placeholder="Digite o título do vídeo">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <input type="text" name="descricao" class="form-control"   placeholder="Digite a descrição do vídeo">
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" name="link" class="form-control" placeholder="Digite o link do vídeo">
    </div>
    <div class="form-group">
        <label for="duration">Duração</label>
        <input type="text" name="duration" class="form-control" placeholder="Ex: 10:45">
    </div>

    <br>
    
  
  <button type="submit" class="btn btn-primary">Criar</button>
</form>

@endsection