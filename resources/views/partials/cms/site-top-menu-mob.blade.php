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

  <nav class="navbar navbar-expand-lg navbar-light bg-light border bg-warning p-0">
    @if (true)
    <a class="navbar-brand" href="{{ route('website-home') }}" style="color: #004;">
      <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 50px;">
      @if (false)
      {{ $company->name }}
      @endif
    </a>
    @endif
    <button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto border-top">
        @if ($cmsNavMenu)
          @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
            @if ($cmsNavMenuItem->type == 'item')
              <li class="nav-item p-2 bg-light text-dark border-bottom">
                <a class="nav-link h5 text-dark font-weight-bold"
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
      </ul>
    </div>
  </nav>
</div>
