<div class="sticky-top-rm bg-white border-bottom">

  {{-- Show in bigger screens --}}
  <div class="container-fluid p-0 bg-warning-rm d-none d-md-block">
    <div class="container-fluid bg-danger text-white border-bottom">
      <div class="container py-1">
        <div class="d-flex justify-content-between">
          {{-- Left side --}}
          <div>
            <i class="fas fa-phone mr-1"></i>
            <strong>
              {{ $company->phone }}
            </strong>
          </div>
          {{-- Right side --}}
          <div>
            <div class="d-flex">
              @if (false)
              <div class="px-3">
                <i class="fas fa-user mr-1"></i>
                Sign in
              </div>
              <div class="px-3">
                <i class="fas fa-lock mr-1"></i>
                Create Account
              </div>
              @endif
              <div class="px-3" style="font-size: 1.1rem;">
                @if ($company->fb_link)
                  <a href="{{ $company->fb_link }}" class="text-reset" target="_blank">
                    <i class="fab fa-facebook fa-3x-rm mr-3"></i>
                  </a>
                @endif
                @if ($company->twitter_link)
                  <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
                    <i class="fab fa-twitter fa-3x-rm mr-3"></i>
                  </a>
                @endif
                @if ($company->insta_link)
                  <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
                    <i class="fab fa-instagram fa-3x-rm mr-3"></i>
                  </a>
                @endif
                @if ($company->youtube_link)
                  <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
                    <i class="fab fa-youtube fa-3x-rm mr-3"></i>
                  </a>
                @endif
                @if ($company->tiktok_link)
                  <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
                    <i class="fab fa-tiktok fa-3x-rm mr-3"></i>
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-2">
      <div class="d-flex justify-content-between h-100 bg-info-rm pl-2">


        <a href="{{ route('website-home') }}" class="text-decoration-none">
        <div class="d-flex">
          <div class="mr-4 d-flex flex-column justify-content-center">
              @if (true)
              <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid-rm mt-4" style="max-width: 50px; max-height: 50px;">
              @endif
          </div>
          <div class="mt-3 d-none d-md-block mr-3">
            <h1 class="mt-2 text-dark" style="font-weight: bold; font-size: 1.5rem; text-shadow: 0px 1px, 1px 0px, 1px 0px;">
              {{ $company->name }}
            </h1>
            @if (true)
            <div class="text-secondary">
              {{ $company->tagline }}
            </div>
            @endif
          </div>
        </div>
        </a>

        @if (false)
        <div class="flex-grow-1 d-flex justify-content-center">
          <div class="d-flex flex-column justify-content-center">
            <div>
              <input type="text" class="py-2 badge-pill-rm rounded shadow-rm mr-3" style="width: 400px;" placeholder="Search for product or a category">
              <button class="btn btn-outline-danger badge-pill">
                Search
              </button>
            </div>
          </div>
        </div>
        @endif
  
        <div class="px-5 h-100-rm mt-3-rm bg-primary-rm border-rm border-left-primary text-white-rm"
            style="{{--background-color: #004;font-size: 1.2rem; font-weight: bold;--}} ">

          {{-- Shopping cart badge (checkout link) --}}
          @if (true)
            <div class="d-flex flex-column justify-content-center h-100 bg-danger-rm text-white-rm p-5-rm o-darker">
              @livewire ('ecomm-website.shopping-cart-badge')
            </div>
          @else
            TEST
          @endif
        </div>
  
  
      </div>
    </div>

    {{-- Product category menu --}}
    <div class="container-fluid border-top border-bottom bg-light text-white">
      <div class="container" style="font-size: 1.5rem; font-weight: bold;">
        @if (false)
          <div class="d-flex flex-column justify-content-center h-100">
            @include ('partials.ecomm-website.top-menu')
          </div>
        @endif
      </div>
    </div>

  </div>


  {{-- Show in smaller screens --}}
  <div class="container-fluid p-0 bg-warning-rm d-md-none">
    <div class="d-flex justify-content-between p-3">
      <a href="{{ route('website-home') }}" class="text-decoration-none">
        <div class="d-flex">
          <div class="mr-4 d-flex flex-column justify-content-center">
              <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 40px;">
          </div>
          <div class="mr-3">
            <h1 class="h6 text-dark" style="font-weight: bold;">{{ $company->name }}</h1>
            <div class="text-secondary">
              {{ $company->tagline }}
            </div>
          </div>
        </div>
      </a>

      {{-- Shopping cart badge (checkout link) --}}
      @if (true)
        <div class="d-flex flex-column justify-content-center h-100">
          @livewire ('ecomm-website.shopping-cart-badge')
        </div>
      @else
        TEST
      @endif
    </div>

    <div>
      @if (true)
        <div class="d-flex flex-column justify-content-center h-100 bg-light">
          @include ('partials.ecomm-website.top-menu')
        </div>
      @endif
    </div>
  </div>

</div>
