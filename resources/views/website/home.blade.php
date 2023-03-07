@extends ('website.base')

@section ('pageTitleTag')
  <title>
    {{ env ('HOME_PAGE_TITLE', '') }}
    {{ env ('CMP_NAME', 'Foobiz') }}
  </title>
@endsection

@section ('googleAnalyticsTag')
@endsection


@section ('fbOgMetaTags')
<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $company->name }}" />
<meta property="og:description"        content="{{ $company->tagline }}" />
<meta property="og:image"              content="{{ asset('storage/' . $company->logo_image_path) }}" />
@endsection

@section ('content')
  @livewire ('ecomm-website.home-component')
@endsection

