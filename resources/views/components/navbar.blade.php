<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-75 shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('homepage') }}"><i class="fa-solid fa-gamepad"></i></a>

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
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
              <li><a class="dropdown-item text-capitalize" href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->title }}</a>
              </li>
              @if(!$loop->last)
              <hr class="dropdown-divider">
              @endif            
            @endforeach
          </ul>
          </li>

        @auth

          @if(Auth::user()->is_revisor)
            <li class="nav-item">
              <a class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25"
              href="{{ route('revisor.index') }}">zona revisore <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::ToBeRevisedCount() }}</span>
              </a>
            </li>
          @endif


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
