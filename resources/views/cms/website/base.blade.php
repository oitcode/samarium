<!doctype html>

{{--
|
| CMS webpage layout blade file.
|
| Author: _______ _________
|
|
| All the webpages of cms website extend this blade file. It is a simple
| layout with a header, top navigation menu, content and footer.
|
| If you want to remove header, top-navigation, content (??) or footer,
| then you can remove them by modifying this file.
|
--}}

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield ('googleAnalyticsTag')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    @if ($company)
      <link rel="shortcut icon" href="{{ asset('storage/' . $company->logo_image_path) }}">
    @endif

    {{--
    |
    | Page title and description. Important for SEO.
    |
    --}}
    @yield ('pageTitleTag')
    @yield ('pageDescriptionTag')

    {{--
    |
    | FB OG Meta tags.
    |
    --}}
    @yield('fbOgMetaTags')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <style> 
    html, body { overflow-x: hidden; } 
    </style>


    <!-- Livewire -->
    @livewireStyles
</head>

<body style="height: 100% !important;">
  @if (! $company)
    <div class="h-100">
      @if (config('app.no_cmp_display') == 'coming_soon')
        @include ('partials.cms.website.coming-soon-page')
      @else
        @include ('partials.cms.website.company-not-set')
      @endif
    </div>
  @else
  <div class="p-0">

    {{--
    |
    | Header
    |
    --}}
    @include ('partials.cms.headers-header')

    {{--
    |
    | Nav menu
    |
    --}}
    @livewire ('cms.website.nav-menu')

    {{--
    |
    | Content
    |
    --}}
    <div class="@if (isset($webpage) && $webpage->is_post == 'yes') @else @endif">
      @yield ('pageAnnouncer')
      @yield ('content')
    </div>

    {{--
    |
    | Footer
    |
    --}}
    @include ('partials.cms.footer')

  </div>
  @endif

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
