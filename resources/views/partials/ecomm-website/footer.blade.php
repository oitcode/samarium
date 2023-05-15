<div>

  @if (true)
  <div class="container-fluid bg-dark text-white py-5">
    <div class="container">
      <div class="d-flex">
        <div class="mr-5">
          <h2 class="font-weight-bold" style="font-family: Mono;">
            Thanks for shopping
          </h2>
        </div>
        @if (false)
        <div>
          <button class="btn btn-success" style="font-size: 1.3rem;">
            SIGN UP FOR FREE
            <i class="fas fa-arrow-right ml-1"></i>
          </button>
        </div>
        @endif
      </div>
    </div>
  </div>
  @endif

  <div class="container-fluid py-3">
    <div class="container">
      <div class="d-flex justify-content-center">
        <div>
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 100px;">
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-3-rm bg-danger-rm">
    <div class="container">
      <div class="d-flex justify-content-center">
        <div>
          <div>
            <h2 style="font-family: Mono;">
              {{ $company->name }}
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-3">
    <div class="container">
      <div class="d-flex justify-content-center">

        <div class="mr-3">
          <i class="fas fa-map-marker-alt"></i>
          {{ $company->address }}
        </div>

        <div class="mr-3">
          <i class="fas fa-phone"></i>
          {{ $company->phone }}
        </div>

      </div>
    </div>
  </div>

  @if (false)
  <div class="container-fluid py-3">
    <div class="container">
      <div class="d-flex justify-content-center">

        @if ($company->fb_link)
          <a href="{{ $company->fb_link }}" class="text-reset" target="_blank">
            <i class="fab fa-facebook fa-3x mr-3"></i>
          </a>
        @endif
        @if ($company->twitter_link)
          <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
            <i class="fab fa-twitter fa-3x mr-3"></i>
          </a>
        @endif
        @if ($company->insta_link)
          <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
            <i class="fab fa-instagram fa-3x mr-3"></i>
          </a>
        @endif
        @if ($company->youtube_link)
          <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
            <i class="fab fa-youtube fa-3x mr-3"></i>
          </a>
        @endif
        @if ($company->tiktok_link)
          <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
            <i class="fab fa-tiktok fa-3x mr-3"></i>
          </a>
        @endif

      </div>
    </div>
  </div>
  @endif

  <div class="container-fluid border py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mb-5 mb-md-0">
          <h2 class="h4">
            Payment methods
          </h2>
          <div class="d-flex">
            <div class="mr-3">
              <img src="{{ asset('img/cod-4.jpeg') }}" style="width: 50px; height: 50px;" />
            </div>
            <div class="mr-3">
              <img src="{{ asset('img/esewa-1.jpeg') }}" style="width: 50px; height: 50px;" />
            </div>
            <div class="mr-3">
              <img src="{{ asset('img/khalti-1.jpeg') }}" style="width: 50px; height: 50px;" />
            </div>
            @if (false)
            <div class="mr-3">
              <img src="{{ asset('img/img-1.jpg') }}" style="width: 50px; height: 50px;" />
            </div>
            @endif
          </div>
        </div>
        <div class="col-md-3 mb-5 mb-md-0">
          <h2 class="h4">
            Ozone shopping
          </h2>
          <div class="d-flex">
            <div class="mr-3">
              <img src="{{ asset('img/nepal-flag-1.png') }}" style="width: 40px; height: 40px;" />
            </div>
            @if (false)
            <div class="mr-3">
              <img src="{{ asset('img/esewa-1.jpeg') }}" style="width: 50px; height: 50px;" />
            </div>
            <div class="mr-3">
              <img src="{{ asset('img/khalti-1.jpeg') }}" style="width: 50px; height: 50px;" />
            </div>
            <div class="mr-3">
              <img src="{{ asset('img/img-1.jpg') }}" style="width: 50px; height: 50px;" />
            </div>
            @endif
          </div>
        </div>
        <div class="col-md-3 mb-5 mb-md-0">
          <h2 class="h4">
            Follow us
          </h2>
          <div class="d-flex">
            @if ($company->fb_link)
              <div class="mr-3">
                <a href="{{ $company->fb_link }}" target="_blank">
                  <i class="fab fa-facebook fa-2x text-primary"></i>
                </a>
              </div>
            @endif
            @if ($company->twitter_link)
              <div class="mr-3">
                <a href="{{ $company->twitter_link }}" target="_blank">
                  <i class="fab fa-twitter fa-2x text-info"></i>
                </a>
              </div>
            @endif
            @if ($company->insta_link)
              <div class="mr-3">
                <a href="{{ $company->insta_link }}" target="_blank">
                  <i class="fab fa-instagram fa-2x text-danger"></i>
                </a>
              </div>
            @endif
            @if ($company->youtube_link)
              <div class="mr-3">
                <a href="{{ $company->youtube_link }}" target="_blank">
                  <i class="fab fa-youtube fa-2x text-danger"></i>
                </a>
              </div>
            @endif
            @if ($company->tiktok_link)
              <div class="mr-3">
                <a href="{{ $company->tiktok_link }}" target="_blank">
                  <i class="fab fa-tiktok fa-2x text-danger"></i>
                </a>
              </div>
            @endif
          </div>
        </div>
        <div class="col-md-3 mb-5 mb-md-0">
          <h2 class="h4">
            Powered by
          </h2>
          <div class="text-muted">
            <i class="fas fa-check-circle fa-2x"></i>
            <span class="h4">
            OIT Ozone
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if (false)
  @if (false)
  <div class="container-fluid bg-info-rm border pt-4 pb-4 text-white-rm" style="{{--background-color: #101530;--}}">
    <div class="container">
      <div class="py-3">
        <div class="d-flex justify-content-end">
          <div class="mr-5 p-2" style="font-size: 1.1rem;">
            Be 
          </div>
          <div>
            <input type="text" placeholder="Email Address" class="py-2 pl-2" style="min-width: 400px;">
            <button class="btn btn-success btn-lg">
              Submit
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="container-fluid bg-info-rm border pt-4 pb-5-rm text-white-rm" style="{{--background-color: #101530;--}}">
    <div class="container pt-4">
      <div class="row">
      
        <div class="col-md-3 text-secondary mb-5" style="">
          <h3 class="h4 text-dark font-weight-bold mb-4">
            ABOUT
          </h3>
          @if (false)
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-about-us') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              About us
            </a>
          </div>
          @endif
          <div class="mb-2">
            <a href=""
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Contact us
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-careers') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Careers
            </a>
          </div>
          <div class="mb-2">
            <a href=""
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Press
            </a>
          </div>
        </div>

        <div class="col-md-3 text-secondary mb-5" style="">
          <h3 class="h4 text-dark font-weight-bold mb-4">
            HELP
          </h3>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-payments') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Payments
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-shipping') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Shipping
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-cancellation-and-returns') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Cancellation and returns
            </a>
          </div>
          <div class="mb-2">
            <a href=""
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              FAQ
            </a>
          </div>
        </div>
      
        <div class="col-md-3 text-secondary mb-5" style="">
          <h3 class="h4 text-dark font-weight-bold mb-4">
            POLICY
          </h3>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-return-policy') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Return policy
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-terms-of-use') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Terms of use
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-privacy') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Privacy
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-sitemap') }}"
                class="text-secondary text-decoration-none text-reset h5">
              <i class="fas fa-angle-right mr-2"></i>
              Sitemap
            </a>
          </div>
        </div>

        @if (true)
        <div class="col-md-3 mb-5" style="font-size: 1rem;">
          <h3 class="h4 text-dark font-weight-bold mb-4">
            CONNECT
          </h3>
          @if (false)
          <div class="text-secondary">
            {{ $company->tagline }}
          </div>
          <div class="mb-3">
            <button class="btn btn-success badge-pill py-2 w-100">
              <span class="h5">
                <i class="fas fa-clock mr-1"></i>
                Quick service
              </span>
            </button>
          </div>
          <div class="mb-3">
            <button class="btn btn-outline-success badge-pill py-2 w-100">
              <span class="h5">
                <i class="fas fa-phone mr-1"></i>
                Call us
              </span>
            </button>
          </div>
          @endif
          <div>
            @if ($company->fb_link)
              <a href="{{ $company->fb_link }}" target="_blank">
                <i class="fab fa-facebook fa-2x mr-2"></i>
              </a>
            @endif
            @if ($company->twitter_link)
              <a href="{{ $company->twitter_link }}" class="text-reset-rm" target="_blank">
                <i class="fab fa-twitter fa-2x mr-2 "></i>
              </a>
            @endif
          </div>

        </div>
        @endif
      </div>
    </div>
  </div>
  @endif

  <div class="container-fluid bg-info-rm border py-2 pb-2 text-white-rm" style="{{--background-color: #101530;--}}">
    <div class="container">
      <div class="border-top-rm text-center mt-1 pt-1" style="color: #aaa;">
        <div>
          &copy; 2023
          {{ $company->name }}
          |
          All rights reserved
        </div>
        <div>
          Website developed by
          <a href="https://oit.com.np">
            OIT
          </a>
          <i class="fas fa-check-circle ml-2"></i> 
        </div>
      </div>
    </div>
  </div>
</div>
