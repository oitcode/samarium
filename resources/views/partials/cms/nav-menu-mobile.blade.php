{{--
|
| Navigation menu mobile.
|
| This is the navigation menu for smaller screens (mobile, etc).
|
--}}

@if (has_module('hfn'))
  <div>
    <nav class="navbar navbar-expand-lg border-bottom p-0"
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
            ;"
    >
      <a class="navbar-brand p-3 text-reset" href="{{ route('website-home') }}">
        <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 60px;">
        <span class="h6 font-weight-bold ml-2"  style="width: 200 px !important;">
        </span>
      </a>
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
              <i class="fab fa-twitter fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->youtube_link)
          <div class="mr-3">
            <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
              <i class="fab fa-youtube fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->insta_link)
          <div class="mr-3">
            <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
              <i class="fab fa-instagram fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
        @if ($company->tiktok_link)
          <div class="mr-3">
            <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
              <i class="fab fa-tiktok fa-2x mr-2 "></i>
            </a>
          </div>
        @endif
      </div>
  
      <button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  
        <i class="fas fa-bars fa-2x" style="
            color:
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->top_header_text_color }}
                @else
                  white
                @endif
            ;
        "></i>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto border-top">
          @if ($cmsNavMenu)
            @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
              @if ($cmsNavMenuItem->type == 'item')
                <li class="nav-item px-2 py-1 bg-transparent border-bottom">
                  <a class="nav-link h6 text-reset mb-0"
                      href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
                    {{ $cmsNavMenuItem->name }}
                  </a>
                </li>
              @else
                <li class="nav-item dropdown px-2 pt-1 border-bottom">
                  <a class="nav-link dropdown-toggle h6 mb-0 text-reset mb-1" href="#"
                      id="navbarDropdown-{{ $cmsNavMenuItem->name }}"
                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $cmsNavMenuItem->name }}
                  </a>
                  <div class="dropdown-menu p-0 bg-transparent border-0" aria-labelledby="navbarDropdown-{{ $cmsNavMenuItem->name }}">
                    @if ($cmsNavMenuItem->cmsNavMenuDropdownItems)
                      @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
                        <a class="dropdown-item border-bottom text-decoration-none py-2"

                            style="
                                color:
                                @if (\App\CmsTheme::first())
                                  {{ \App\CmsTheme::first()->top_header_text_color }}
                                @else
                                  white
                                @endif;
                            "
                            href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}"
                            onMouseOver="this.style.background='{{ \App\CmsTheme::first()->top_header_bg_color }}'; this.style.color='{{ \App\CmsTheme::first()->top_header_text_color }}'"
                        >
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
            <li class="nav-item px-2 py-1 border-bottom">
              <a class="nav-link text-reset" href="{{ route('login') }}">
                <span class="btn btn-success badge-pill px-3">
                  Login
                </span>
              </a>
            </li>
          @else
            <li class="nav-item px-2 py-0 border-bottom">
              <a class="nav-link text-dark" href="{{ route('dashboard') }}">
                <span class="btn btn-success badge-pill px-3">
                Dashboard
                </span>
              </a>
            </li>
            <li class="nav-item px-2 py-0 border-bottom">
              <a class="nav-link text-dark" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
              >
                <span class="btn btn-danger badge-pill px-3">
                Logout
                </span>
              </a>
            </li>
          @endguest
  
          {{--
          |
          | Social media  links
          |
          --}}
          <li class="nav-item p-0 bg-transparent m-0">
            <div class="nav-link text-reset">
              <div class="px-2 py-1" style="background-color: rgba(0, 0, 0, 0.0);">
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
                        <i class="fab fa-twitter fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->youtube_link)
                    <div class="mr-3">
                      <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-youtube fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->insta_link)
                    <div class="mr-3">
                      <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-instagram fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->tiktok_link)
                    <div class="mr-3">
                      <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-tiktok fa-2x mr-2 "></i>
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
    <nav class="navbar navbar-expand-lg border-bottom p-0"
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
            ;"
    >
      <a class="navbar-brand p-3 text-reset" href="{{ route('website-home') }}">
        <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 60px;">
        <span class="h6 font-weight-bold ml-2"  style="width: 200 px !important;">
          @if ($company->short_name)
            {{ \Illuminate\Support\Str::limit($company->short_name, 25, $end=' ...') }}
          @else
            {{ \Illuminate\Support\Str::limit($company->name, 25, $end=' ...') }}
          @endif
        </span>
      </a>
  
      <button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  
        <i class="fas fa-bars fa-2x" style="
            color:
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->top_header_text_color }}
                @else
                  white
                @endif
            ;
        "></i>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto border-top">
          @if ($cmsNavMenu)
            @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
              @if ($cmsNavMenuItem->type == 'item')
                <li class="nav-item px-2 py-1 bg-transparent border-bottom bg-danger">
                  <a class="nav-link h6 text-reset mb-0"
                      href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
                    {{ $cmsNavMenuItem->name }}
                  </a>
                </li>
              @else
                <li class="nav-item dropdown px-2 py-1 border-bottom">
                  <a class="nav-link dropdown-toggle h6 mb-0 text-reset" href="#"
                      id="navbarDropdown-{{ $cmsNavMenuItem->name }}"
                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $cmsNavMenuItem->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown-{{ $cmsNavMenuItem->name }}">
                    @if ($cmsNavMenuItem->cmsNavMenuDropdownItems)
                      @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
                        <a class="dropdown-item bg-transparent bg-danger" href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}">
                          {{ $cmsNavMenuDropdownItem->name }} OLA
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
            <li class="nav-item px-2 py-1 border-bottom">
              <a class="nav-link text-reset" href="{{ route('login') }}">
                <span class="btn btn-success badge-pill px-3">
                  Login
                </span>
              </a>
            </li>
          @else
            <li class="nav-item px-2 py-0 border-bottom">
              <a class="nav-link text-dark" href="{{ route('dashboard') }}">
                <span class="btn btn-success badge-pill px-3">
                Dashboard
                </span>
              </a>
            </li>
            <li class="nav-item px-2 py-0 border-bottom">
              <a class="nav-link text-dark" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
              >
                <span class="btn btn-danger badge-pill px-3">
                Logout
                </span>
              </a>
            </li>
          @endguest
  
          {{--
          |
          | Social media  links
          |
          --}}
          <li class="nav-item p-0 bg-transparent m-0">
            <div class="nav-link text-reset">
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
                        <i class="fab fa-twitter fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->youtube_link)
                    <div class="mr-3">
                      <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-youtube fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->insta_link)
                    <div class="mr-3">
                      <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-instagram fa-2x mr-2 "></i>
                      </a>
                    </div>
                  @endif
                  @if ($company->tiktok_link)
                    <div class="mr-3">
                      <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
                        <i class="fab fa-tiktok fa-2x mr-2 "></i>
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
