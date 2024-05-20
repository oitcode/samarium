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





        {{--
        |
        | Show a cool grid of pages
        |
        |
        |
        --}}
        <div class="mb-4 px-2">
          <div class="row">
            @foreach (\App\Webpage::whereHas('webpageCategories', function ($query) { $query->where('name', 'featured');})->where('visibility', 'public')->orderBy('webpage_id', 'desc')->limit('4')->get() as $webpage)

              <div class="col-6 mb-1 p-0 pr-1">
                <a href="{{ route('website-webpage-' . $webpage->permalink) }}">
                  <div style="
                    background-image: @if (\App\CmsTheme::first())
                      url({{ asset('storage/' . $webpage->featured_image_path) }})
                    @else
                      url({{ asset('img/school-5.jpg') }})
                    @endif
                    ;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    height: 300px;
                    {{--
                    background-attachment: fixed;
                    --}}
                  ">
                    @if (false)
                    <img src="{{ asset('storage/' . $webpage->featured_image_path) }}" class="mr-3" style="width: 200px; height: 200px;">

                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    @endif

                    <div class="o-overlay p-3-rm h-100 d-flex flex-column justify-content-end">
                      <div class="p-3" style="background-color: rgba(0, 0, 0, 0.5);">
                        <h2 class="text-white h4 font-weight-bold">
                          {{ $webpage->name }}
                        </h2>
                      </div>
                    </div>






                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>





        @if (true)
        <div class="mb-4 px-2">
          @include ('partials.school.school-quick-links-display')
        </div>
        @else
        <div class="p-5">
          <h2 class="h1 font-weight-bold text-center text-white">
            {{ $company->name }}
          </h2>
        </div>
        @endif
      </div>
      <div class="col-md-4 px-2">
        <div class="container mb-4 p-0">
          @livewire ('calendar.website.today-display')
        </div>
        @livewire ('notice.dashboard.latest-notice-list')
        <div class="my-3">
          @livewire ('cms.website.latest-post-list')
        </div>

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
  @if (false)
  {{-- All other cases --}}
  @if (\App\Webpage::where('name', 'Home')->where('visibility', 'public')->first())
    @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Home')->where('visibility', 'public')->first(),])
  @elseif (\App\Webpage::where('name', 'Post')->where('visibility', 'public')->first())
    @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Post')->where('visibility', 'public')->first(),])
  @else
    @include ('partials.cms.website.home-page-not-set-yet')
  @endif
  @endif
@endif

@endsection
