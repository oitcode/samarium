<div class="container-fluid"
    style="background-color: {{ \App\CmsTheme::first()->top_header_bg_color }}; color: {{ \App\CmsTheme::first()->top_header_bg_color }};">
<div class="container p-3 d-none d-md-block">
  <div class="d-flex justify-content-between">
    <div>
      <a href="{{ route('website-home') }}" class="text-decoration-none text-reset">
        <div class="d-flex">
          <div class="bg-warning-rm mr-3">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
          </div>
          <div class="d-flex flex-column justify-content-center bg-info-rm pt-3">
            <h1 class="h4"
                style="
                color:
                  @if (\App\CmsTheme::first())
                    {{ \App\CmsTheme::first()->top_header_text_color }}
                  @else
                    orange
                  @endif
                  ;
                font-family: Arial; font-weight: bold;
                "
            >
              {{ $company->name }}
            </h1>
            <h2 class="h6" style="color: {{ \App\CmsTheme::first()->top_header_text_color }}">
              {{ $company->tagline }}
            </h2>
          </div>
        </div>
      </a>
    </div>
    <div class="d-flex flex-column" style="color: {{ \App\CmsTheme::first()->top_header_text_color }}">
      <div>
        @if (true)
        <div class="mr-4">
          <i class="fas fa-map-marker-alt text-white-rm mr-2"></i>
          <span class="text-white-rm" style="font-family: Arial;">
            {{ $company->address }}
          </span>
        </div>
        @endif
        <div class="mr-4">
          <i class="fas fa-phone text-white-rm mr-2"></i>
          <span class="text-white-rm" style="font-family: Arial;">
            {{ $company->phone }}
          </span>
        </div>
        <div class="mr-4">
          <i class="fas fa-envelope text-white-rm mr-2"></i>
          <span class="text-white-rm" style="font-family: Arial;">
            {{ $company->email }}
          </span>
        </div>
      </div>
      <div class="d-flex mt-3">
        @if ($company->fb_link)
          <div class="mr-3">
            <a href="{{ $company->fb_link }}" class="text-reset" target="_blank">
              <i class="fab fa-facebook text-reset fa-2x mr-2 "></i>
              @if (false)
              Facebook
              @endif
            </a>
          </div>
        @endif
        @if ($company->twitter_link)
          <div class="mr-3">
            <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
              <i class="fab fa-twitter text-white-rm fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->youtube_link)
          <div class="mr-3">
            <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
              <i class="fab fa-youtube text-white-rm fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->insta_link)
          <div class="mr-3">
            <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
              <i class="fab fa-instagram text-white-rm fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->tiktok_link)
          <div class="mr-3">
            <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
              <i class="fab fa-tiktok text-white-rm fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
</div>

@if (false)
{{-- Very top bar --}}
<div class="container-fluid border bg-danger-rm d-none d-md-block"
    style="
    background-color:
        @if (\App\CmsTheme::first())
          {{ \App\CmsTheme::first()->top_header_bg_color }}
        @else
          orange
        @endif
        ;
    color:
        @if (\App\CmsTheme::first())
          {{ \App\CmsTheme::first()->top_header_text_color }}
        @else
          white
        @endif
    ;">
  <div class="pt-3 pb-1 pl-4">

    {{-- Address --}}
    <div class="float-left mr-4">
      <i class="fas fa-map-marker-alt text-white-rm mr-2"></i>
      <span class="text-white-rm" style="font-family: Arial;">
        {{ $company->address }}
      </span>
    </div>

    {{-- Clock --}}
    <div class="float-left">
      <i class="fas fa-clock text-white-rm mr-2"></i>
      <span class="text-white-rm" style="font-family: Arial;">
        Mon - Fri: 09 AM - 05 PM
      </span>
    </div>

    @if ($company->fb_link)
      <div class="float-right mr-3">
        <a href="{{ $company->fb_link }}" class="text-reset" target="_blank">
          <i class="fab fa-facebook text-reset fa-2x mr-2 "></i>
          @if (false)
          Facebook
          @endif
        </a>
      </div>
    @endif
    @if ($company->twitter_link)
      <div class="float-right mr-3">
        <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
          <i class="fab fa-twitter text-white-rm fa-2x mr-2 "></i>
        </a>
      </div>
    @endif

    {{-- Phone --}}
    <div class="float-right mr-4">
      <i class="fas fa-phone text-white-rm mr-2"></i>
      <span class="text-white-rm" style="font-family: Arial;">
        {{ $company->phone }}
      </span>
    </div>

    <div class="clearfix">
    </div>
  </div>
</div>
@endif
