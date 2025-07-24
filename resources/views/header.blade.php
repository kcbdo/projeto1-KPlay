<nav class="bg-white shadow fixed top-0 left-0 right-0 z-50">
  <div class="container mx-auto flex items-center justify-between px-4 py-2">
    <a href="/painel" class="kplay-logo">KPlaysy</a>
    @auth  
    <ul id="menu" class="flex space-x-8 font-medium">
      <li><a href="{{ route('video.index') }}" class="nav-link">Vídeos</a></li>
      <li><a href="{{ route('playlists.index')}}" class="nav-link">Playlists</a></li>
      <li><a href="{{ route ('categories.index')}}" class="nav-link">Categorias</a></li>
      <li><a href="#" class="nav-link">Comentários</a></li>
        
      <div class="dropdown">
           <li class="nav-item dropdown relative">
              <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="dropdown" href="#">
                <i class="fa-solid fa-user-circle fa-lg me-3"></i>
                  {{ Auth::user()->name }}
              </a>

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