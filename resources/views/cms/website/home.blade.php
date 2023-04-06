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
  <div class="container-fluid bg-dark-rm text-white p-0 d-none d-md-block" style="background-color: brown;">
    <div class="container" style="font-size: 1.3rem; white-space: nowrap; overflow: hidden;">
      <div class="o-ltr py-3 ">
        <div class="d-inline mr-5">
          <a href="{{ route('website-webpage-' . \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->orderBy('webpage_id', 'desc')->first()->permalink) }}"
              class="text-reset" style="">
            {{ \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->orderBy('webpage_id', 'desc')->first()->name }}
          </a>
        </div>
      </div>
    </div>
  </div>
  @endif
@endif

@if (false)
{{-- Hero/Featured image --}}
@if (\App\CmsTheme::first())
<div class="container-fluid bg-light p-0 d-none d-md-block" 
  style="background-image: @if (\App\CmsTheme::first())
                             url({{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }})
                           @else
                             url({{ asset('img/school-5.jpg') }})
                           @endif
                           ;
                           background-size: cover;
                           background-repeat: no-repeat;
                           background-position: center;
                           height: 700px;">
  <div class="o-overlay py-5 h-100">
  </div>
</div>
@endif
@endif

@if (preg_match("/bgc/i", env('MODULES')))
  @if (\App\Team::where('team_type', 'playing_team')->first())
    <div class="container my-4">
      @include ('partials.team.team-block-display')
    </div>
  @endif
@endif

@if (\App\Webpage::where('name', 'Home')->where('visibility', 'public')->first())
  @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Home')->where('visibility', 'public')->first(),])
@else
  @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Post')->where('visibility', 'public')->first(),])
@endif

<div>
  @if (true)
  @livewire ('cms.website.contact-component')
  @endif
</div>

@endsection
