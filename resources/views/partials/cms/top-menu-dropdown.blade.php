<div class="dropdown float-left bg-danger-rm h-100 p-3">
  <button class="btn-rm btn-light-rm dropdown-toggle p-2-rm bg-white border-0 font-weight-bold"
      style=""
      type="button" id="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}"
      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ strtoupper($cmsNavMenuItem->name) }}
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}">
    @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
      <a class="dropdown-item"
        href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}">
        <i class="fas fa-angle-right text-info mr-2"></i>
        {{ $cmsNavMenuDropdownItem->name }}
      </a>
    @endforeach
  </div>
</div>
