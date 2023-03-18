<div class="dropdown float-left h-100" style="font-size: 1.3rem;">
  <button class="btn btn-danger dropdown-toggle p-3 bg-white-rm border-0 font-weight-bold"
      style=""
      type="button" id="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}"
      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ strtoupper($cmsNavMenuItem->name) }}
  </button>
  <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}">
    @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
      <a class="dropdown-item bg-danger text-white"
        href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}"
        style="font-size: 1rem;">
        @if (false)
        <i class="fas fa-angle-right text-info-rm mr-2"></i>
        @endif
        {{ strtoupper($cmsNavMenuDropdownItem->name) }}
      </a>
    @endforeach
  </div>
</div>
