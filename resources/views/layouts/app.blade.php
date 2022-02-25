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
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <!-- Livewire -->
    @livewireStyles
</head>
<body>
    <div id="app">
        <div class="bg-success-rm py-4 text-right" style="background-image: linear-gradient(to right, #fff, green);">
          <div class="float-right">
            <h1 class="text-white mr-3">
              <i class="fas fa-tv mr-3"></i>
              SmartPY
            </h1>
          </div>
          @guest
          @else
            <div class="float-right mx-4 px-4 text-white border-right border-left" style="font-size: 1.3rem;">
              <i class="fas fa-user mr-3"></i>
              {{ Auth::user()->name }}
            </div>
          @endguest
          <div class="clearfix">
          </div>

        </div>

        @if (false)
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        <main class="py-4">
          <div class="row">
            <div class="col-md-2">

                <div class="text-center border">
                  <a href="{{ route('dashboard') }}" class="btn btn-warning w-100 h-100 p-4 font-weight-bold text-left" style="font-size: 1.5rem; background-color: orange;">
                    <i class="fas fa-tv mr-3"></i>
                    DASHBOARD
                  </a>
                </div>

                <div class="text-center border">
                  <a href="" class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left" style="font-size: 1.5rem;">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    SALE
                  </a>
                </div>

                @if (false)
                <div class="text-center border">
                  <button class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left" style="font-size: 1.5rem;">
                    <i class="fas fa-atom mr-3"></i>
                    TABLES
                  </button>
                </div>
                @endif

                <div class="text-center border">
                  <a href="{{ route('menu') }}" class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left" style="font-size: 1.5rem;">
                    <i class="fas fa-list mr-3"></i>
                    MENU
                  </a>
                </div>

                <div class="text-center border">
                  <a href="{{ route('daybook') }}" class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left" style="font-size: 1.5rem;">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    DAYBOOK
                  </a>
                </div>

                <div class="text-center border">
                  <a href="" class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left" style="font-size: 1.5rem;">
                    <i class="fas fa-users mr-3"></i>
                    CUSTOMER
                  </a>
                </div>

            </div>
            <div class="col-md-10">
              @yield('content')
            </div>
          </div>
        </main>
    </div>

    <!-- Livewire scripts -->
    @livewireScripts
</body>
</html>
