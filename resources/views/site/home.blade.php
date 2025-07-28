@extends('site.template')

@section('page-container')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div> 
@endif

<div class="card-body-home">
    <div class = search-container> 
        @if($videos->isEmpty())
            <p>Nenhum vídeo disponível.</p>
        @else
            <div class="video-list">
                @foreach($videos as $video)
                    <div class="video-item">
                        <div class="video-item">
                            <div class="video-wrapper">
                                <div class="video-player video-player-home">
                                    @if($video->video)
                                        <video controls>
                                            <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                        </video>
                                    @else
                                        <span>Sem vídeo</span>
                                    @endif
                                </div>
                                <div class="video-side-buttons">
                                    <form method="POST" action="{{ route('video.index', $video->id) }}">
                                        @csrf
                                        <button type="submit" class="btn-side">
                                            <i class="fas fa-thumbs-up"></i><br>Gostei
                                        </button>
                                    </form>
                        
                                    <a href="{{ route('video.index', $video->id) }}" class="btn-side">
                                        <i class="fas fa-comment"></i><br>Comentar
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                @endforeach
                
            </div>

            <div class="pagination">
                {{ $videos->links() }}
            </div>
        @endif
</div>
@endsection
