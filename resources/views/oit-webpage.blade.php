@extends ('bia')

@section ('pageAnnouncer')
  <div class="continer-fluid o-top-page-banner-rm"
      style="background-image:
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
  ;">
    <div class="o-overlay text-white">
      <div class="container py-5">
      <h1
          style="color:
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->top_header_text_color }}
                @else
                  white
                @endif
                ;
      ">
        {{ $webpage->name }}
      </h1>
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
@elseif ($webpage->name == 'Contact us')
@else
  @if (!is_null($webpage->webpageContents) && count($webpage->webpageContents) > 0)
  
    {{-- To track odd/even content --}}
    @php
      $i = 0;
    @endphp
  
    @foreach ($webpage->webpageContents as $webpageContent)
  
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
              @if ($i % 2 == 0)
                <div class="col-md-6 justify-content-center align-self-center" style="font-size: 1.1em !important;">
                  <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                    {{ $webpageContent->title}}
                  </h2>
                  <p class="text-secondary">
                    {{ $webpageContent->body}}
                  </p>
                </div>
                <div class="col-md-6">
                  <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                </div>
              @else
                <div class="col-md-6">
                  <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                </div>
                <div class="col-md-6 justify-content-center align-self-center" style="font-size: 1.1em !important;">
                  <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                    {{ $webpageContent->title}}
                  </h2>
                  <p class="text-secondary">
                    {{ $webpageContent->body}}
                  </p>
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
@endif

<div class="container bg-white pt-2">
  <h2 class="h2 bg-warning-rm mt-3 mb-1-rm pl-4 text-left text-secondary" style="color: #000; font-family: Arial; font-weight: bold;">
    Any questions?
  </h2>
  @livewire ('ecs.contact-component')
</div>

@endsection
