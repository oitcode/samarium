<div class="border-top bg-white">

  {{-- Brand Info --}}
  @if (false)
  <div class="container-fluid py-3" style="background-color: #dcdcdc;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="">
            @if (true)
            <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                class="img-fluid-rm"
                alt="{{ $company->name }} logo"
                style="height: 75px !important;">
            @endif
          </div>
        </div>
        <div class="col-md-4">
        </div>
      </div>
      <div class="d-flex justify-content-center">
      </div>
    </div>
  </div>
  @endif

  <div class="container-fluid" style="background-color: #ececec;">
    <div class="container">
      <div class="row">


        <div class="col-md-4 py-4">
        </div>

        <div class="col-md-4 py-4">
          <div class="">
            <div class="">
              <div class="d-flex flex-column mb-3">
                <div class="" style="">
                  <h2 class="h5 text-dark font-weight-bold">
                    {{ $company->name }}
                  </h2>
                </div>
              </div>
            </div>
            @if (false)
            <p class="text-secondary">
              Rekha boutique is a boutique store selling all types
              of boutique dress and ornaments. Located in Kamalpokhari,
              Kathmandu, Nepal we provide free shipping inside
              Kathmandu valley.
            </p>
            @endif
            @if (false)
            <h2 class="h5 mb-3 text-center-tm text-secondary-rm">
              ABOUT US
            </h2>
            @if (false)
            <p class="text-secondary">
              Enter your email to get latest updates
              delivered to your inbox.
            </p>
            <input type="text" class="form-control" placeholder="Email"/>
            <div class="my-3">
              <button class="btn btn-block btn-danger">
                Subscribe
              </button>
            </div>
            @endif

            @endif

          </div>
          @if (false)
          <div class="d-flex justify-content-center-rm">
            <div>
              <div>
                <h2 class="h5 mb-3 font-weight-bold" style="{{-- font-family: Mono; --}}">
                  @if (false)
                  {{ $company->name }}
                  @else
                  Contact us
                  @endif
                </h2>
              </div>
            </div>
          </div>
          @endif

          <div class="d-flex flex-column justify-content-center">

            <div class="mr-3 mb-2">
              @if (false)
              <i class="fas fa-phone mr-2"></i>
              @else
              <strong>
                <span class="text-muted">
                  PHONE
                </span>
              </strong>
              @endif
              </br>
              <strong>
                {{ $company->phone }}
              </strong>
            </div>

            <div class="mr-3 mb-2">
              @if (false)
              <i class="fas fa-envelope mr-2"></i>
              @else
              <strong>
                <span class="text-muted">
                  EMAIL
                </span>
              </strong>
              @endif
              </br>
              <strong>
                {{ $company->email }}
              </strong>
            </div>

            <div class="mr-3 mb-2">
              @if (false)
              <i class="fas fa-map-marker-alt mr-2"></i>
              @else
              <strong>
                <span class="text-muted">
              ADDRESS
                </span>
              </strong>
              @endif
              <br/>
              <strong>
              {{ $company->address }}
              </strong>
            </div>
          </div>

          @if (false)
          <h2 class="h5 mb-3 text-center-tm text-secondary-rm">
            Follow us
          </h2>
          @endif
          <div class="d-flex justify-content-center-rm mt-4">
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

        @if (false)
        <div class="col-md-4 py-4">
          @if (false)
          <h2 class="h5 text-dark font-weight-bold mb-4-rm">
            Quick Links
          </h2>
          <div class="mb-2-rm">
            <a href="./contact-us"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Contact
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="./about-us"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              About us
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="{{ route('ecomm-collection-webpage-display-privacy') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              How to buy
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="{{ route('ecomm-collection-webpage-display-sitemap') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Location
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="./post"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Blog
            </a>
          </div>
          @endif
        </div>
        @endif
        <div class="col-md-4 py-4">
          @if (false)
          <h2 class="h5 text-dark font-weight-bold mb-3">
            Policy
          </h2>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-terms-of-use') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              @if (false)
              <i class="fas fa-angle-right mr-1"></i>
              @endif
              Terms of use
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-privacy') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              @if (false)
              <i class="fas fa-angle-right mr-1"></i>
              @endif
              Privacy
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-return-policy') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              @if (false)
              <i class="fas fa-angle-right mr-1"></i>
              @endif
              Return policy
            </a>
          </div>
          <div class="mb-2">
            <a href="{{ route('ecomm-collection-webpage-display-sitemap') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              @if (false)
              <i class="fas fa-angle-right mr-1"></i>
              @endif
              Sitemap
            </a>
          </div>
          @endif
        </div>

      </div>
    </div>
  </div>

  <div class="container py-3 text-center">
    @if (true)
    <h2 class="h5 text-dark font-weight-bold mb-3">
      Products
    </h2>
    <div class="d-sm-flex justify-content-center">
      @foreach (\App\ProductCategory::all() as $productCategory)
        <a href="{{ route('ecomm-collection-webpage-display-terms-of-use') }}"
            class="text-secondary text-decoration-none text-reset h5-rm mr-3">
          {{ $productCategory->name }}
        </a>
      @endforeach
    </div>
    @endif
  </div>

  <div class="container-fluid bg-info-rm border py-2 pb-2 text-white-rm" style="{{--background-color: #101530;--}}">
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="" style="color: #aaa;">
          <div>
            &copy; 2023
            {{ $company->name }}
            @if (false)
            |
            All rights reserved
            @endif
          </div>
          <div class="d-flex justify-content-center">
            Powered by
            <a href="https://oit.com.np" class="ml-1">
              OIT
            </a>
            <i class="fas fa-check-circle ml-2"></i> 
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
