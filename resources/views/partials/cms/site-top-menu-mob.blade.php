<div class="bg-danger">
  @if (false)
  {{-- Company/Brand info --}}
  <div class="d-flex justify-content-center p-3 bg-white">
    <a href="{{ route('website-home') }}" class="text-decoration-none">
      <div class="d-flex flex-column">
        <div class="d-flex justify-content-center mb-4">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="width: 75px; height: 75px;">
        </div>
        <div class="mr-3">
          <h1 class="h6 text-dark text-center" style="font-weight: bold;">{{ $company->name }}</h1>
          <div class="text-secondary text-center">
            {{ $company->tagline }}
          </div>
        </div>
      </div>
    </a>
  </div>
  @endif

  <nav class="navbar navbar-expand-lg navbar-light-rm bg-light-rm border-bottom bg-warning-rm p-0"
      style="
      background-color: orange;
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_text_color }}
              @else
                white
              @endif
          ;
  ">

    @if (true)
    <a class="navbar-brand p-3 text-reset" href="{{ route('website-home') }}" style="{{--color: #000;--}}">
      <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 60px;">
      <span class="h6 font-weight-bold ml-2"  style="width: 200 px !important;">
        @if (true)
          {{ \Illuminate\Support\Str::limit($company->name, 25, $end=' ...') }}
        @endif
      </span>
    </a>
    @endif
    <button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

      @if (false)
      <span class="navbar-toggler-icon p-5 bg-danger text-white "></span>
      @endif
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
                {{ \App\CmsTheme::first()->footer_text_color }}
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
              <li class="nav-item p-2 bg-transparent text-white border-bottom-rm text-center-rm">
                <a class="nav-link h4 text-reset font-weight-bold"
                    href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
                  {{ $cmsNavMenuItem->name }}
                </a>
              </li>
            @else
              <li class="nav-item dropdown p-2 border">
                <a class="nav-link dropdown-toggle h5 text-dark font-weight-bold" href="#"
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
        <li class="nav-item p-2 bg-transparent text-white border-bottom-rm text-center-rm">
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
