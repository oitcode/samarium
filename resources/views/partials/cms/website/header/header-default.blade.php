<div class="p-0 px-0" >
  {{-- Show in bigger screens --}}
  <div class="container-fluid d-none d-md-block border-bottom o-nav-menu-color">
    <div class="container text-right py-3" style="font-size: 1rem;">
      <div class="d-flex justify-content-between">
        <div>
          <i class="fas fa-envelope mr-1"></i>
          {{ $company->email }}
        </div>
        <div>
          <i class="fas fa-phone ml-4 mr-1"></i>
          {{ $company->phone }}
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid d-none d-md-block o-header-color">
    <div class="container">
      <div class="d-flex justify-content-between">
        <div>
          <div class="d-flex justify-content-center h-100 pl-2">
            <a href="{{ route('website-home') }}" class="text-decoration-none">
            <div class="d-flex py-3">
              <div class="mr-0 d-flex flex-column justify-content-center">
                  <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="max-width: 100px; max-height: 100px;">
              </div>
            </div>
            </a>
            <div class="d-flex flex-grow-1">
              <div class="d-flex flex-column justify-content-center flex-grow-1 px-4">
                <h1 class="h5 font-weight-bold my-1" style="font-family: Mono;">
                  @if ($company->short_name)
                    {{ \Illuminate\Support\Str::limit($company->short_name, 100, $end=' ...') }}
                  @else
                    {{ \Illuminate\Support\Str::limit($company->name, 100, $end=' ...') }}
                  @endif
                </h1>
                <div class="w-100">
                  <div>
                    {{ $company->tagline }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <div class="h-100 d-flex flex-column justify-content-center">
            <a href="/contact-us" class="btn btn-primary-rm btn-lg o-ascent-color o-border-radius-sm o-bounce-up-down">
              Contact us
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
