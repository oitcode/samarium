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

    {{-- Header --}}
    @include ('partials.header')

    {{-- Top navigation menu --}}
    {{-- Product category menu --}}
    @include ('partials.top-menu')

    {{-- Content goes here !!! --}}
    @yield('content')

    @if (false)
    @foreach ($productCategories as $productCategory)
      <div class="container">
        <h2 class="mb-3">
          {{ $productCategory->name }}
        </h2>
        <hr/>
        @if (true)
        @livewire ('website-product-category-product-list', ['productCategory' => $productCategory,])
        @endif
      </div>
    @endforeach
    @endif

    {{-- Footer --}}
    <div class="container-fluid bg-light-rm border pt-4 pb-5 text-white-rm" style="background-color: #eee;">
      <div class="container">
        @include ('partials.footer')
      </div>
    </div>

  </div>
  @endif

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
