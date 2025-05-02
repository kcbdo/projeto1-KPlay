@extends('template')
@section('page-container')

<table class="table mt-3">

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
<a href="/create-edit" class="btn btn-secondary btn-sm text-white">Criar vídeo</a>

<a href="/" class="btn btn-secondary btn-sm text-white">Retornar para a página inicial</a>

@endsection