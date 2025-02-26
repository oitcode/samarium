<div class="bg-danger text-white p-0 px-0">

  {{-- Show in bigger screens --}}
  <div class="container-fluid p-0 d-none d-md-block">
      <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.3);">
        <div class="container py-2 pl-4">
          <div class="d-flex justify-content-between">
            {{-- Left side --}}
            <div>
              Customer support
              <i class="fas fa-phone mx-1"></i>
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
                      <i class="fas fa-power-off mr-2"></i>
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
                      <i class="fab fa-facebook mr-3"></i>
                    </a>
                  @endif
                  @if ($company->twitter_link)
                    <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
                      <i class="fab fa-twitter mr-3"></i>
                    </a>
                  @endif
                  @if ($company->insta_link)
                    <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
                      <i class="fab fa-instagram mr-3"></i>
                    </a>
                  @endif
                  @if ($company->youtube_link)
                    <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
                      <i class="fab fa-youtube mr-3"></i>
                    </a>
                  @endif
                  @if ($company->tiktok_link)
                    <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
                      <i class="fab fa-tiktok mr-3"></i>
                    </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="container py-0">
      <div class="d-flex justify-content-between pl-2 py-0">
        <a href="{{ route('website-home') }}" class="text-decoration-none">
        <div class="d-flex">
          <div class="mr-3">
              @if (true)
              <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="max-width: 75px; max-height: 75px;">
              @endif
          </div>
        </div>
        </a>

        <div class="flex-grow-1 d-flex">
          <div class="d-flex flex-column justify-content-center flex-grow-1">
            <div class="d-flex">
              <div class="d-flex flex-column justify-content-center mr-3 m-0 p-0" style="font-family: Mono;">
                <div class="h4 font-weight-bold mb-0">
                  {{ $company->name }}
                </div>
              </div>
              <div class="w-100">
                <div class="input-group mr-sm-2">
                    <input type="text" class="form-control" id="" placeholder="Search for a product or category">
                    <div class="input-group-append">
                      <div class="input-group-text bg-transparent" role="button">
                        <i class="fas fa-search px-2 text-white"></i>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="px-5 border-left-primary">
          {{-- Shopping cart badge (checkout link) --}}
          <div class="d-flex flex-column justify-content-center h-100 o-darker">
            @livewire ('ecomm-website.shopping-cart-badge')
          </div>
        </div>
      </div>
    </div>

    {{-- Product category menu --}}
    <div class="container-fluid border-top border-bottom bg-light text-white">
      <div class="container" style="font-weight: bold;">
      </div>
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <nav class="navbar navbar-expand-lg navbar-danger bg-danger m-0 p-0 d-md-none" style="">
  
    <button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars fa-2x" style="
          color:
              @if ($cmsTheme)
                {{ $cmsTheme->footer_text_color }}
              @else
                white
              @endif
          ;
      "></i>
    </button>
  
    <a class="navbar-brand p-3 text-reset" href="/" style="">
      <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 50px;">
    </a>
  
    <div class="d-flex">
      <div class="pl-3">
        <a class="text-reset text-decoration-none" href="{{ route('login') }}">
          <i class="fas fa-user fa-2x mr-3"></i>
          <span class="font-weight-bold">
          Login
          </span>
        </a>
      </div>
      <div class="pl-3">
        @livewire ('ecomm-website.shopping-cart-badge')
      </div>
    </div>
  
    <div class="collapse navbar-collapse m-0 p-0 mt-4" id="navbarSupportedContent" style="margin-left: 0;">
      <ul class="navbar-nav m-0 p-0" style="margin: auto;">
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

  <div class="container-fluid p-0 d-md-none">
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
