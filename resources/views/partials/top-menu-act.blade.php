<div class="bg-white py-2-rm text-right mb-3-rm border-bottom-rm">

  {{-- Top menu buttons. --}}

  @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
    @if ($cmsNavMenuItem->type == 'item')
      @include ('partials.app-top-menu-button', [
        'btnRoute' => 'website-webpage-' . $cmsNavMenuItem->webpage->permalink,
        'iconFaClass' => 'fas fa-building',
        'btnText' => $cmsNavMenuItem->name,
      ])

    @else
      @if (false)
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
    @endif
  @endforeach


  <div class="clearfix">
  </div>

</div>
