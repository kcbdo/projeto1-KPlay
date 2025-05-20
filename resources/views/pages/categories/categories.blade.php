@extends('template')
@section('page-container')

<h1 class="mb-4">Categorias</h1>

<div class="card-group flex-wrap d-flex gap-3">

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/educacao'">
    <div class="card-body">
        <h6 class="card-title">Educação</h6>
        <p class="card-text">Veja vídeos sobre educação.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/entretenimento'">
    <div class="card-body">
        <h6 class="card-title">Entretenimento</h6>
        <p class="card-text">Veja vídeos sobre entretenimento.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/tecnologia'">
    <div class="card-body">
        <h6 class="card-title">Tecnologia</h6>
        <p class="card-text">Veja vídeos sobre tecnologia.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/musica'">
    <div class="card-body">
        <h6 class="card-title">Música</h6>
        <p class="card-text">Veja vídeos sobre música.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/esportes'">
    <div class="card-body">
        <h6 class="card-title">Esportes</h6>
        <p class="card-text">Veja vídeos sobre esportes.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/noticias'">
    <div class="card-body">
        <h6 class="card-title">Notícias</h6>
        <p class="card-text">Veja vídeos sobre notícias.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/ciencia'">
    <div class="card-body">
        <h6 class="card-title">Ciência</h6>
        <p class="card-text">Veja vídeos sobre ciência.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/jogos'">
    <div class="card-body">
        <h6 class="card-title">Jogos</h6>
        <p class="card-text">Veja vídeos sobre jogos.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/filmes'">
    <div class="card-body">
        <h6 class="card-title">Filmes</h6>
        <p class="card-text">Veja vídeos sobre filmes.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

  <div class="card flex-fill" style="min-width: 250px; cursor: pointer;" onclick="window.location.href='/categoria/documentarios'">
    <div class="card-body">
        <h6 class="card-title">Documentários</h6>
        <p class="card-text">Veja vídeos sobre documentários.</p>
        <p class="card-text"><small class="text-muted">Clique para explorar</small></p>
    </div>
  </div>

</div>

@endsection
