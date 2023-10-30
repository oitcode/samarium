<div class="sticky-top-rm bg-white border-bottom">

  {{-- Show in bigger screens --}}
  <div class="container-fluid p-0 bg-warning-rm d-none d-md-block">
    <div class="container-fluid 
      @if (! \App\CmsTheme::first())
        bg-danger text-white
      @endif
      border-bottom"
      style="
        @if (\App\CmsTheme::first())
          background-color: {{ \App\CmsTheme::first()->top_header_bg_color }}; color: {{ \App\CmsTheme::first()->top_header_text_color }};
        @endif"
    >
      <div class="container py-2">
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
              @if (true)
              <div class="px-3">
                @guest
                  <a href="{{ route('login') }} " class="text-reset text-decoration-none">
                    <i class="fas fa-user mr-1"></i>
                    Sign in
                  </a>
                @else
                  <a href="{{ route('website-user-profile') }}" class="text-reset text-decoration-none mr-4">
                    <i class="fas fa-user mr-1"></i>
                    Profile
                  </a>

                  <a class="text-reset text-decoration-none" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
                  >
                    <i class="fas fa-power-off mr-2 text-warning-rm"></i>
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                @endguest
              </div>
              <div class="px-3">
                @guest
                  <a href="{{ route('register') }} " class="text-reset text-decoration-none">
                    <i class="fas fa-lock mr-1"></i>
                    Sign up
                  </a>
                @endguest
              </div>
              @endif
              <div class="px-3" style="">
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
            <h1 class="h5 font-weight-bold mt-2 text-dark" style="">
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

        @if (true)
        <div class="flex-grow-1 d-flex justify-content-center-rm bg-info-rm">
          <div class="d-flex flex-column justify-content-center flex-grow-1 bg-success-rm px-4">
            <div class="w-100 bg-warning">

              <div class="input-group mr-sm-2">
                  <input type="text" class="form-control" id="" placeholder="Search for a product or category">
                  <div class="input-group-append">
                    <div class="input-group-text bg-danger" role="button">
                      <i class="fas fa-search px-2 text-white"></i>
                    </div>
                  </div>
              </div>

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



<nav class="navbar navbar-expand-lg navbar-dark-rm bg-dark-rm m-0 p-0 d-md-none" style="">
  <button class="navbar-toggler p-3 m-3" style="border: 1px solid gray;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    @if (false)
    <span class="navbar-toggler-icon"></span>
    @endif
    <i class="fas fa-list fa-2x-rm" style=""></i>
  </button>

  <a class="navbar-brand p-3 text-reset" href="/" style="">
    <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 50px;">
    @if (false)
    <span class="h4 font-weight-bold" style="">
      {{ $company->name }}
    </span>
    @endif
  </a>

  <div class="px-3">
    @livewire ('ecomm-website.shopping-cart-badge')
  </div>


  <div class="collapse navbar-collapse m-0 p-0 mt-4" id="navbarSupportedContent" style="margin-left: 0;">
    <ul class="navbar-nav m-0 p-0 mr-auto-rm" style="margin: auto;">


      {{-- Common things --}}

      @guest
        <li class="nav-item border bg-light text-dark p-3">
          <a class="nav-link text-dark" href="{{ route('login') }}">
            <i class="fas fa-user mr-3"></i>
            <span class="font-weight-bold">
            Sign in 
            </span>
          </a>
        </li>
        <li class="nav-item border bg-light text-dark p-3">
          <a class="nav-link text-dark" href="{{ route('register') }}">
            <i class="fas fa-lock mr-3"></i>
            <span class="font-weight-bold">
            Sign up
            </span>
          </a>
        </li>
      @else
        <li class="nav-item border bg-light text-dark p-3">
          <a class="nav-link text-dark" href="{{ route('website-user-profile') }}">
            <i class="fas fa-user mr-3"></i>
            <span class="font-weight-bold">
            My profile
            </span>
          </a>
        </li>
        <li class="nav-item border bg-light text-dark p-3">
          <a class="nav-link text-dark" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
          >
            <i class="fas fa-power-off mr-2 text-danger font-weight-bold"></i>
            <span class="text-danger font-weight-bold">
            Logout
          </a>
        </li>
      @endguest

    </ul>
  </div>
</nav>











  <div class="container-fluid p-0 bg-warning-rm d-md-none">
    @if (false)
    <div class="d-flex justify-content-between p-3" style="background-image: linear-gradient(to bottom right, #FF512F, #DD2476);
        {{--
        border-bottom: 5px solid #FF512F;
        border-top: 5px solid #FF512F;
        --}}
        ">
      <a href="{{ route('website-home') }}" class="text-decoration-none">
        <div class="d-flex bg-info-rm">
          <div class="mr-4 d-flex flex-column justify-content-center">
              <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 40px;">
          </div>
          <div class="d-flex flex-column justify-content-center mr-3 bg-warning-rm">
            <h1 class="h5 font-weight-bold text-dark mb-0 pb-0" style="font-weight: bold;">{{ $company->name }}</h1>
            @if (false)
            <div class="text-secondary">
              {{ $company->tagline }}
            </div>
            @endif
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
      @if (false)
        <div class="d-flex flex-column justify-content-center h-100 bg-light">
          @include ('partials.ecomm-website.top-menu')
        </div>
      @endif
    </div>
    @endif

    <div class="p-2" style="background-image: linear-gradient(to bottom right, #eee, #ddd);">
      <div class="input-group mr-sm-2">
          <input type="text" class="form-control py-4" id="" placeholder="Search for a product or category">
          <div class="input-group-append">
            <div class="input-group-text bg-white" role="button">
              <i class="fas fa-search px-2 text-secondary"></i>
            </div>
          </div>
      </div>
    </div>

  </div>

</div>
