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
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <style>
      html, body {
        overflow-x: hidden;
      }
    </style>


    <!-- Livewire -->
    @livewireStyles
</head>
<body style="background-color: #fff;">
  <div class="mb-5">
    <div class="row" style="min-height: 500px;">
      {{-- App left menu --}}
      <div class="col-md-1">
        @include ('partials.dashboard.app-left-menu')
      </div>

      {{-- Mobile top menu --}}
      <div class="d-md-none col-md-12">
        @include ('partials.dashboard.mobile-top-menu')
      </div>

      <div class="col-md-11">
        {{-- App top menu --}}
        @include ('partials.dashboard.app-top-menu')

        {{-- Content goes here --}}
        @yield('content')

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
