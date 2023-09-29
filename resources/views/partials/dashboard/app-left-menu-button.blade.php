<div class="text-center-rm border-rm">
  <a href="{{ route($btnRoute) }}"
      class="btn
        {{--
        @if(Route::current()->getName() != $btnRoute)
          {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
        @else
          {{ env('OC_ASCENT_HL_TXT_COLOR', 'text-white') }}
        @endif
        --}}
        w-100 h-100 py-3 font-weight-bold text-left border-0-rm rounded-0
        @if ($bordered ?? false)
          border-bottom-rm
        @endif
        "
      style="font-size: calc(0.7rem + 0.15vw);
        @if(Route::current()->getName() == $btnRoute)
          {{--
          --}}
          background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
          color: white;
        @endif
      "
      >

    <div class="d-flex flex-column-rm">
      <div class="d-flex justify-content-center mr-4 mt-1">
        <i class="{{ $iconFaClass }} @if(Route::current()->getName() == $btnRoute) text-white-rm @else text-muted @endif"></i>
      </div>
      <div class="d-flex justify-content-center">
        <strong style="@if(Route::current()->getName() == $btnRoute) text-shadow: 0.5px 0 white @else text-shadow: 0.5px 0 black @endif ; font-weight:bold;">
        {{ $btnText }}
        </strong>
      </div>
    </div>

  </a>
</div>
