{{-- Very top bar --}}
<div class="container-fluid border bg-danger-rm d-none d-md-block" style="background-color: #d9f1ff;">
  <div class="py-3 pl-4">

    {{-- Address --}}
    <div class="float-left mr-4">
      <i class="fas fa-map-marker-alt text-primary mr-2"></i>
      <span class="text-secondary" style="font-family: Arial;">
        Online shopping Nepal
      </span>
    </div>

    {{-- Clock --}}
    <div class="float-left">
      <i class="fas fa-clock text-primary mr-2"></i>
      <span class="text-secondary" style="font-family: Arial;">
        Online store for electronics products
      </span>
    </div>


    {{-- Linkedin --}}
    <div class="float-right mr-3">
      <i class="fab fa-linkedin text-primary mr-2 fa-2x"></i>
    </div>

    @if (false)
    {{-- Twitter Link --}}
    <div class="float-right mr-3">
      <i class="fab fa-twitter text-primary mr-2 fa-2x"></i>
    </div>
    @endif

    {{-- FB Link --}}
    <div class="float-right mr-3">
      <i class="fab fa-facebook text-primary mr-2 fa-2x"></i>
    </div>

    {{-- Phone --}}
    <div class="float-right mr-4">
      <i class="fas fa-phone text-primary mr-2"></i>
      <span class="text-secondary" style="font-family: Arial;">
        {{ $company->phone }}
      </span>
    </div>


    <div class="clearfix">
    </div>
  </div>
</div>


@if (false)
<div class="container-fluid border bg-light d-none d-md-block py-2">
    <div class="float-right mr-5 mt-2" style="font-size: 1rem; font-weight: bold;">
      <div class="d-flex justify-content-center h-100">
        <div class="justify-content-center h-100 align-self-center text-center text-secondary">
          <span class="bad badge-pill badge-success mr-3">
            Call
          </span>
          <i class="fas fa-phone mr-3"></i>
          {{ $company->phone }}
        </div>
      </div>
    </div>

    @if ($company->insta_link)
      <a href="{{ $company->insta_link }}" target="_blank">
        <div class="float-right mr-3 h-100" style="font-size: 1.5rem; font-weight: bold;">
          <div class="d-flex justify-content-center h-100">
            <div class="justify-content-center h-100 align-self-center text-center">
              <span class="" style="font-size: 1.8rem; font-weight:bold;">
                <i class="fab fa-instagram mr-3 fa-2x-rm text-danger" style="font-size: 2.5rem;"></i>
              </span>
            </div>
          </div>
        </div>
      </a>
    @endif

    @if ($company->fb_link)
      <a href="{{ $company->fb_link }}" target="_blank">
        <div class="float-right mr-3 h-100" style="font-size: 1.5rem; font-weight: bold;">
          <div class="d-flex justify-content-center h-100">
            <div class="justify-content-center h-100 align-self-center text-center">
              <span class="" style="font-size: 1.8rem; font-weight:bold;">
                <i class="fab fa-facebook text-primary fa-2x-rm" style="font-size: 2.5rem;"></i>
              </span>
            </div>
          </div>
        </div>
      </a>
    @endif

    @if ($company->twitter_link)
      <a href="{{ $company->twitter_link }}" target="_blank">
        <div class="float-right mr-3 h-100" style="font-size: 1.5rem; font-weight: bold;">
          <div class="d-flex justify-content-center h-100">
            <div class="justify-content-center h-100 align-self-center text-center">
              <span class="" style="font-size: 1.8rem; font-weight:bold;">
                <i class="fab fa-twitter mr-3 fa-2x text-info"></i>
              </span>
            </div>
          </div>
        </div>
      </a>
    @endif

    @if ($company->youtube_link)
      <a href="{{ $company->youtube_link }}" target="_blank">
        <div class="float-right mr-3 h-100" style="font-size: 1.5rem; font-weight: bold;">
          <div class="d-flex justify-content-center h-100">
            <div class="justify-content-center h-100 align-self-center text-center">
              <span class="" style="font-size: 1.8rem; font-weight:bold;">
                <i class="fab fa-youtube mr-3 fa-2x text-danger"></i>
              </span>
            </div>
          </div>
        </div>
      </a>
    @endif

    @if ($company->tiktok_link)
      <a href="{{ $company->tiktok_link }}" target="_blank">
        <div class="float-right mr-3 h-100" style="font-size: 1.5rem; font-weight: bold;">
          <div class="d-flex justify-content-center h-100">
            <div class="justify-content-center h-100 align-self-center text-center">
              <span class="" style="font-size: 1.8rem; font-weight:bold;">
                <i class="fab fa-tiktok mr-3 fa-2x text-danger"></i>
              </span>
            </div>
          </div>
        </div>
      </a>
    @endif

    <div class="clearfix">
    </div>
</div>
@endif
