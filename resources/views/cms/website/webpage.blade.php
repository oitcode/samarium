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
    <div class="py-3 bg-danger text-white font-weight-bold">
      <div class="container h4 mb-0 font-weight-bold">
        <i class="fas fa-exclamation-circle mr-2"></i>
        Notice
      </div>
    </div>
  @endif

  @if ($webpage->is_post != 'yes' && $webpage->featured_image_path == null)
  <div class="container o-top-page-banner-rm bg-success-rm mb-0 bg-danger-rm p-0 py-5-rm"
      style= "
      background-image: @if (\App\CmsTheme::first())
        url({{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }})
      @else
        url({{ asset('img/school-5.jpg') }})
      @endif
      ;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      {{--
      background-attachment: fixed;
      height: 500px;
      --}}

  ;">
    <div class="o-overlay text-white-rm h-100" style="
      padding-top: 50px;
      padding-bottom: 50px;
    ">
      <div class="container pb-3 pt-4 @if ($webpage->is_post == 'yes') border-left-rm border-right-rm @else @endif bg-primary-rm">
      <h1 class="h3 font-weight-bold"
          style="
            @if (false && $webpage->is_post == 'yes')
              color: #000;
            @else
              @if (true || ! $webpage->hasCategory('notice'))
                color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_text_color }}
                      @else
                        white
                      @endif
              @endif
            @endif
          ;">
        {{ $webpage->name }}
      </h1>
      @if ($webpage->is_post == 'yes')
        <div class="d-flex mt-4 text-white-rm"
            style="
                @if (true || ! $webpage->hasCategory('notice'))
                  color:
                        @if (\App\CmsTheme::first())
                          {{ \App\CmsTheme::first()->ascent_text_color }}
                        @else
                          black
                        @endif
                        ;
                @endif
            ">
          <div class="mr-4">
            <i class="far fa-clock text-primary-rm mr-1"></i>
            <span class="mr-1">
              Published: 
            </span>
            {{ $webpage->created_at->toDateString() }}
            @if (true)
            |
            {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
            @endif
          </div>
          <div class="pl-4 border-left">
            @if (false)
            <span class="mr-1">
              Tags
            </span>
            @endif
            @foreach ($webpage->webpageCategories as $webpageCategory)
              <span class="badge badge-light mr-2 p-2">
                {{ $webpageCategory->name }}
              </span>
            @endforeach
          </div>
        </div>
      @endif
      </div>
    </div>
  </div>
  @endif


@endsection
@endif

@section ('content')
  <div class="container p-0">
    <div class="row">
      <div class="col-md-12">
        {{-- Featured image --}}
        <div class="" style="{{-- background-image: linear-gradient(to right, white 0%, white 25%, {{ env('OC_SELECT_COLOR') }} 25%, {{ env('OC_SELECT_COLOR') }} 100%); --}}">
          @if ($webpage->featured_image_path)
            <div class="row">
              <div class="col-md-6 py-4 justify-content-end">
                <div class="" style="
                  background-image: url({{ asset('storage/' . $webpage->featured_image_path) }});
                  {{--
                  background-size: 100% 100%;
                  --}}
                  background-size: 100% 100%;
                  background-repeat: no-repeat;
                  background-position: top left;
                  height: 500px;
                  {{--
                  background-attachment: fixed;
                  background-color: green;
                  --}}
                ">
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                </div>
                @if (false)
                <img class="img-fluid h-25-rm w-100-rm mx-auto-rm d-block-rm" src="{{ asset('storage/' . $webpage->featured_image_path) }}" alt="{{ $webpage->name }}"
                style="{{--max-height: 200px;width: 1200px;--}}">
                @endif
              </div>
              <div class="col-md-6 bg-danger-rm d-flex flex-column justify-content-center">
                <div class="mb-4-rm border-rm p-3 py-5 shadow-rm bg-dark-rm text-white-rm o-overlay-rm">
                  <h1 class="h2 font-weight-bold text-center text-white-rm" style="{{--font-family: Mono;--}}">
                    {{ strtoupper($webpage->name) }}
                  </h1>
                </div>
              </div>
            </div>
          @else
          @endif
        </div>
        @livewire ('cms.website.webpage-display', ['webpage' => $webpage,])
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>
@endsection
