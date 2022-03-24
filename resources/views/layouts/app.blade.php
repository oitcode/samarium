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
        {{-- TOP HEADER SECTION --}}
        <div class="bg-success-rm py-4 text-right d-none d-md-block mb-3" style="background-image: linear-gradient(to right, #fff, green);">
          <div class="float-right">
            <h1 class="text-white mr-3">
              <i class="fas fa-tv mr-3"></i>
              SmartPY
            </h1>
          </div>
          @guest
          @else

            <div class="float-right mx-4-rm mr-4 px-4-rm text-white border-right" style="font-size: 1.3rem;">
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-list text-secondry mr-2"></i>
                  More
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <button class="dropdown-item" wire:click="">
                    <i class="fas fa-star text-secondary"></i>
                    Purchase
                  </button>
                  <a class="dropdown-item" href="{{ route('dashboard-expense') }}">
                    <i class="fas fa-star text-secondary"></i>
                    Expense
                  </a>
                </div>
              </div>
            </div>

            <div class="float-right mx-4 px-4 text-white border-right-rm" style="font-size: 1.3rem;">
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog text-secondry mr-2"></i>
                  {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <a class="dropdown-item" href="">
                    <i class="fas fa-user text-secondary"></i>
                    {{ Auth::user()->name }}
                  </a>
                  <a class="dropdown-item" href="{{ route('company') }}">
                    <i class="fas fa-user text-secondary"></i>
                    Company
                  </a>
                </div>
              </div>
            </div>

            <div class="float-right mx-4 px-4 text-white border-left-rm" style="font-size: 1.3rem;">
              @livewire ('online-order-counter')
            </div>
          @endguest
          <div class="clearfix">
          </div>

        </div>

        <main class="py-4-rm">
          <div class="row">
            <div class="col-md-2 p-0">
              <div class="d-none d-md-block">

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
                    TAKEAWAY

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
                    <a href="{{ route('weekbook') }}"
                      class="btn btn-success w-100 h-100 p-4 font-weight-bold text-left"

                      style="font-size: 1.5rem;

                        @if(Route::current()->getName() == 'weekbook')
                          background-color: #008450;
                        @endif

                      ">

                      <i class="fas fa-book mr-3"></i>
                      WEEKBOOK

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

              <div class="d-md-none mb-4">




<div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-dark bg-success" style="font-size: 1.2rem;">
    <div class="py-2">
      <button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <span class="text-white font-weight-bold">
      <i class="fas fa-tv mr-3"></i>
      SmartPY
    </span>
  
    <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('dashboard') }}">
            <i class="fas fa-tv mr-3"></i>
            DASHBOARD
          </a>
        </li>

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('sale') }}">
            <i class="fas fa-shopping-cart mr-3"></i>
            SALE
          </a>
        </li>

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('cafesale') }}">
            <i class="fas fa-table mr-3"></i>
            TABLES
          </a>
        </li>

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('menu') }}">
            <i class="fas fa-list mr-3"></i>
            MENU
          </a>
        </li>

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('daybook') }}">
            <i class="fas fa-book mr-3"></i>
            DAYBOOK
          </a>
        </li>

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('weekbook') }}">
            <i class="fas fa-book mr-3"></i>
            WEEKBOOK
          </a>
        </li>

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('customer') }}">
            <i class="fas fa-users mr-3"></i>
            CUSTOMER
          </a>
        </li>

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('online-order') }}">
            <i class="fas fa-satellite-dish mr-3"></i>
            ONLINE ORDER
          </a>
        </li>

        <li class="nav-item text-white mr-3 pr-3">
          <a class="nav-link text-white" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            >
            <i class="fas fa-send mr-3 text-warning-rm" style="color: red"></i>
            LOGOUT
          </a>
        </li>
  
      </ul>
    </div>
  </nav>
</div>




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
