@extends('template')
@section('page-container')

@if ( isset($category) && $category->id)
    <h1>Editar Categoria</h1>
<form action="route{{'video.index'}}" method="POST">
    @method('PUT')
    <input type="hidden" name="id" class="form-control" value="{{ $category->id }}">
@else
    <h1>Criar Categoria</h1>
    <form action="{{ route('categories.insert') }}" method="POST">
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
    @csrf
    <div class="form-group">
        <div class="card-header">
        <label>Nome</label>
        <input type="text" name ="name" class="form-control" value="{{ old('name', $category->name ?? '') }}"
        placeholder="Digite o nome da categoria" required>
        </div>
    </div>
    <button type="submit" class="btn btn-kat btn-sm">
    {{ $categories->id ? 'Atualizar' : 'Criar' }}
    </button> 
    <a href={{  route('video.index')}} class="btn btn-kat btn-sm">Voltar</a>
</form>


@endsection