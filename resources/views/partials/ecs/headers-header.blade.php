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
        ola
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
