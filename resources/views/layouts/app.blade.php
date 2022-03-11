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

            <div class="float-right mx-4 px-4 text-white border-right border-left" style="font-size: 1.3rem;">
              <a href="{{ route('company') }}" class="text-white">
              <i class="fas fa-user mr-3"></i>
              Company
              </a>
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
                  <a href="{{ route('sale') }}"
                    class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left"

                    style="font-size: 1.5rem;

                      @if(Route::current()->getName() == 'sale')
                        background-color: #008450;
                      @endif
                    ">

                    <i class="fas fa-shopping-cart mr-3"></i>
                    SALE

                  </a>
                </div>

                @if (true)
                <div class="text-center border">
                  <a href="{{ route('cafesale') }}"
                    class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left"

                    style="font-size: 1.5rem;

                      @if(Route::current()->getName() == 'cafesale')
                        background-color: #008450;
                      @endif
                    ">

                    <i class="fas fa-table mr-3"></i>
                    TABLES

                  </a>
                </div>
                @endif

                <div class="text-center border">
                  <a href="{{ route('menu') }}"
                    class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left"

                    style="font-size: 1.5rem;

                      @if(Route::current()->getName() == 'menu')
                        background-color: #008450;
                      @endif
                    ">

                    <i class="fas fa-list mr-3"></i>
                    MENU

                  </a>
                </div>

                @can ('is-admin')
                  <div class="text-center border">
                    <a href="{{ route('daybook') }}"
                      class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left"

                      style="font-size: 1.5rem;

                        @if(Route::current()->getName() == 'daybook')
                          background-color: #008450;
                        @endif

                      ">

                      <i class="fas fa-book mr-3"></i>
                      DAYBOOK

                    </a>
                  </div>

                  <div class="text-center border">
                  <a href="{{ route('customer') }}"
                    class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left"

                    style="font-size: 1.5rem;

                      @if(Route::current()->getName() == 'customer')
                        background-color: #008450;
                      @endif
                    ">
                      <i class="fas fa-users mr-3"></i>
                      CUSTOMER
                    </a>
                  </div>
                @endcan

                <div class="text-center border">
                  <a href="{{ route('online-order') }}"
                    class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left"

                    style="font-size: 1.5rem;

                      @if(Route::current()->getName() == 'online-order')
                        background-color: #008450;
                      @endif
                    ">

                    <i class="fas fa-satellite-dish mr-3"></i>
                    ONLINE ORDER

                  </a>
                </div>

                <div class="text-center border">
                  <a class="btn btn-info-rm w-100 h-100 p-4 font-weight-bold text-left text-white" href="{{ route('logout') }}"  style="font-size: 1.5rem;
                  background-color: #6c6;"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      <i class="fas fa-send mr-3 text-warning-rm" style="color: red"></i>
                      LOGOUT
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
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
