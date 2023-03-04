@extends ('website.base')

@section ('pageTitleTag')
  <title>
    FAQ
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
      FAQ
    </h1>
    <p>
      Lorem ipsum dolor emut conneit emis xeron. 
      Lorem ipsum dolor emut conneit emis xeron. 
      Lorem ipsum dolor emut conneit emis xeron. 
      Lorem ipsum dolor emut conneit emis xeron. 
      Lorem ipsum dolor emut conneit emis xeron. 
      Lorem ipsum dolor emut conneit emis xeron. 
    </p>
  </div>
@endsection

