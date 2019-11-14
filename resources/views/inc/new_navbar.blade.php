<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar site-navbar-target" role="banner">

<div class="container">
  <div class="row align-items-center position-relative">

    <div class="col-3 ">
      <div class="site-logo">
        <a href="/">.</a>
      </div>
    </div>

    <div class="col-9  text-right">

     <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>


     @if(!Auth::check())
          <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto ">
               <li><a href="/" class="nav-link">Strona główna</a></li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                       </div>
                   {{-- <a href="/ogloszenia" class="nav-link">Ogłoszenia</a> --}}
               </li>
               <li><a href="/kontakt" class="nav-link">Kontakt</a></li>
               <li><a href="{{ route('login') }}" class="nav-link">Logowanie</a></li>
               <li><a href="{{ route('register') }}" class="nav-link">Rejestracja</a></li>
            </ul>
          </nav>

      @elseif(Auth::user()->roles()->where('name','Admin'))
          <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto ">
               <li class="active"><a href="/" class="nav-link">Strona główna</a></li>
               <li><a href="/ogloszenia" class="nav-link">Ogłoszenia</a></li>
               <li><a href="/kontakt" class="nav-link">Kontakt</a></li>
               <li><a href="/uzytkownicy" class="nav-link">Użytkownicy</a></li>
            </ul>
          </nav>
      @else

      @endif
    </div>


  </div>
</div>

</header>
