@extends ('bia')

@section ('fbOgMetaTags')
<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $webpage->name }}" />
<meta property="og:description"        content="{{ $webpage->name }}" />
<meta property="og:image"              content="
    @if ($webpage->featured_image_path)
      {{ asset('storage/' . $webpage->featured_image_path) }}
    @else
      {{ asset('storage/' . $company->logo_image_path) }}
    @endif
"/>
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
  <div class="continer-fluid o-top-page-banner-rm"
      style="
      @if ($webpage->is_post == 'yes')
      @else
        background-image:
            linear-gradient(to right,
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->top_header_bg_color }}
              @else
                orange
              @endif
            ,
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->top_header_bg_color }}
              @else
                orange
              @endif
            )
      @endif
  ;">
    <div class="o-overlay text-white-rm">
      <div class="container py-5">
      <h1
          style="
            @if ($webpage->is_post == 'yes')
              color: #005;
            @else
                color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->top_header_text_color }}
                      @else
                        white
                      @endif
            @endif
          ;">
        {{ $webpage->name }}
      </h1>
      @if ($webpage->is_post == 'yes')
        <div class="">
          <i class="fas fa-clock mr-1"></i>
          {{ $webpage->created_at->toDateString() }}
          |
          {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'nepali')  }}
        </div>
      @endif
      @if (false)
      Home/AboutUs
      @endif
      </div>
    </div>
  </div>
@endsection

@section ('content')

@if ($webpage->name == 'Gallery')
  <div class="container-fluid">
    <div class="container py-4">
      @if (\App\Gallery::all() != null && count(\App\Gallery::all()) > 0)
          @foreach (\App\Gallery::all() as $gallery)
            <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
              {{ $gallery->name }}
            </h2>
            <div class="row">
            @foreach ($gallery->galleryImages as $galleryImage)
              <div class="col-md-3 mb-3 p-3 border">
                <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="img-fluid">
              </div>
            @endforeach
            </div>
          @endforeach
        </div>
      @else
        <span class="text-danger">
          No gallery to show
        </span>
      @endif
    </div>
  </div>
@elseif ($webpage->name == 'News')
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'Teams')
  @if (\App\Team::first())
    <div class="container my-4">
      @include ('partials.team-block-display')
    </div>
  @endif
@elseif ($webpage->name == 'Sponsors')
  @if (\App\Team::where('name', 'Sponsors')->first())
    <div class="container my-4">
      @include ('partials.team-display', ['team' => \App\Team::where('name', 'Sponsors')->first(),])
    </div>
  @endif
@elseif ($webpage->name == 'Organizing Committee')
  @if (\App\Team::where('name', 'Organizing Committee')->first())
    <div class="container my-4">
      @include ('partials.team-display', ['team' => \App\Team::where('name', 'Organizing Committee')->first(),])
    </div>
  @endif
@elseif ($webpage->name == 'Contact us')
  @if (\App\Team::where('name', 'Quick Contacts')->first())
    <div class="container my-4">
      @include ('partials.team-display', ['team' => \App\Team::where('name', 'Quick Contacts')->first(),])
    </div>
  @endif
@elseif ($webpage->name == 'Calendar')
  @livewire ('school.cms.calendar-component')
{{--
@elseif ($webpage->name == 'Fixtures')
  @livewire ('school.cms.calendar-component')
--}}
@else
  @if ($webpage->is_post == 'yes')
    <div class="container my-2 py-2 border-top border-bottom">
      <h3 class="h5">
        Share this article
      </h3>
      <div class="d-flex">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
          <i class="fab fa-facebook fa-2x"></i>
        </a>
        @if (false)
        <button class="btn mr-3">
          <i class="fab fa-twitter fa-2x"></i>
        </button>
        <button class="btn mr-3">
          <i class="fab fa-whatsapp fa-2x"></i>
        </button>
        <button class="btn mr-3">
          <i class="fab fa-viber fa-2x"></i>
        </button>
        @endif
      </div>
    </div>
  @endif

  @if (!is_null($webpage->webpageContents) && count($webpage->webpageContents) > 0)
  
    {{-- To track odd/even content --}}
    @php
      $i = 0;
    @endphp
  
    @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
  
      <div class="container-fluid bg-white p-0 border-rm" 
          style="font-size: 1.2em;
            {{--
            @if ($i % 2 == 1 )
              /* background-image:url({{ asset('img/cool-2.jpg') }}); */
            @else
              background-image:url({{ asset('img/cool-4.jpg') }});
            @endif
              background-size: cover;
              background-position: center;
              --}}
          ">
  
  
          <div class="container py-5">
            <div class="row d-flex">
              
                
                @if (true || $i % 2 == 0)
                <div class="
                    @if ($webpageContent->video_link || $webpageContent->image_path)
                        col-md-6
                    @else
                        col-md-8
                    @endif
                    justify-content-center align-self-center" style="font-size: 1.1em !important;">
                  @if ($webpageContent->title)
                    <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                      {{ $webpageContent->title}}
                    </h2>
                  @endif
                  @if ($webpageContent->body)
                    <p class="text-secondary">
                      {{ $webpageContent->body}}
                    </p>
                  @endif
                </div>
                <div class="
                  @if ($webpageContent->image_path && (! $webpageContent->video_link && ! $webpageContent->title && ! $webpageContent->description))
                        col-md-12
                  @else
                    col-md-6
                  @endif
                ">
                  @if ($webpageContent->image_path)
                    <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                  @endif
                </div>
                @if ($webpageContent->video_link)
                  <div class="col-md-12">
                     <iframe class="w-100" {{-- width="560" --}} height="315" src="https://www.youtube.com/embed/{{ $webpageContent->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                  </div>
                @endif
              @else
                <div class="col-md-6">
                  @if ($webpageContent->image_path)
                    <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                  @endif
                </div>
                <div class="col-md-6 justify-content-center align-self-center" style="font-size: 1.1em !important;">
                  @if ($webpageContent->title)
                    <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                      {{ $webpageContent->title}}
                    </h2>
                  @endif
                  @if ($webpageContent->body)
                    <p class="text-secondary">
                      {{ $webpageContent->body}}
                    </p>
                  @endif
                </div>
              @endif
            </div>
          </div>
  
      </div>
  
      @php
        $i++;
      @endphp
  
    @endforeach
  @else
    <div class="container py-4 d-flex">
      @if (false)
      <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
      @endif
      <h2 class="mt-3 text-secondary">
        <i class="fas fa-exclamation-circle mr-2 text-danger"></i>
        Content is coming soon.
      </h2>
    </div>
  @endif
  @if ($webpage->is_post == 'yes')
    <div class="container my-2 py-2 border-top border-bottom">
      <h3 class="h5">
        Share this article
      </h3>
      <div class="d-flex">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
          <i class="fab fa-facebook fa-2x"></i>
        </a>
        @if (false)
        <button class="btn mr-3">
          <i class="fab fa-twitter fa-2x"></i>
        </button>
        <button class="btn mr-3">
          <i class="fab fa-whatsapp fa-2x"></i>
        </button>
        <button class="btn mr-3">
          <i class="fab fa-viber fa-2x"></i>
        </button>
        @endif
      </div>
    </div>
  @endif
@endif

<div class="container bg-white pt-2">
  <h2 class="h2 bg-warning-rm mt-3 mb-1-rm pl-4 text-left text-secondary" style="color: #000; font-family: Arial; font-weight: bold;">
    Any questions?
  </h2>
  @livewire ('ecs.contact-component')
</div>

@endsection
