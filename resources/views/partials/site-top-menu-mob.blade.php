<div>
  {{-- Company/Brand info --}}
  <div class="d-flex justify-content-between p-3">
    <a href="{{ route('website-home') }}" class="text-decoration-none">
      <div class="d-flex">
        <div class="mr-4 d-flex flex-column justify-content-center">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 40px;">
        </div>
        <div class="mr-3">
          <h1 class="h6 text-dark" style="font-weight: bold;">{{ $company->name }}</h1>
          <div class="text-secondary">
            {{ $company->tagline }}
          </div>
        </div>
      </div>
    </a>

    {{-- Shopping cart badge (checkout link) --}}
    @if (true)
      <div class="d-flex flex-column justify-content-center h-100">
        @livewire ('website-shopping-cart-badge')
      </div>
    @else
      TEST
    @endif
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    @if (false)
    <a class="navbar-brand" href="{{ route('website-home') }}" style="color: #004;">
      <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 50px;">
      {{ $company->name }}
    </a>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
          @if ($cmsNavMenuItem->type == 'item')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
                {{ $cmsNavMenuItem->name }}
              </a>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-secondary" href="#"
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
      </ul>
    </div>
  </nav>
</div>
