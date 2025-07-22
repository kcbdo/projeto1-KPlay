@extends('site.template')

@section('page-container')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div> 
@endif

<div class="card-body">
    <h1 class="mb-4">Vídeos</h1>
<div class = search-container> 
    @if($videos->isEmpty())
        <p>Nenhum vídeo disponível.</p>
    @else
        <div class="video-list">
            @foreach($videos as $video)
                <div class="video-item">
                    <div class="video-item">
                        <h4>{{ $video->title }}</h4>
                    
                        <div class="video-player video-player-home">
                            @if($video->video)
                                <video controls>
                                    <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                </video>
                            @else
                                <span>Sem vídeo</span>
                            @endif
                        </div>
                    
                        <p>{{ $video->description }}</p>
                        <p><strong>Duração:</strong> {{ $video->duration }}</p>
                        <p><strong>Categoria:</strong> {{ $video->category ? $video->category->name : 'Sem categoria' }}</p>
                    </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $videos->links() }}
        </div>
    @endif
</div>
@endsection
