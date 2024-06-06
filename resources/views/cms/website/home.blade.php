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

{{-- Latest notice --}}
@if (\App\WebpageCategory::where('name', 'notice')->first())
  @if (count(\App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->get()) > 0)
    @include ('partials.cms.website.newest-notice-flasher-modal')
    @include ('partials.cms.website.newest-notice-flasher')
  @endif
@endif

@if (preg_match("/hfn/i", env('MODULES')))
@if (false)
<div class="container py-3">
  BANNER/CAROUSEL
</div>
@endif
<div class="d-md-none">
  <div class="" style="">
    <div class="row">
      <div class="col-md-6 py-4-rm justify-content-end">
        <img class="img-fluid h-25-rm w-100-rm mx-auto-rm d-block-rm" src="{{ asset('storage/' . $company->logo_image_path) }}"
        style="{{--max-height: 200px;width: 1200px;--}}">
      </div>
    </div>
  </div>
</div>
<div class="container py-3">
  <h2 class="h4 font-weight-bold">
    About us
  </h2>
  {{ $company->brief_description }}
</div>
<div class="container">
  <div class="bg-dark text-white p-3">
  <div class="form-group">
    <div>
    NAME
    </div>
    <input class="form-control" type="text" placeholder="Name" wire:model.defer="writer_name">
    @error('writer_name')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <div>
    EMAIL
    </div>
    <input class="form-control" type="text" placeholder="Email" wire:model.defer="writer_email">
    @error('writer_email')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <div>
    PHONE
    </div>
    <input class="form-control" type="text" placeholder="Phone" wire:model.defer="writer_phone">
    @error('writer_phone')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <div>
    REFERRED BY
    </div>
    <input class="form-control" type="text" placeholder="Referred by" wire:model.defer="writer_referred_by">
    @error('writer_referred_by')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <div>
    ENQUIRY
    </div>
    <textarea class="form-control" rows="3" placeholder="Question" wire:model.defer="enquiry_text"></textarea>
    @error('enquiry_text')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <button class="btn btn-primary btn-block py-2" wire:click="store">
    Submit
  </button>
  @if (false)
  <button class="btn btn-danger">
    About donation
  </button>
  @endif
  </div>
</div>
@if (false)
<div>
  SOME CALL TO ACTION
</div>
@endif
@else
@endif

{{-- Hero/Featured Div --}}
<div class="container-fluid bg-white-rm p-0 py-5" 
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
        <div>
          @livewire ('cms.website.latest-post-list-grid')
        </div>

        @if (\App\Webpage::whereHas('webpageCategories', function ($query) { $query->where('name', 'featured');})->where('visibility', 'public')->count() > 0)
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
        @endif





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
