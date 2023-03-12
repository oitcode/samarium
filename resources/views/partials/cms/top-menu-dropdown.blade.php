<div class="dropdown float-left bg-light">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ $cmsNavMenuItem->name  }}
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
