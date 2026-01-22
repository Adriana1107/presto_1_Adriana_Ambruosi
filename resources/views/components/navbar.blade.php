<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('homepage') }}">Game</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" href="{{ route('homepage') }}">Home</a>
        </li>
        <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">Guide</a>
                </li>

        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Salve, {{ Auth::user()->name }}
          </a>

          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="{{ route('create.article') }}">
                Crea
              </a>
            </li>
            

            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item" href="#"
                 onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                Logout
              </a>
            </li>
          </ul>

          <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">
            @csrf
          </form>
        </li>

        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Ciao!
          </a>

          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="{{ route('login') }}">Accedi</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="{{ route('register') }}">Registrati</a>
            </li>
          </ul>
        </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>
