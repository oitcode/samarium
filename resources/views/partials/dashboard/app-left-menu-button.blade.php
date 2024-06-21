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
        text-white
        "
      style="font-size: calc(0.7rem + 0.15vw);
        @if(Route::current()->getName() == $btnRoute)
          background-color: rgba(0, 0, 0, 0.3);
          {{--
          color: {{ env('OC_SELECT_TXT_COLOR') }};
          --}}
        @else
          {{--
          color: {{ env('OC_UNSELECT_TXT_COLOR') }};
          --}}
        @endif
      "
      >

    <div class="d-flex flex-column-rm">
      <div class="d-flex justify-content-center mr-2 mt-1">
        <i class="{{ $iconFaClass }}"></i>
      </div>
      <div class="d-flex justify-content-center">
        <strong style="{{-- @if(Route::current()->getName() == $btnRoute) text-shadow: 0.5px 0 {{ env('OC_SELECT_TXT_COLOR') }} @else text-shadow: 0.5px 0 {{ env('OC_UNSELECT_TXT_COLOR') }} @endif ; font-weight:bold; --}}">
        {{ $btnText }}
        </strong>
      </div>
    </div>

  </a>
</div>
