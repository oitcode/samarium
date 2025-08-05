<!doctype html>

{{--
|
| CMS webpage layout blade file.
|
| All the webpages of cms website extend this blade file. It is a simple
| layout with a header, top navigation menu, content and footer.
|
| You can edit this file to change the layout of website.
|
--}}

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield ('googleAnalyticsTag')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--
    |
    | CSRF Token
    |
    --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--
    |
    | Favicon
    |
    --}}
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

    {{--
    |
    | Scripts
    |
    --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{--
    |
    | Fonts
    |
    --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{--
    |
    | Styles
    |
    --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <style> 
      html, body { overflow-x: hidden; } 

      .o-footer-color {
        background-color: @if ($cmsTheme) {{ $cmsTheme->footer_bg_color }} @else white @endif ;
        color: @if ($cmsTheme) {{ $cmsTheme->footer_text_color }} @else black @endif ;
      }

      .o-footer-text-color {
        color: @if ($cmsTheme) {{ $cmsTheme->footer_text_color }} @else black @endif ;
      }

      .o-header-color {
        background-color: @if ($cmsTheme) {{ $cmsTheme->top_header_bg_color }} @else white @endif ;
        color: @if ($cmsTheme) {{ $cmsTheme->top_header_text_color }} @else black @endif ;
      }

      .o-nav-menu-color {
        background-color: @if ($cmsTheme) {{ $cmsTheme->nav_menu_bg_color }} @else white @endif ;
        color: @if ($cmsTheme) {{ $cmsTheme->nav_menu_text_color }} @else black @endif ;
      }

      .o-ascent-color, .o-ascent-color:hover {
        background-color: @if ($cmsTheme) {{ $cmsTheme->ascent_bg_color }} @else #123 @endif ;
        color: @if ($cmsTheme) {{ $cmsTheme->ascent_text_color }} @else white @endif ;
      }

      .o-ascent-text-color {
        color: @if ($cmsTheme) {{ $cmsTheme->ascent_text_color }} @else white @endif ;
      }

      .o-ascent-text-color-bg {
        color: @if ($cmsTheme) {{ $cmsTheme->ascent_bg_color }} @else white @endif ;
      }

      .o-ascent-border-color {
        border: 1px solid {{ config('app.website_ascent_border_color') }};
      }

      .blog-post-image {
          height: 200px;
          /*
          background: linear-gradient(135deg, #007bff, #0056b3);
          */
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 1rem;
          color: white;
      }
      
      .blog-category {
          background-color: #e6fffa;
          color: #319795;
          font-size: 0.75rem;
      }
      
      .blog-card {
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      
      .blog-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      }

      .blog-image {
        height: 200px;
        aspect-ratio: 16/9;
        object-fit: cover;
        width: 100%;
      }

    </style>

    {{--
    |
    | Livewire
    |
    --}}
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
      @include (config('app.header_blade_file'))

      {{--
      |
      | Nav menu
      |
      --}}
      @include ('partials.cms.website.nav-menu.nav-menu-default')

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
      @include (config('app.footer_blade_file'))
    </div>
  @endif

  {{--
  |
  | Livewire scripts 
  |
  --}}
  @livewireScripts
</body>
</html>
