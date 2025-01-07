<div>
  <a href="{{ route($btnRoute) }}"
      class="btn
        w-100 h-100 py-3 font-weight-bold text-left rounded-0
        @if ($bordered ?? false)
        @endif
        "
      style="
        @if(Route::current()->getName() == $btnRoute)
          background-color: rgba(0, 0, 0, 0.3);
        @else
        @endif
      "
      >

    <div class="d-flex">
      <div class="d-flex justify-content-center mr-2 mt-1">
        <i class="{{ $iconFaClass }} text-white"></i>
      </div>
      <div class="d-flex justify-content-center o-heading text-white">
        <strong style="{{-- @if(Route::current()->getName() == $btnRoute) text-shadow: 0.5px 0 {{ config('app.oc_select_txt_color') }} @else text-shadow: 0.5px 0 {{ config('app.oc_unselect_txt_color') }} @endif ; font-weight:bold; --}}">
        {{ $btnText }}
        </strong>
      </div>
    </div>

  </a>
</div>
