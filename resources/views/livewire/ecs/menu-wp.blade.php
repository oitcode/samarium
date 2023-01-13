<div class="sticky-top">

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
  <div class="d-md-none bg-white">
    <div class="container-fluid">
      @if (false)
      @include ('partials.site-top-menu-mob')
      @endif
    </div>
  </div>

</div>
@if (false)
<div class="container-fluid {{ env('SITE_ECS_THEME_BS_CLASS') }}">
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark" style="font-size: 1.2rem;">
    <button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  
          @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
            @if ($cmsNavMenuItem->type == 'item')
              <li class="nav-item text-white mr-3 pr-3">
                <a class="nav-link text-white" href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
                  {{ $cmsNavMenuItem->name }}
                </a>
              </li>
            @else
              <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown-{{ $loop->iteration }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ $cmsNavMenuItem->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown-{{ $loop->iteration }}">
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
      </ul>
    </div>
  </nav>
</div>
</div>
@endif
