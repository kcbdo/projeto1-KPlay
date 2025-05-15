@extends('template')
@section('page-container')

<h1>Criar vídeo</h1>
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Título</label>
        <input type="text" class="form-control"   placeholder="Digite o título do vídeo">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Descrição</label>
        <input type="text" class="form-control"   placeholder="Digite a descrição do vídeo">
    </div>

    <br>
  
  <button type="submit" class="btn btn-primary">Criar</button>
</form>

@endsection