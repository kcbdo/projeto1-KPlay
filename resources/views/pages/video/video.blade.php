@extends('template')
@section('page-container')

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<h1>Video</h1>
<div class ="search-container">
<a href="/" class="btn btn-secondary btn-sm text-white">Retornar para a página inicial</a>
<a href="{{ route('video.create') }}" class="btn btn-secondary btn-sm text-white">Criar vídeo</a>
</div>


<table class="table mt-3">

	<div class=card-body>
		<form action="{{route('video.index')}}" method="GET">
			<div class="row">
				<div class="search-container">
					<input type="text" name="pesquisar" class="form-control" placeholder="Busque por título">
					<button type="submit" class="btn btn-secondary btn-sm btn">Pesquisar</button>
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
			<th scope="col">Excluir</th>
		</tr>

	</thead>

	<tbody class="kit-kat">

		@foreach($videos as $video)
		
			<tr>
				<td>{{ $video->id }}</td>
				<td>{{ $video->title }}</td>
				<td><a href="{{ 'https://www.youtube.com/watch?v='.$video->link }}" class="kit-kit" target="_blank">{{ 'https://www.youtube.com/watch?v='.$video->link }}</a></td>
				<td>{{ $video->duration }}</td>
				<td>{{ $video->description }}</td>
				<td>
				@foreach ($video->categories as $category)
    				{{ $category->name }}
				@endforeach	
				</td>
				<td>
					<a href="{{ route('video.edit', $video->id) }}"> 
						<i class="fa-solid fa-pen"></i>
					</a>	
				</td>
				<td>
					<form action="{{ route('video.delete', $video->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link" onclick="return confirm('Tem certeza que deseja excluir este vídeo?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                	</form>
				</td>
			</tr>
		@endforeach
	</tbody>
	
</table>

<div class="pagination">{{ $videos->appends(request()->input())->links() }}</div>

@endsection