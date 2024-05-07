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

{{-- Notifications/post displayer  --}}
@if (\App\WebpageCategory::where('name', 'notice')->first())
  @if (count(\App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->get()) > 0)
  <a href="{{ route('website-webpage-' . \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->orderBy('webpage_id', 'desc')->first()->permalink) }}"
      class="text-reset text-decoration-none" style="">
    <div class="container-fluid bg-dark-rm text-danger p-0" style="background-color: #fdd;">
      <div class="container" style="font-size: 1.3rem; white-space: nowrap; overflow: hidden;">
        <div class="o-ltr py-3 ">
          <div class="d-inline mr-5">
              <span class="badge badge-pill badge-light">
                Notice
              </span>
              {{ \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->orderBy('webpage_id', 'desc')->first()->name }}
          </div>
        </div>
      </div>
    </div>
  </a>
  @endif
@endif

{{-- Hero/Featured image --}}
@if (\App\CmsTheme::first())
{{-- Show in bigger screens --}}
<div class="container-fluid bg-light p-0 d-none-rm d-md-block-rm" 
  style="
           {{--
           background-image: @if (\App\CmsTheme::first())
             url({{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }})
           @else
             url({{ asset('img/school-5.jpg') }})
           @endif
           ;
           --}}
           background-size: cover;
           background-repeat: no-repeat;
           background-position: center;
           {{--
           background-attachment: fixed;
           height: 500px;
           --}}
           ">
  <div class="o-overlay py-5 h-100">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          @if (true)
          <div class="mb-4 px-4">
            @include ('partials.school.school-quick-links-display')
          </div>
          <div class="container mb-4-rm">
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

</div>

@endif

@if (preg_match("/bgc/i", env('MODULES')))
  {{-- If BGC --}}
  @if (\App\Team::where('team_type', 'playing_team')->first())
    <div class="container my-4">
      @include ('partials.team.team-block-display')
    </div>
  @endif
@elseif (preg_match("/school/i", env('MODULES')))
  {{-- If school --}}
  @if (false)
  <div class="container my-4">
    @include ('partials.school.school-quick-links-display')
  </div>
  <div class="container mb-4">
    @livewire ('calendar.website.today-display')
  </div>
  @endif
@else
  {{-- All other cases --}}
  @if (\App\Webpage::where('name', 'Home')->where('visibility', 'public')->first())
    @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Home')->where('visibility', 'public')->first(),])
  @elseif (\App\Webpage::where('name', 'Post')->where('visibility', 'public')->first())
    @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Post')->where('visibility', 'public')->first(),])
  @else
    <div class="container-fluid py-4 border bg-danger text-white">
      <div class="container">
        <div class="h3">
          <i class="fas fa-exclamation-circle mr-2"></i>
          Home page not set yet. Please set up the home page.
        </div>
      </div>
    </div>
  @endif
@endif

<div>
  @if (false)
  @livewire ('cms.website.contact-component')
  @endif
</div>

@endsection
