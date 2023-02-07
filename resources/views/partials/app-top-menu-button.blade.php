<div class="float-left text-white-rm border-right-rm" style="font-size: 1.3rem;">
  <a href="{{ route($btnRoute) }}"
      class="btn
             @if (false)
             @if(Route::current()->getName() == $btnRoute)
               btn-danger
             @else
               btn-light
               text-secondary
             @endif
             @endif
          font-weight-bold
          p-3"
          
          style="
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
               #ccc
             @endif
              "
          >

    @if (false)
    <i class="{{ $iconFaClass}} mr-2"></i>
    @endif
    {{ strtoupper($btnText) }}
  </a>
</div>
