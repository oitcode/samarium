<div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
  <a href="{{ route($btnRoute) }}"
      class="btn
             @if(Route::current()->getName() == $btnRoute)
               btn-danger
             @else
               btn-light
               text-secondary
             @endif
          p-3">
    @if (false)
    <i class="{{ $iconFaClass}} mr-2"></i>
    @endif
    {{ strtoupper($btnText) }}
  </a>
</div>
