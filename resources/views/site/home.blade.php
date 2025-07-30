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
                        <div class="video-wrapper">
                            <div class="video-player">
                                @if($video->video)
                                    <video controls>
                                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                    </video>
                                @else
                                    <span>Sem vídeo</span>
                                @endif
                            </div>
                            <div class="video-side-buttons">
                                <form method="POST" action="{{ route('videos.like', $video->id) }}">
                                    @csrf
                                    <input type="hidden" name="video_id" value="{{ $video->id }}">
                                    <button type="submit" class="btn-side">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                    <button type="button" class="btn-side" onclick="window.location='{{ route('video.index', $video->id) }}'">
                                        <i class="fa-sharp fa-regular fa-comment"></i>
                                    </button>                                        
                                    <button type="submit" class="btn-side">
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                </form>
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
