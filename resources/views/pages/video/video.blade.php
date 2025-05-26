@extends('template')
@section('page-container')

<h1>Video</h1>
<a href="/" class="btn btn-secondary btn-sm text-white">Retornar para a página inicial</a>
<a href="{{ route('video.create') }}" class="btn btn-secondary btn-sm text-white">Criar vídeo</a>

<table class="table mt-3">

	<div class=card-body>
		<form action="{{route('video.index')}}" method="GET">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					
					<input type="text" name="pesquisar" class="form-control" placeholder="Busque por título">
				</div>
				<div class="col-md-6 col-sm-12 mt-1 pt-1">
					<button type="submit" class="btn btn-info btn">Pesquisar</button>
				</div>
			</div>
		</form>
	</div>

	<thead class="thead-dark">

		<tr>
			
			<th scope="col">ID</th>
			<th scope="col">Título</th>
			<th scope="col">Link</th>
			<th scope="col">Duração</th>
			<th scope="col">Descrição</th>
			<th scope="col">Categoria</th>
			<th scope="col">Editar</th>
			
			
			

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
				<td scope="col">
				@foreach ($video->categories as $category)
    				{{ $category->name }}
				@endforeach	
				</td>
				<td scope="col">
					<a href="{{ route('video.edit', $video->id) }}"> 
						<i class="fa-solid fa-pen"></i>
					</a>	
				</td>
			</tr>
		@endforeach
	</tbody>
	
</table>

<div class="pagination">{{ $videos->appends(request()->input())->links() }}</div>

@endsection