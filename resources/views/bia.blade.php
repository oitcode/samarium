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
    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <!-- FB OG Meta tags -->
    {{--
    @yield('fbOgMetaTags')
    --}}


    {{-- Some custom styles --}}
    <style>
      .o-ecs-card {
      }
      .o-ecs-card:hover {
        opacity: 1;
        transition: 0.3s;
      }

      .o-ecs-card-body:hover {
        {{--
        background-color: white !important;
        color: #555 !important;
        --}}
        opacity: 1;
        transition: 0.5s;
      }
      .o-ecs-card-body {
        opacity: 0.9;
        font-size: 1.3rem;
      }

      .carousel-indicators{
      }
    </style>

    <!-- Livewire -->
    @livewireStyles
</head>
<body>
  @if (! $company)
    <div class="p-5 bg-danger text-white text-center">
      <h3 class="h5 font-weight-bold">
        Create Company in dashboard ...
      </h3>

      <br />
      <br />

      <h3 class="h5 font-weight-bold">
        &copy; OIT | www.oit.com.np
      </h3>
    </div>
  @else
  <div class="p-0">

    {{-- Header --}}
    @include ('partials.ecs.headers-header')
    @if (false)
    @include ('partials.ecs.header')
    @endif

    {{-- Top navigation menu --}}
    {{-- Product category menu --}}
    @livewire ('ecs.menu-wp')

    @yield ('pageAnnouncer')

    {{-- Content goes here !!! --}}
    @yield('content')

    {{-- Footer --}}
    <div class="container-fluid border pt-4 pb-5 text-white" style="background-color: {{
    \App\CmsTheme::first()->footer_color }};">
      <div class="container">
        @include ('partials.ecs.footer')
      </div>
    </div>

  </div>
  @endif

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
