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

<body>
  <div class="h-100">
    <div class="h-100 d-flex justify-content-center bg-danger">
      <div class="h-100-rm d-flex flex-column justify-content-center" style="height: 500px; width: 300px;">
        <div class="text-center">
          <h1 class="h4">
            <i class="fas fa-exclamation-circle fa-2x mr-3 text-white"></i>
          </h1>
        </div>
        <h1 class="h4 text-white">
          App is down for maintainance
        </h1>
        <h2 class="h5 text-white">
          Sorry for the inconvinience.
        </h2>
      </div>
    </div>
  </div>
  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
