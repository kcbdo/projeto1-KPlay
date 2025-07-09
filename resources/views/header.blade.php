<nav class="bg-white shadow fixed top-0 left-0 right-0 z-50">
  <div class="container mx-auto flex items-center justify-between px-4 py-2">
    <a href="/" class="kplay-logo">KPlay</a>

    <ul id="menu" class="flex space-x-8 font-medium">
      <li><a href="{{ route( 'users.index')}}" class="nav-link">Usuários</a></li>
      <li><a href="{{ route('video.index') }}" class="nav-link">Vídeos</a></li>
      <li><a href="{{ route('playlists.index')}}" class="nav-link">Playlists</a></li>
      <li><a href="{{ route ('categories.index')}}" class="nav-link">Categorias</a></li>
      <li><a href="#" class="nav-link">Comentários</a></li>
    </ul>
  </div> 
</nav>