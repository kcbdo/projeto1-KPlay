@extends('template')
@section('page-container')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>    
@endif
<h1>Usuários</h1>
<div class="card-buttons">
    <a href="/" class="btn btn-secondary btn-sm">Retornar para a página inicial</a>
    <a href="{{ route('users.create') }}" class="btn btn-secondary btn-sm">Criar usuário</a>
</div>
<div class="card-body">
    <form action="{{ route('users.index') }}" method="GET">
        <div class="row">
            <div class="search-container">
                <input type="text" name="pesquisar" class="form-control" placeholder="Busque por nome ou e-mail">
                <button type="submit" class="btn btn-secondary btn-sm">Pesquisar</button>
            </div>
        </div>
    </form>
@endsection