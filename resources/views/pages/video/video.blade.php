@extends('template')
@section('page-container')

<h1>Video</h1>

<table class="table mt-3">
<form class="form-inline">
  <div class="form-group mx-sm-3 mb-2">
    <label class="sr-only">Pesquisar</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Pesquise aqui">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>
</form>
	<thead class="thead-dark">

		<tr>
			
			<th scope="col">ID</th>
			<th scope="col">Título</th>
			<th scope="col">Link</th>
			<th scope="col">Duração</th>
			<th scope="col">Descrição</th>
		</tr>

	</thead>

	<tbody>

		@foreach($videos as $video)
			<tr>
				<td scope="col">{{ $video->id }}</td>
				<td scope="col">{{ $video->title }}</td>
				<td scope="col">{{ $video->link }}</td>
				<td scope="col">{{ $video->duration }}</td>
				<td scope="col">{{ $video->description }}</td>
			</tr>
		@endforeach
	</tbody>
	
</table>

<div class="pagination">{{ $videos->links() }}</div>

<a href="/create-edit" class="btn btn-secondary btn-sm text-white">Criar vídeo</a>

<a href="/" class="btn btn-secondary btn-sm text-white">Retornar para a página inicial</a>

@endsection