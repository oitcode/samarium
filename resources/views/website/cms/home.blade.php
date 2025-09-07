@extends ('website.cms.base')

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

@section ('content')
  @livewire ('cms.website.latest-notice-ticker')
  {{--
  |
  | Carousal component.
  |
  --}}
  @if (false)
    {{-- TODO: Need a better implementation --}}
    @livewire ('carousal-component')
  @endif

  {{--
  |
  | Product filter.
  |
  --}}
  @if (false)
    @livewire ('product.website.product-filter')
    @include ('partials.cms.website.company-info')
  @endif
  
  {{--
  |
  | HFN.
  |
  --}}
  @if (true && has_module('hfn'))
    <div class="container-fluid p-0 o-fade-in" style="
    @if($cmsTheme)
      background-color: {{ $cmsTheme->ascent_bg_color }};
      color: {{ $cmsTheme->ascent_text_color }};
    @endif
    ">
      <div class="p-0">
        <div class="row p-0" style="margin: auto;">
          <div class="col-md-6 p-0">
            @if ($cmsTheme)
              <img class="img-fluid" src="{{ asset('storage/' . $cmsTheme->hero_image_path) }}">
            @endif
          </div>
          <div class="col-md-6 pt-5 px-md-5 pb-5">
            <div class="mb-5">
              @include ('partials.school.school-quick-links-display')
            </div>
            <div class="d-flex-rm flex-column-rm justify-content-center-rm h-100-rm">
              <h1 class="h1 mb-4 o-heading o-ascent-text-color">
                {{ $company->name }}
              </h1>
              <div class="mb-4">
                {{ $company->brief_description }}
              </div>
  
              <div style="
                      @if (false)
                      background-color:
                        @if ($cmsTheme)
                          {{ $cmsTheme->ascent_bg_color }}
                        @else
                          white
                        @endif
                        ;
                      color:
                        @if ($cmsTheme)
                          {{ $cmsTheme->ascent_text_color }}
                        @else
                          #123
                        @endif
                      @endif
                        ;
              ">
                @if (\App\Models\Cms\Webpage\Webpage::where('name', 'Contact us')->orWhere('permalink', '/contact-us')->first())
                  <div class="border-rm" style="{{-- background-color: rgba(0, 0, 0, 0.5) --}}">
                    <a href="{{ \App\Models\Cms\Webpage\Webpage::where('name', 'Contact us')->orWhere('permalink', '/contact-us')->first()->permalink }}"
                        class="btn btn-primary py-3 o-heading text-white h4 badge-pill px-4 o-float-up"
                        style="
                        color:
                          @if ($cmsTheme)
                            {{ $cmsTheme->ascent_text_color }}
                          @else
                            white
                          @endif
                          ;
                        ">
                      Contact us
                    </a>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

  {{--
  |
  | Featured products.
  |
  --}}
  @if (false)
  @livewire ('product.website.featured-product-list')

  {{--
  |
  | Product listing.
  |
  --}}
  <div class="container">
    @foreach (\App\Models\Product\Product::limit(5)->get() as $product)
      @livewire ('product.website.product-listing-display', ['product' => $product,], key(rand()),)
    @endforeach                                                                                                                                      
  </div>
  @endif
  
  @if (true)
  {{--
  |
  | Calendar and latest notice.
  |
  --}}
  @if (false)
  <div class="container-fluid bg-white border py-5">
    <div class="container">
      <div class="row" style="margin: auto;">
        <div class="col-md-8 border-rm p-0">
          @livewire ('calendar.website.upcoming-events-list')
        </div>
        <div class="col-md-4 pt-4 pt-md-0 px-0 px-md-3">
          @livewire ('notice.dashboard.latest-notice-list')
        </div>
      </div>
    </div>
  </div>
  @endif
  
  {{--
  |
  | Show a cool grid of featured webpages
  |
  --}}
  @if ($featuredWebpages != null && count($featuredWebpages) > 0)
  <div class="container pt-3">
    <div class="row mb-4" style="margin: auto;">
      <div class="col-md-8 p-0 border">
        @if (count($featuredWebpages) > 0)
          <div class="row mb-4" style="margin: auto;">
            @foreach ($featuredWebpages as $webpage)
              <div class="col-6 mb-1 p-0 pr-1 border bg-danger"> <a href="{{ route('website-webpage-' . $webpage->permalink) }}">
                  <div style="
                    background-image: @if ($cmsTheme)
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
        @endif
      </div>
    </div>
  </div>
  @endif

  <div class="container-fluid py-5 border-top bg-light-rm px-0" style="background-color: #eee;">
    <div class="container">
      @include ('partials.cms.website.what-we-do')
    </div>
  </div>


  {{--
  |
  | Latest post list and contact form.
  |
  --}}
  <div class="container py-5">
    <div class="row" style="margin: auto;">
      <div class="col-md-12 p-0">
        @livewire ('cms.website.latest-post-list-grid', ['ctaButton' => 'no',])
      </div>
      <div class="col-md-4 px-3">
        @if (false)
        @livewire ('cms.website.contact-component', ['onlyForm' => 'yes',])
        @endif
      </div>
    </div>
  </div>
  
  {{--
  |
  | Temporary workaround for BGC.
  |
  --}}
  @if (has_module('bgc'))
    @if (\App\Models\Team\Team::where('team_type', 'playing_team')->first())
      <div class="container my-4">
        @include ('partials.team.team-block-display')
      </div>
    @endif
  @endif
  @endif

  @if (false)
    {{--
     |
     | Product filter.
     |
     --}}
    @livewire ('product.website.product-filter')

    {{--
     |
     | Company brief info.
     |
     --}}
    @include ('partials.cms.website.company-info')

    {{--
    |
    | Featured products.
    |
    --}}
    @livewire ('product.website.featured-product-list')

    @if (false)
      {{--
      |
      | Product listing.
      |
      --}}
      <div class="container">
        @foreach (\App\Models\Product\Product::limit(5)->get() as $product)
          @livewire ('product.website.product-listing-display', ['product' => $product,], key(rand()),)
        @endforeach                                                                                                                                        
      </div>
    @endif

    {{--
    |
    | Show products for all categories.
    |
    --}}
    @foreach (\App\Models\Product\ProductCategory::all() as $productCategory)
      @if (count($productCategory->products) > 0)
        <div class="container my-5">
          <h2 class="h4 o-heading text-center">
            {{ $productCategory->name }}
          </h2>

          <div class="row" style="margin: auto;">
            @foreach ($productCategory->products as $product)
              <div class="col-md-4 p-3">
                @livewire ('ecomm-website.product-list-display', ['product' => $product,])
              </div>
            @endforeach
          </div>
        </div>
      @endif
    @endforeach
  @endif

  {{--
  |
  | Testimonial section.
  |
  --}}
  <div class="container-fluid py-5 border-rm bg-light-rm text-white" style="background-color: #001a2a;">
    <div class="container">
      @livewire ('testimonial.website.testimonial-list')
    </div>
  </div>

@endsection
