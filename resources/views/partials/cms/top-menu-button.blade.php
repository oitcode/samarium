<div class="float-left">
  <a href="{{ route($btnRoute) }}"
      class="btn font-weight-bold p-3 rounded-0"
      style="
          background-color:
              @if(Route::current()->getName() == $btnRoute)
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->ascent_bg_color }}
                @else
                  orange
                @endif
              @else
              @endif
          ;
          color:
              @if(Route::current()->getName() == $btnRoute)
               @if (\App\CmsTheme::first())
                 {{ \App\CmsTheme::first()->ascent_text_color }}
               @else
                 white
               @endif
              @else
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->nav_menu_text_color }}
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
