{{-- Very top bar --}}
<div class="container-fluid border bg-danger-rm d-none d-md-block" style="background-color: {{ \App\CmsTheme::first()->top_header_color }};">
  <div class="pt-3 pb-1 pl-4">

    {{-- Address --}}
    <div class="float-left mr-4">
      <i class="fas fa-map-marker-alt text-white mr-2"></i>
      <span class="text-white" style="font-family: Arial;">
        {{ $company->address }}
      </span>
    </div>

    {{-- Clock --}}
    <div class="float-left">
      <i class="fas fa-clock text-white mr-2"></i>
      <span class="text-white" style="font-family: Arial;">
        Mon - Fri: 09 AM - 05 PM
      </span>
    </div>

    @if ($company->fb_link)
      <div class="float-right mr-3">
        <a href="{{ $company->fb_link }}" target="_blank">
          <i class="fab fa-facebook text-white fa-2x mr-2 "></i>
        </a>
      </div>
    @endif
    @if ($company->twitter_link)
      <div class="float-right mr-3">
        <a href="{{ $company->twitter_link }}" target="_blank">
          <i class="fab fa-twitter text-white fa-2x mr-2 "></i>
        </a>
      </div>
    @endif

    {{-- Phone --}}
    <div class="float-right mr-4">
      <i class="fas fa-phone text-white mr-2"></i>
      <span class="text-white" style="font-family: Arial;">
        {{ $company->phone }}
      </span>
    </div>

    <div class="clearfix">
    </div>
  </div>
</div>
