<!doctype html>

{{--
|
| Dashboard layout blade file.
|
| All the webpages of dashboard extend this blade file. It is a simple
| layout with a top menu, left menu and content.
|
| If you want to remove top menu, left menu or content (??),
| then you can remove them by modifying this file.
|
--}}

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
<body style="background-color: #f0f0f0;">
  <div class="h-100">

    {{--
    |
    | Top menu
    |
    --}}
    <div class="mb-0">
      @include ('partials.dashboard.app-top-menu')

    {{--
    |
    | Top menu mobile
    |
    --}}
    <div class="d-md-none col-md-12 p-0">
      @include ('partials.dashboard.mobile-top-menu')
    </div>

    <div class="row" style="margin: auto; min-height: 95vh;">
      {{--
      |
      | App left menu
      |
      --}}
      <div class="col-md-2 p-0 {{ config('app.app_menu_bg_color') }}-rm d-none d-md-block border-right shadow-sm" style="background-color: #1e293b;">
        @livewire ('dashboard.app-left-menu')
      </div>

      <div class="col-md-10">
        {{--
        |
        | Content
        |
        --}}
        <div>
          @yield ('content')
        </div>

      </div>
    </div>
  </div>

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
