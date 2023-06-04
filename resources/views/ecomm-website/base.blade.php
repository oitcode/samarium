<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield ('googleAnalyticsTag')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if ($company)
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('storage/' . $company->logo_image_path) }}">
    @endif

    @yield ('pageTitleTag')
    @yield ('pageDescriptionTag')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <!-- FB OG Meta tags -->
    @yield('fbOgMetaTags')

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

    {{-- Headers header --}}
    @if (false)
    @include ('partials.ecomm-website.headers-header')
    @endif

    {{-- Header --}}
    @include ('partials.ecomm-website.header')

    {{-- Top navigation menu --}}
    {{-- Product category menu --}}
    @if (false)
    @include ('partials.top-menu')
    @endif

    {{-- Content goes here !!! --}}
    @yield('content')

    {{-- Footer --}}
    @include ('partials.ecomm-website.footer')
  </div>
  @endif

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
