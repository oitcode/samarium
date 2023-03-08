@extends ('cms.base')

@section ('googleAnalyticsTag')
@endsection

@section ('pageTitleTag')
  <title>
    {{ $company->name }}
  </title>
@endsection

@section ('fbOgMetaTags')
<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Home page of {{ $company->name }}" />
<meta property="og:description"        content="All details of {{ $company->name }}" />
<meta property="og:image"              content="{{ asset('storage/' . $company->logo_image_path) }}"/>
@endsection

@section ('content')

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

@if (env('MODULES') == 'bgc')
  @if (\App\Team::where('team_type', 'playing_team')->first())
    <div class="container my-4">
      @include ('partials.team-block-display')
    </div>
  @endif
@endif

<div>
  @livewire ('ecs.contact-component')
</div>

@endsection

