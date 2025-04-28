@extends('template')
@section('page-container')
<br>

<button type="button" class="btn btn-secondary btn-sm">
<a class="nav-link" href="/create-edit">Criar vídeo</a>
</button>

<button type="button" class="btn btn-secondary btn-sm" href="/">
<a class="nav-link" href="/">Retornar para a página inicial</a>
</button> 

<br><br>

<table class="table">
  
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Título</th>
      <th scope="col">Estilo</th>
      <th scope="col">Criado por</th>
      <th scope="col">Visualizações</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>

@endsection

