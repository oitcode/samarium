@extends ('cms.website.base')

@section ('googleAnalyticsTag')
@endsection

@section ('pageTitleTag')
  @if ($company)
    <title>
      {{ $company->name }}
    </title>
  @endif
@endsection

@section ('fbOgMetaTags')
@if ($company)
  <meta property="og:url"                content="{{ Request::url() }}" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="Home page of {{ $company->name }}" />
  <meta property="og:description"        content="All details of {{ $company->name }}" />
  <meta property="og:image"              content="{{ asset('storage/' . $company->logo_image_path) }}"/>
@endif
@endsection

@section ('content')

@include ('partials.cms.website.newest-notice-flasher')

{{-- Hero/Featured Div --}}
<div class="container-fluid bg-white p-0 py-5" 
  style="
           {{--
           background-image: @if (\App\CmsTheme::first())
             url({{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }})
           @else
             url({{ asset('img/school-5.jpg') }})
           @endif
           ;
           background-size: cover;
           background-repeat: no-repeat;
           background-position: center;
           background-attachment: fixed;
           height: 500px;
           --}}
           "
>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        @if (true)
        <div class="mb-4 px-4">
          @include ('partials.school.school-quick-links-display')
        </div>
        <div class="container mb-4">
          @livewire ('calendar.website.today-display')
        </div>
        @else
        <div class="p-5">
          <h2 class="h1 font-weight-bold text-center text-white">
            {{ $company->name }}
          </h2>
        </div>
        @endif
      </div>
      <div class="col-md-4">
        @livewire ('notice.dashboard.latest-notice-list')
      </div>
    </div>
  </div>

</div>


{{--
|
|
|
| Display the home webpage.
|
|
|
--}}
@if (preg_match("/bgc/i", env('MODULES')))
  {{-- This is temporary workaround for BGC --}} 
  {{-- If BGC --}}
  @if (\App\Team::where('team_type', 'playing_team')->first())
    <div class="container my-4">
      @include ('partials.team.team-block-display')
    </div>
  @endif
@else
  {{-- All other cases --}}
  @if (\App\Webpage::where('name', 'Home')->where('visibility', 'public')->first())
    @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Home')->where('visibility', 'public')->first(),])
  @elseif (\App\Webpage::where('name', 'Post')->where('visibility', 'public')->first())
    @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Post')->where('visibility', 'public')->first(),])
  @else
    @include ('partials.cms.website.home-page-not-set-yet')
  @endif
@endif

@endsection
