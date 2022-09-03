<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                  <li><a href="{{ route('home') }}" class="nav-link px-2 link-secondary">{{ config('app.name') }}</a></li>
                  <li><a href="#" class="nav-link px-2 link-dark">{{ __('Buy') }}</a></li>
                  <li><a href="#" class="nav-link px-2 link-dark">{{ __('Rent') }}</a></li>
                  <li><a href="#" class="nav-link px-2 link-dark">{{ __('Ventures') }}</a></li>
                </ul>
        

                @guest
                    
                    <ul class="nav col-12 col-lg-auto me-lg-right mb-2 justify-content-right mb-md-0">
                        @if (Route::has('login'))
                        <li><a href="{{ route('login') }}" class="nav-link px-2 link-secondary">{{ __('Login') }}</a></li>
                        @endif
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="nav-link px-2 link-secondary">{{ __('Register') }}</a></li>
                        @endif
                    </ul>

                @else

                <ul class="me-lg-center justify-content-center mb-md-0">
                  <a href="{{ route('new_property') }}"><button type="button" class="btn btn-primary">{{ __('New_Post') }}</button></a>
                </ul>

                <div class="dropdown text-end">
                  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">

                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                  </ul>
                </div>

                @endguest

              </div>
            </div>
          </header>

        <!-- Comienzo MAIN -->
        <main>
            @yield('content')

            <div class="container">
              <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                </ul>
                <p class="text-center text-muted">© {{ now()->year }} Dueño Directo Argentina</p>
              </footer>
            </div>


        </main>

    </div>

    
</body>
</html>
