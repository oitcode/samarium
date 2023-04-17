<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/dashboard-logo-1.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Chartjs -->
    <script src="{{ asset('js/chart.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <!-- Trix Editor CDN -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <style>
      html, body {
        overflow-x: hidden;
      }
    </style>


    <!-- Livewire -->
    @livewireStyles
</head>
<body style="background-color: #efefef;">
  <div class="mb-5">

    @if (true)
    <div class="mb-0">
      @include ('partials.dashboard.app-top-menu')
    </div>

    {{-- Mobile top menu --}}
    <div class="d-md-none col-md-12">
      @include ('partials.dashboard.mobile-top-menu')
    </div>
    @endif

    <div class="row" style="margin: auto;">
      {{-- App left menu --}}
      <div class="col-md-2 vh-100 p-0 {{ env('OC_ASCENT_BG_COLOR') }} d-none d-md-block">
        @if (false)
        @include ('partials.dashboard.app-left-menu')
        @endif
        @livewire ('dashboard.app-left-menu')
      </div>

      <div class="col-md-10">
        {{-- App top menu --}}
        @if (false)
        @include ('partials.dashboard.app-top-menu')
        @endif

        {{-- Content goes here --}}
        <div class="py-3">
          @yield('content')

          {{-- ostrich branding --}}
          <div class="d-flex justify-content-center my-5">
            <div class="d-flex flex-column" style="color: #ccc;">
              <h2 class="h3 text-secondary-rm d-flex justify-content-center">
                <i><strong>
                  Oztrich
                </strong></i>
              </h2>
              <h2 class="h5 text-secondary-rm d-flex justify-content-center">
                  v0.4.8
              </h2>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  @if (env('APP_FOOTER') == true)
    {{-- Screen-bottom info bar --}}
    <div class="fixed-bottom">
      @include ('partials.dashboard.app-footer')
    </div>
  @endif

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
