<div>
  <a href="{{ route($btnRoute) }}"
      class="btn font-weight-bold p-3 rounded-0"
      style="
          background-color:
              @if(Route::current()->getName() == $btnRoute)
                @if ($cmsTheme)
                  {{ $cmsTheme->ascent_bg_color }}
                @else
                  #123
                @endif
              @else
              @endif
          ;
          color:
              @if(Route::current()->getName() == $btnRoute)
               @if ($cmsTheme)
                 {{ $cmsTheme->ascent_text_color }}
               @else
                 white
               @endif
              @else
                @if ($cmsTheme)
                  {{ $cmsTheme->nav_menu_text_color }}
                @else
                  black
                @endif
              @endif
           ;
           "
  >
    {{ strtoupper($btnText) }}
  </a>
</div>
