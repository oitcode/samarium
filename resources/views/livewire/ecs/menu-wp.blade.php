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
                      <a class="dropdown-item" href="">
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
