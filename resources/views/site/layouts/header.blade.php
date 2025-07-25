<nav class="bg-white shadow fixed top-0 left-0 right-0 z-50">
  <div class="container mx-auto flex items-center justify-between px-4 py-2">
    <div class="dropdown">
      <button
        class="btn btn-light dropdown-toggle"
        type="button"
        id="dropdownMenuButton"
        data-bs-toggle="dropdown"
      >
        <i class="fa-solid fa-bars fa-lg"></i>
      </button>

      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="/shorts">Shorts</a></li>
        <li><a class="dropdown-item" href="/shorts-gostei">Shorts que gostei</a></li>
        <li><a class="dropdown-item" href="/shorts-nao-gostei">Shorts que não gostei</a></li>
        <li><a class="dropdown-item" href="/shorts-salvos">Shorts salvos</a></li>
      </ul>
    </div>
    <a href="/" class="kplay-logo">KPlaysy</a>

    <form action="#" method="GET" class="search-form">
      <input type="text" name="q" placeholder="Pesquisar" autocomplete="off" />
      <button type="submit" aria-label="Pesquisar">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          height="20"
          width="20"
          viewBox="0 0 24 24"
          fill="currentColor"
        >
          <path
            d="M10 2a8 8 0 105.293 14.293l4.707 4.707 1.414-1.414-4.707-4.707A8 8 0 0010 2zm0 2a6 6 0 110 12 6 6 0 010-12z"
          />
        </svg>
      </button>
    </form>

    <ul class="navbar-nav ms-auto flex items-center space-x-4">
      @guest
        <li><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
      @endguest

      @auth
        <li class="nav-item dropdown relative">
          <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="dropdown" href="#">
            <i class="fa-solid fa-user-circle fa-lg me-3"></i>
            {{ Auth::user()->name }}
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end absolute right-0 mt-2 bg-white border rounded shadow-md min-w-[200px]"
          >
            <li>
              <span class="dropdown-item-text px-4 py-2 block text-gray-700">
                {{ Auth::user()->email }}
              </span>
            </li>
            <li><hr class="dropdown-divider border-gray-200" /></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item w-full text-left px-4 py-2 hover:bg-gray-100">
                  Sair
                </button>
              </form>
            </li>
          </ul>
        </li>
      @endauth
    </ul>
  </div>
</nav>
