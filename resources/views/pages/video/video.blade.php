@extends('template')
@section('page-container')
  @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card-body">
    <table class="table mt-2">
      <h1>Vídeos</h1>
      <div class="card-buttons">
        <a type="button" href="/" class="btn btn-primary btn-sm">Retornar para a página inicial</a>
        <a type="button" href="{{ route('video.create') }}" class="btn btn-primary btn-sm">
          Criar vídeo
        </a>
      </div>
      <form action="{{ route('video.index') }}" method="GET">
        <div class="row">
          <div class="search-container">
            <input
              type="text"
              name="pesquisar"
              class="form-control"
              placeholder="Busque por título"
            />
            <button type="submit" class="btn btn-secondary btn-sm btn">Pesquisar</button>
          </div>
        </div>
      </form>

      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Título</th>
          <th scope="col">Thumbnail</th>
          <th scope="col">Vídeo</th>
          <th scope="col">Duração</th>
          <th scope="col">Descrição</th>
          <th scope="col">Categoria</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>

      <tbody class="kit-kat">
        @foreach ($videos as $video)
          <tr>
            <td>{{ $video->id }}</td>
            <td>{{ $video->title }}</td>
            <td>
              @if ($video->thumbnail)
                <img src="{{ asset('storage/' . $video->thumbnail) }}" class="video-thumbnail" />
              @else
                <span>Sem imagem</span>
              @endif
            </td>
            <td>
              @if ($video->video)
                <video controls>
                  <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4" />
                  Seu navegador não suporta o elemento de vídeo.
                </video>
              @else
                <span>Sem vídeo</span>
              @endif
            </td>
            <td>{{ $video->duration }}</td>
            <td>{{ $video->description }}</td>
            <td>
              @foreach ($video->categories as $category)
                {{ $category->name }}
              @endforeach
            </td>
            <td>
              <div class="dropdown">
                <button
                  class="btn btn-secondary btn-sm dropdown-toggle"
                  type="button"
                  id="dropdownMenuButton{{ $video->id }}"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  Ações
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $video->id }}">
                  <a class="dropdown-item" href="{{ route('video.edit', $video->id) }}">
                    <i class="fa-solid fa-pen mr-1"></i>
                    Editar
                  </a>
                  <form
                    action="{{ route('video.delete', $video->id) }}"
                    method="POST"
                    onsubmit="return confirm('Tem certeza que deseja excluir este vídeo?')"
                  >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item">
                      <i class="fa-solid fa-trash mr-1"></i>
                      Excluir
                    </button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="card-footer">
      {{ $videos->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
  </div>
@endsection
