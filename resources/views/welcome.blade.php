<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Nieruchomosci</title>
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}"
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ url('/nieruchomosci') }}">Nieruchomosci</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

        <div class="container my-4">
            @if (Route::has('login'))
                <div class="flex-center position-ref full-height">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Logowanie</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Rejestracja</a>
                            @endif

                        @endauth
                </div>
            @endif

            @yield('content')

        </div>

        <script src="{{ url('js/bootstrap.min.js')}}"></script>
    </body>
</html>
