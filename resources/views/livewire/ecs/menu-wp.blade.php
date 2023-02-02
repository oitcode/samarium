<div class="sticky-top bg-white">

  {{-- Logo and menu --}}

  {{-- BIGGER SCREEN --}}
  <div class="d-none d-md-block">
    <div class="container-fluid bg-white">
      <div class="d-flex justify-content-between">

        <div class="py-3 pl-4">
          <a href="{{ route('website-home') }}" class="text-decoration-none">
            <div class="d-flex">
              <div class="bg-warning-rm mr-3">
                <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
              </div>
              <div class="d-flex flex-column justify-content-center bg-info-rm pt-3">
                <h1 class="h3"
                    style="
                    color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_bg_color }}
                      @else
                        orange
                      @endif
                      ;
                    font-family: Arial; font-weight: bold;
                    "
                >
                  {{ $company->name }}
                </h1>
              </div>
            </div>
          </a>
        </div>

        <div class="py-3">
          @if (true)
          @include ('partials.top-menu-act')
          @endif
        </div>

      </div>
    </div>
  </div>

  {{-- SMALLER SCREEN --}}
  <div class="d-md-none">
    <div class="container-fluid p-0">
      @if (true)
      @include ('partials.site-top-menu-mob')
      @endif
    </div>
  </div>

</div>
