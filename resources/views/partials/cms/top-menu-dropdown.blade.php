<div class="dropdown float-left h-100" style="font-size: 1.3rem;">
  <button class="btn dropdown-toggle p-3 border-0 font-weight-bold rounded-0 m-0"
      style="background-color: {{ \App\CmsTheme::first()->nav_menu_bg_color }};color: {{ \App\CmsTheme::first()->nav_menu_text_color }}"
      type="button" id="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}"
      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
      onMouseOver="this.style.background='{{ \App\CmsTheme::first()->nav_menu_bg_color }}'; this.style.color='{{ \App\CmsTheme::first()->nav_menu_text_color }}'"
      >
    {{ strtoupper($cmsNavMenuItem->name) }}
  </button>
  <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}">
    @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
      <a class="dropdown-item"
        href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}"
        style="background-color: {{ \App\CmsTheme::first()->nav_menu_bg_color }};
               color: {{ \App\CmsTheme::first()->nav_menu_text_color }};
               font-size: 1rem;">
        @if (false)
        <i class="fas fa-angle-right text-info-rm mr-2"></i>
        @endif
        {{ strtoupper($cmsNavMenuDropdownItem->name) }}
      </a>
    @endforeach
  </div>
</div>
