@extends ('website.base')

@section ('pageTitleTag')
  <title>
    Cancellation and returns
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
      Cancellation and returns
    </h1>
  </div>
  <div class="container py-4">
    <div class="row">
      <div class="col-md-6">
        <p>
          To cancel an order please call at {{ $company->phone }} and give your order ID.
        </p>
        <p>
          Products delivered once will not be returned.
        </p>
      </div>
      <div class="col-md-6">
      </div>
    </div>
  </div>
@endsection

