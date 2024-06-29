@extends (env('SITE_TYPE') == 'erp' ? 'ecomm-website.base' : 'cms.website.base' )

@if (env('SITE_TYPE') != 'erp')
@section ('googleAnalyticsTag')
@endsection

@section ('fbOgMetaTags')
<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $webpage->name }}" />
<meta property="og:description"        content="
    @if ($webpage->is_post == 'yes')
      @if ($webpage->getFirstPara())
        {{ $webpage->getFirstPara()->body }}
      @endif
    @else
      {{ $webpage->name }}
    @endif
" />
<meta property="og:image"              content="@if($webpage->featured_image_path){{ asset('storage/' . $webpage->featured_image_path) }}@else{{ asset('storage/' . $company->logo_image_path) }}@endif" />
@endsection

@section ('pageTitleTag')
  <title>{{ $webpage->name }}</title>
@endsection

@section ('googleAnalyticsTag')
@endsection

@section ('pageDescriptionTag')
  <meta name="description" content="{{ $webpage->name }}">
@endsection

@section ('pageAnnouncer')

  {{-- Notice badge --}}
  @if ($webpage->hasCategory('notice'))
    <div class="container mb-0 font-weight-bold px-3">
      <div class="d-flex px-3">
        <div class="p-3 bg-danger text-white mt-3">
          <i class="fas fa-exclamation-circle mr-2"></i>
          Notice
        </div>
      </div>
    </div>
  @endif

  @include ('partials.cms.website.page-announcer')

@endsection
@endif

@section ('content')
  <div class="container p-0 py-4">
    <div class="row">
      <div class="col-md-12 p-0 px-2">
        @livewire ('cms.website.webpage-display', ['webpage' => $webpage,])
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>
@endsection
