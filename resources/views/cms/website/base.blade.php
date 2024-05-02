<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield ('googleAnalyticsTag')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield ('pageTitleTag')

    <!-- Favicon -->
    @if ($company)
      <link rel="shortcut icon" href="{{ asset('storage/' . $company->logo_image_path) }}">
    @endif


    @yield ('pageDescriptionTag')

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
    @yield('fbOgMetaTags')


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
<body style="">
  @if (! $company)
    <div class="d-flex justify-content-center h-100">
      <div class="d-flex flex-column justify-content-center h-100">
        <div class="mt-3 d-flex justify-content-center">
          <div>
            <h1>
              <strong>OIT CMS</strong>
            </h1>
            <p class="text-muted">
              CMS | Ecommerce | Web
            </p>
          </div>
        </div>
        <div class="my-3">
          <div class="p-5-rm text-center border shadow" style="background-color: #eaeaea;">
            <div class="p-3">
              <h2>
                Welcome
              </h2>
              <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 text-secondary">
                  Welcome to OIT CMS software. You can create websites quickly
                  and easily using our software. We hope you like our software.
                </div>
                <div class="col-md-4">
                </div>
              </div>
            </div>

            <hr />

            <h2 class="text-danger">
              Company not set
            </h2>
            <p class="text-secondary">
              Please start by creating your company in dashboard.
            </p>
            <h3 class="h5 font-weight-bold">
              <a href="./dashboard" class="btn btn-success">
                Visit dashboard
              </a>
            </h3>

            <br />
            <br />

            <div class="bg-dark text-white p-3">
              CMS | Ecommerce | Web
            </div>
          </div>

          <div class="my-4 text-center text-secondary">
            <h3 class="h6 font-weight-bold">
              &copy; 2024 OIT | oit.com.np
            </h3>
          </div>

        </div>
      </div>
    </div>
  @else
  <div class="p-0">

    {{-- Header --}}
    @include ('partials.cms.headers-header')

    {{-- Top navigation menu --}}
    @livewire ('cms.website.menu-wp')

    <div class="@if (isset($webpage) && $webpage->is_post == 'yes') @else @endif">
      @yield ('pageAnnouncer')

      {{-- Content goes here !!! --}}
      @yield('content')
    </div>

    {{-- Footer --}}
    @include ('partials.cms.footer')

  </div>
  @endif

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
