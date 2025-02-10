@extends ('cms.website.base')

{{--
|--------------------------------------------------------------------------
| Home page of our website
|--------------------------------------------------------------------------
|
| This is the blade file of homepage of our website. This is the landing
| page of the website.
|
| Please modify this file according to your needs.
|
--}}

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

@if ($company)
  @section ('content')




    <div class="container">
      @foreach (\App\Product::all() as $product)
        @livewire ('product.website.product-listing-display', ['product' => $product,], key(rand()),)
      @endforeach
    </div>















    {{--
    |--------------------------------------------------------------------------
    | Carousal component.
    |--------------------------------------------------------------------------
    |
    --}}
    @if (false)
    @livewire ('carousal-component')
    @endif
    
    
    {{--
    |--------------------------------------------------------------------------
    | HFN.
    |--------------------------------------------------------------------------
    |
    --}}
    @if (has_module('hfn'))
      <div class="container-fluid p-0 o-fade-in" style="
      @if(\App\CmsTheme::first())
        background-color: {{ \App\CmsTheme::first()->ascent_bg_color }};
        color: {{ \App\CmsTheme::first()->ascent_text_color }};
      @endif
      ">
        <div class="p-0">
          <div class="row p-0" style="margin: auto;">
            <div class="col-md-6 p-0">
              @if (\App\CmsTheme::first())
                <img class="img-fluid" src="{{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }}">
              @endif
            </div>
            <div class="col-md-6 pt-5 px-md-5 pb-5 pb-md-0">
              @include ('partials.school.school-quick-links-display')
              <div class="d-flex flex-column justify-content-center h-100">
                <h1 class="h1">
                  {{ $company->name }}
                </h1>
                <div class="mb-3">
                  {{ $company->brief_description }}
                </div>
    
                <div style="
                        background-color:
                          @if (\App\CmsTheme::first())
                            {{ \App\CmsTheme::first()->ascent_bg_color }}
                          @else
                            orange
                          @endif
                          ;
                        color:
                          @if (\App\CmsTheme::first())
                            {{ \App\CmsTheme::first()->ascent_text_color }}
                          @else
                            white
                          @endif
                          ;
                ">
                  <div class="border" style="background-color: rgba(0, 0, 0, 0.5)">
                    <a href="{{ \App\Webpage::where('name', 'Contact us')->orWhere('permalink', '/contact-us')->first()->permalink }}"
                        class="btn btn-block py-3"
                        style="
                        color:
                          @if (\App\CmsTheme::first())
                            {{ \App\CmsTheme::first()->ascent_text_color }}
                          @else
                            white
                          @endif
                          ;
                        ">
                      Contact us
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    
    {{--
    |--------------------------------------------------------------------------
    | Calendar and latest notice.
    |--------------------------------------------------------------------------
    |
    --}}
    <div class="container-fluid bg-white border pt-4 pb-4">
      <div class="container">
        <div class="row" style="margin: auto;">
          <div class="col-md-8 border p-0">
            @livewire ('calendar.website.upcoming-events-list')
          </div>
          <div class="col-md-4 pt-4 pt-md-0 px-0 px-md-3">
            @livewire ('notice.dashboard.latest-notice-list')
          </div>
        </div>
      </div>
    </div>
    
    {{--
    |--------------------------------------------------------------------------
    | Hero/Featured Div
    |--------------------------------------------------------------------------
    |
    --}}
    <div class="container-fluid p-0 pt-3">
      <div class="container">
        <div class="row mb-4" style="margin: auto;">
          <div class="col-md-8 p-0 border">
    
            {{--
            |
            | Show a cool grid of pages
            |
            --}}
            @if (\App\Webpage::whereHas('webpageCategories', function ($query) { $query->where('name', 'featured');})->where('visibility', 'public')->count() > 0)
            <div class="mb-4 px-2">
              <div class="row">
                @foreach (\App\Webpage::whereHas('webpageCategories', function ($query) { $query->where('name', 'featured');})->where('visibility', 'public')->orderBy('webpage_id', 'desc')->limit('4')->get() as $webpage)
    
                  <div class="col-6 mb-1 p-0 pr-1 border bg-danger"> <a href="{{ route('website-webpage-' . $webpage->permalink) }}">
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
                      ">
                        <div class="o-overlay h-100 d-flex flex-column justify-content-end">
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
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </div>

    <div class="container pb-4">
      <div class="row" style="margin: auto;">
        <div class="col-md-8">
          @livewire ('cms.website.latest-post-list-grid', ['ctaButton' => 'no',])
        </div>
        <div class="col-md-4">
          @livewire ('cms.website.contact-component', ['onlyForm' => 'yes',])
        </div>
      </div>
    </div>
    
    {{--
    |
    | Temporary workaround for BGC.
    |
    --}}
    @if (has_module('bgc'))
      @if (\App\Team::where('team_type', 'playing_team')->first())
        <div class="container my-4">
          @include ('partials.team.team-block-display')
        </div>
      @endif
    @endif
  
  @endsection
@endif
