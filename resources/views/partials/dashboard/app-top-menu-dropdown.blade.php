<div class="float-left nav-item dropdown mr-3 bg-warning-rm d-inline-block p-3">
  <a class="nav-link dropdown-toggle text-secondary p-0" href="#" id="navbarDropdown-{{ $loop->iteration }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ strtoupper($btnText) }}
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
</div>
