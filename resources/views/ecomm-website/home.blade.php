@extends ('ecomm-website.base')

@section ('pageTitleTag')
  <title>
    {{ env ('HOME_PAGE_TITLE', '') }}
    {{ env ('CMP_NAME', 'Nizbiz') }}
  </title>
@endsection

@section ('googleAnalyticsTag')
@endsection


@section ('fbOgMetaTags')
@if ($company)
  <meta property="og:url"                content="{{ Request::url() }}" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="{{ $company->name }}" />
  <meta property="og:description"        content="{{ $company->tagline }}" />
  <meta property="og:image"              content="{{ asset('storage/' . $company->logo_image_path) }}" />
@endif
@endsection

@if ($company)
@section ('content')
  @livewire ('ecomm-website.home-component')
@endsection
@endif

