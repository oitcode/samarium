{{--
|
| Navigation menu mobile.
|
| This is the navigation menu for smaller screens (mobile, etc).
|
--}}

@if (preg_match("/hfn/i", env('MODULES')))
  <div>
  
    <nav class="navbar navbar-expand-lg navbar-light-rm bg-light-rm border-bottom bg-warning-rm p-0"
        style="
        background-color: orange;
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
  
      @if (true)
      <a class="navbar-brand p-3 text-reset" href="{{ route('website-home') }}" style="{{--color: #000;--}}">
        <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 60px;">
        <span class="h6 font-weight-bold ml-2"  style="width: 200 px !important;">
          @if (false)
            {{ \Illuminate\Support\Str::limit($company->name, 25, $end=' ...') }}
          @endif
        </span>
      </a>
      @endif

      @if (true)
      <div class="d-flex">
        @if ($company->fb_link)
          <div class="mr-3">
            <a href="{{ $company->fb_link }}" class="text-reset pt-0" target="_blank">
              <i class="fab fa-facebook text-reset fa-2x mr-2 pt-0"></i>
            </a>
          </div>
        @endif
        @if ($company->twitter_link)
          <div class="mr-3">
            <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
              <i class="fab fa-twitter text-white-rm fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->youtube_link)
          <div class="mr-3">
            <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
              <i class="fab fa-youtube text-white-rm fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->insta_link)
          <div class="mr-3">
            <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
              <i class="fab fa-instagram text-white-rm fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->tiktok_link)
          <div class="mr-3">
            <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
              <i class="fab fa-tiktok text-white-rm fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
      </div>
      @endif
  
      <button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  
        <i class="fas fa-bars fa-2x border-rm p-2-rm" style="
            {{--
            background-color:
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->footer_bg_color }}
                @else
                  orange
                @endif
                ;
                --}}
            color:
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->top_header_text_color }}
                @else
                  white
                @endif
            ;
        "></i>
      </button>

    
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="{{--background-image: linear-gradient(-135deg, transparent 0%, rgba(0,0,0,0.5) 100%);--}}">
        <ul class="navbar-nav mr-auto border-top">
          @if ($cmsNavMenu)
            @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
              @if ($cmsNavMenuItem->type == 'item')
                <li class="nav-item px-2 py-1 bg-transparent text-white-rm border-bottom text-center-rm">
                  <a class="nav-link h6 text-reset font-weight-bold-rm mb-0"
                      href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
                    {{ $cmsNavMenuItem->name }}
                  </a>
                </li>
              @else
                <li class="nav-item dropdown px-2 py-1 border-bottom">
                  <a class="nav-link dropdown-toggle h6 mb-0 text-dark-rm font-weight-bold-rm text-reset" href="#"
                      id="navbarDropdown-{{ $cmsNavMenuItem->name }}"
                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $cmsNavMenuItem->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown-{{ $cmsNavMenuItem->name }}">
                    @if ($cmsNavMenuItem->cmsNavMenuDropdownItems)
                      @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
                        <a class="dropdown-item" href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}">
                          {{ $cmsNavMenuDropdownItem->name }}
                        </a>
                      @endforeach
                    @endif
                  </div>
                </li>
              @endif
            @endforeach
          @endif
  
  
          {{--
          |
          | Login links
          |
          --}}
          @guest
            <li class="nav-item px-2 py-1">
              <a class="nav-link text-reset h4" href="{{ route('login') }}">
                @if (false)
                <i class="fas fa-user mr-3"></i>
                @endif
                <span class="btn btn-success badge-pill px-3"
                    {{--
                    style="
                        background-color: {{ \App\CmsTheme::first()->top_header_text_color }};
                        color: {{ \App\CmsTheme::first()->top_header_bg_color }};
                        "
                    --}}
                >
                  Login
                </span>
              </a>
            </li>
          @else
            <li class="nav-item border bg-light-rm text-dark-rm px-2 py-1">
              <a class="nav-link text-dark h6" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
              >
                <span class="btn btn-danger badge-pill px-3"
                    {{--
                    style="
                        background-color: {{ \App\CmsTheme::first()->top_header_text_color }};
                        color: {{ \App\CmsTheme::first()->top_header_bg_color }};
                        "
                    --}}
                >
                Logout
              </a>
            </li>
          @endguest
  
          {{--
          |
          | Social media  links
          |
          --}}
          <li class="nav-item p-2 bg-transparent text-white-rm border-bottom-rm text-center-rm">
            <div class="nav-link h4 text-reset font-weight-bold">
              <div class="p-3" style="background-color: rgba(0, 0, 0, 0.5);">
                <div class="d-flex">
                  @if ($company->fb_link)
                    <div class="mr-3">
                      <a href="{{ $company->fb_link }}" class="text-reset pt-0" target="_blank">
                        <i class="fab fa-facebook text-reset fa-2x mr-2 pt-0"></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->twitter_link)
                    <div class="mr-3">
                      <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-twitter text-white-rm fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->youtube_link)
                    <div class="mr-3">
                      <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-youtube text-white-rm fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->insta_link)
                    <div class="mr-3">
                      <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-instagram text-white-rm fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->tiktok_link)
                    <div class="mr-3">
                      <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-tiktok text-white-rm fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </li>
  
        </ul>
      </div>
    </nav>
  </div>
