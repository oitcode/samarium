@extends ('website.cms.base')

@if (config('app.site_type') !== 'erp')
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
  
  @section ('pageDescriptionTag')
    <meta name="description" content="{{ $webpage->name }}">
  @endsection
  
  @section ('pageAnnouncer')
    {{-- Notice badge --}}
    @if ($webpage->hasCategory('notice'))
      <div class="container-fluid py-2 border-bottom">
        <div class="container font-weight-bold px-3">
          <div class="d-flex">
            <div class="px-3 py-2 bg-danger text-white o-border-radius-sm o-heading">
              <i class="fas fa-exclamation-circle mr-1"></i>
              Notice
            </div>
          </div>
        </div>
      </div>
    @endif
    @include ('partials.cms.website.page-announcer')
  @endsection
@endif

@section ('content')
  <div>
    @livewire ('cms.website.webpage-display', ['webpage' => $webpage,])
  </div>
@endsection
