<div class="text-white-rm p-0 px-0" 
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
    ;
  ">

  {{-- Show in bigger screens --}}
  <div class="container-fluid p-0 bg-danger-rm d-none d-md-block" style="">
      <div class="container-fluid" style="{{-- background-color: rgba(0, 0, 0, 0.3);--}}">
        <div class="container py-2 pl-4">
          <div class="d-flex justify-content-between">
            {{-- Left side --}}
            <div>
              @if (true)
              Contact:
              @endif
              <i class="fas fa-phone mx-1"></i>
              <strong>
                {{ $company->phone }}
              </strong>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              @if (true)
              Address:
              @endif
              <i class="fas fa-map-marker-alt mx-1"></i>
              <strong>
                {{ $company->address }}
              </strong>
            </div>
            {{-- Right side --}}
            <div>
              <div class="d-flex">
                @if (false)
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
                      <i class="fab fa-facebook fa-2x mr-3"></i>
                    </a>
                  @endif
                  @if ($company->twitter_link)
                    <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
                      <i class="fab fa-twitter fa-2x mr-3"></i>
                    </a>
                  @endif
                  @if ($company->insta_link)
                    <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
                      <i class="fab fa-instagram fa-2x mr-3"></i>
                    </a>
                  @endif
                  @if ($company->youtube_link)
                    <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
                      <i class="fab fa-youtube fa-2x mr-3"></i>
                    </a>
                  @endif
                  @if ($company->tiktok_link)
                    <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
                      <i class="fab fa-tiktok fa-2x mr-3"></i>
                    </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="container-fluid p-0"
  style="
           {{--
           background-image: @if (\App\CmsTheme::first())
             url({{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }})
           @else
             url({{ asset('img/school-5.jpg') }})
           @endif
           ;
           background-size: cover;
           background-repeat: no-repeat;
           background-position: center;
           height: 500px;
           background-attachment: fixed;
           --}}
           "
  >
  <div class="container-fluid py-4 d-none d-md-block o-overlay-rm">
  <div class="container">
    <div class="d-flex justify-content-between h-100 bg-info-rm pl-2">


      <a href="{{ route('website-home') }}" class="text-decoration-none">
      <div class="d-flex bg-warning-rm py-3">
        <div class="mr-4 d-flex flex-column justify-content-center">
            @if (true)
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid-rm mt-4-rm" style="max-width: 100px; max-height: 100px;">
            @endif
        </div>
        @if (false)
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
        @endif
      </div>
      </a>


      @if (true)
      <div class="d-flex justify-content-center-rm bg-success-rm flex-grow-1">

        <div class="d-flex flex-column justify-content-center flex-grow-1 bg-success-rm px-4">
          <h1 class="h5 font-weight-bold my-3" style="font-family: Mono;">
            {{ $company->name }}
          </h1>
          <div class="w-100 bg-warning-rm">

            <div class="input-group mr-sm-2">
                <input type="text" class="form-control" id="" placeholder="Search in our website">
                <div class="input-group-append">
                  <div class="input-group-text bg-transparent" role="button">
                    <i class="fas fa-search px-2 text-white-rm"></i>
                  </div>
                </div>
            </div>

          </div>
        </div>

      </div>
      @endif

  
    </div>
  </div>
  </div>
  </div>


  <div class="d-none d-md-block">
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
  </div>


</div>