@else
  <div>
  
    <nav class="navbar navbar-expand-lg navbar-light-rm bg-light-rm border-bottom bg-warning-rm p-0"
        style="
        background-color: orange;
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
  
      @if (true)
      <a class="navbar-brand p-3 text-reset" href="{{ route('website-home') }}" style="{{--color: #000;--}}">
        <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 60px;">
        <span class="h6 font-weight-bold ml-2"  style="width: 200 px !important;">
          @if ($company->short_name)
            {{ \Illuminate\Support\Str::limit($company->short_name, 25, $end=' ...') }}
          @else
            {{ \Illuminate\Support\Str::limit($company->name, 25, $end=' ...') }}
          @endif
        </span>
      </a>
      @endif
  
      <button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  
        <i class="fas fa-bars fa-2x border-rm p-2-rm" style="
            {{--
            background-color:
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->footer_bg_color }}
                @else
                  orange
                @endif
                ;
                --}}
            color:
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->top_header_text_color }}
                @else
                  white
                @endif
            ;
        "></i>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="{{--background-image: linear-gradient(-135deg, transparent 0%, rgba(0,0,0,0.5) 100%);--}}">
        <ul class="navbar-nav mr-auto border-top">
          @if ($cmsNavMenu)
            @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
              @if ($cmsNavMenuItem->type == 'item')
                <li class="nav-item px-2 py-1 bg-transparent text-white-rm border-bottom text-center-rm">
                  <a class="nav-link h6 text-reset font-weight-bold-rm mb-0"
                      href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
                    {{ $cmsNavMenuItem->name }}
                  </a>
                </li>
              @else
                <li class="nav-item dropdown px-2 py-1 border-bottom">
                  <a class="nav-link dropdown-toggle h6 mb-0 text-dark-rm font-weight-bold-rm text-reset" href="#"
                      id="navbarDropdown-{{ $cmsNavMenuItem->name }}"
                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $cmsNavMenuItem->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown-{{ $cmsNavMenuItem->name }}">
                    @if ($cmsNavMenuItem->cmsNavMenuDropdownItems)
                      @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
                        <a class="dropdown-item" href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}">
                          {{ $cmsNavMenuDropdownItem->name }}
                        </a>
                      @endforeach
                    @endif
                  </div>
                </li>
              @endif
            @endforeach
          @endif
  
  
          {{--
          |
          | Login links
          |
          --}}
          @guest
            <li class="nav-item p-3">
              <a class="nav-link text-reset h4" href="{{ route('login') }}">
                <i class="fas fa-user mr-3"></i>
                <span class="font-weight-bold">
                Login
                </span>
              </a>
            </li>
            @if (false)
            <li class="nav-item border bg-light-rm text-dark-rm p-3">
              <a class="nav-link text-dark" href="{{ route('register') }}">
                <i class="fas fa-lock mr-3"></i>
                <span class="font-weight-bold">
                Sign up
                </span>
              </a>
            </li>
            @endif
          @else
            @if (false)
            <li class="nav-item border bg-light text-dark p-3">
              <a class="nav-link text-dark" href="{{ route('website-user-profile') }}">
                <i class="fas fa-user mr-3"></i>
                <span class="font-weight-bold">
                My profile
                </span>
              </a>
            </li>
            @endif
            <li class="nav-item border bg-light-rm text-dark-rm px-2">
              <a class="nav-link text-dark h6" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
              >
                <span class="text-danger font-weight-bold">
                Logout
              </a>
            </li>
          @endguest
  
          {{--
          |
          | Social media  links
          |
          --}}
          <li class="nav-item p-2 bg-transparent text-white-rm border-bottom-rm text-center-rm">
            <div class="nav-link h4 text-reset font-weight-bold">
              <div class="p-3" style="background-color: rgba(0, 0, 0, 0.0);">
                <div class="d-flex">
                  @if ($company->fb_link)
                    <div class="mr-3">
                      <a href="{{ $company->fb_link }}" class="text-reset pt-0" target="_blank">
                        <i class="fab fa-facebook text-reset fa-2x mr-2 pt-0"></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->twitter_link)
                    <div class="mr-3">
                      <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-twitter text-white-rm fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->youtube_link)
                    <div class="mr-3">
                      <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-youtube text-white-rm fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->insta_link)
                    <div class="mr-3">
                      <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-instagram text-white-rm fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->tiktok_link)
                    <div class="mr-3">
                      <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-tiktok text-white-rm fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </li>
  
        </ul>
      </div>
    </nav>
  </div>
@endif
