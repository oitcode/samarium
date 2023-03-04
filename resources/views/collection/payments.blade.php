@extends ('website.base')

@section ('pageTitleTag')
  <title>
    Payments
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
  <div class="container py-4">
    <h1>
      Payments
    </h1>
  </div>
  <div class="container py-4">
    <div class="row">
      <div class="col-md-6">
        <p>
          We accept below payment methods.
        </p>
      </div>
      <div class="col-md-6">
      </div>
    </div>
  </div>
@endsection

