<div class="dropdown float-left h-100">
  <button class="btn dropdown-toggle p-3 border-0 font-weight-bold rounded-0 m-0"
      style="
          @if ($cmsTheme)
            background-color: {{ $cmsTheme->nav_menu_bg_color }};
            color: {{ $cmsTheme->nav_menu_text_color }};
          @endif
          "
      type="button" id="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}"
      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
      onMouseOver="this.style.background='@if ($cmsTheme){{ $cmsTheme->nav_menu_bg_color }} @endif'; this.style.color='@if ($cmsTheme){{ $cmsTheme->nav_menu_text_color }} @endif'"
  >
    {{ strtoupper($cmsNavMenuItem->name) }}
  </button>
  <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton-{{ $cmsNavMenuItem->cms_nav_menu_item_id }}">
    @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
      <a class="dropdown-item"
        href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}"
        style="
          @if ($cmsTheme)
            background-color: {{ $cmsTheme->nav_menu_bg_color }};
            color: {{ $cmsTheme->nav_menu_text_color }};
          @endif
          "
      >
        {{ strtoupper($cmsNavMenuDropdownItem->name) }}
      </a>
    @endforeach
  </div>
</div>
