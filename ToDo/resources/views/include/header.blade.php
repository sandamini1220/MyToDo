<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">ToDo App</a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tasks</a>
          </li>
        </ul>

        @auth
          <span class="navbar-text me-3 text-light">
            Hello, {{ Auth::user()->name }}
          </span>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
          <a href="{{ route('register') }}" class="btn btn-success btn-sm">Register</a>
        @endauth
      </div>
    </div>
  </nav>
</header>
