<nav class="bg-white shadow fixed top-0 left-0 right-0 z-50">
  <div class="container mx-auto flex items-center justify-between px-4 py-2">
    <a href="/" class="kplay-logo">KPlay</a>
    @auth  
    <ul id="menu" class="flex space-x-8 font-medium">
      <li><a href="{{ route('video.index') }}" class="nav-link">Vídeos</a></li>
      <li><a href="{{ route('playlists.index')}}" class="nav-link">Playlists</a></li>
      <li><a href="{{ route ('categories.index')}}" class="nav-link">Categorias</a></li>
      <li><a href="#" class="nav-link">Comentários</a></li>
        
      <div class="dropdown">
          <button class="btn btn-light" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user-circle fa-lg me-3"></i>
              <span>{{ Auth::user()->name }}</span>
          </button>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
              <li class="px-3 py-2">
                  <div class="small text-muted">{{ Auth::user()->email }}</div>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item">
                          <i class="fa-solid fa-sign-out-alt me-2"></i> Sair
                      </button>
                  </form>
              </li>
          </ul>
      </div>
      @endauth

    </ul>
  </div> 
</nav>