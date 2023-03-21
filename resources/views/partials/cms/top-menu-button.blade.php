<div class="float-left border-right-rm" style="font-size: 1.3rem;">
  <a href="{{ route($btnRoute) }}"
      class="btn
             @if (false)
             @if(Route::current()->getName() == $btnRoute)
               btn-danger-rm
             @else
               btn-light-rm
               text-white-rm
             @endif
             @endif
          font-weight-bold
          p-3 rounded-0"
          
          style="
            @if (true)
            background-color:
             @if(Route::current()->getName() == $btnRoute)
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_bg_color }}
              @else
                orange
              @endif
              ;
             @else
               {{ \App\CmsTheme::first()->nav_menu_bg_color }};
             @endif
            color:
             @if(Route::current()->getName() == $btnRoute)
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_text_color }}
              @else
                {{ \App\CmsTheme::first()->nav_menu_text_color }}
              @endif
              ;
             @else
               {{ \App\CmsTheme::first()->nav_menu_text_color }}
             @endif
             @endif
              "
          >

    @if (false)
    <i class="{{ $iconFaClass}} mr-2"></i>
    @endif
    {{ strtoupper($btnText) }}
  </a>
</div>
