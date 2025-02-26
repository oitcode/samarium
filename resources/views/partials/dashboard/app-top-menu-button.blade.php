<div class="float-left">
  <a href="{{ route($btnRoute) }}"
      class="btn font-weight-bold p-3"
      style="
        background-color:
         @if(Route::current()->getName() == $btnRoute)
          @if ($cmsTheme)
            {{ $cmsTheme->ascent_bg_color }}
          @else
            orange
          @endif
          ;
         @else
           white
         @endif
        color:
         @if(Route::current()->getName() == $btnRoute)
          @if ($cmsTheme)
            {{ $cmsTheme->ascent_text_color }}
          @else
            white
          @endif
          ;
         @else
           #ccc
         @endif
          "
  >
    <i class="{{ $iconFaClass}} mr-2"></i>
    {{ $btnText }}
  </a>
</div>
