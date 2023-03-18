<div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
  <a href="{{ route($btnRoute) }}"
      class="btn
             @if (false)
             @if(Route::current()->getName() == $btnRoute)
               btn-danger
             @else
               btn-light
               text-white
             @endif
             @endif
          font-weight-bold text-white
          p-3"
          
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
               white
             @endif
            color:
             @if(Route::current()->getName() == $btnRoute)
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_text_color }}
              @else
                white
              @endif
              ;
             @else
               white
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
