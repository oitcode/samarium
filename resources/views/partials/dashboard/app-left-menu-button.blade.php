<div class="text-center-rm border-rm">
  <a href="{{ route($btnRoute) }}"
      class="btn
        {{--
        @if(Route::current()->getName() != $btnRoute)
          {{ config('app.oc_ascent_btn_color', 'btn-primary') }}
        @else
          {{ config('app.oc_ascent_hl_txt_color', 'text-white') }}
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
          color: {{ config('app.oc_select_txt_color') }};
          --}}
        @else
          {{--
          color: {{ config('app.oc_unselect_txt_color') }};
          --}}
        @endif
      "
      >

    <div class="d-flex flex-column-rm">
      <div class="d-flex justify-content-center mr-2 mt-1">
        <i class="{{ $iconFaClass }}"></i>
      </div>
      <div class="d-flex justify-content-center">
        <strong style="{{-- @if(Route::current()->getName() == $btnRoute) text-shadow: 0.5px 0 {{ config('app.oc_select_txt_color') }} @else text-shadow: 0.5px 0 {{ config('app.oc_unselect_txt_color') }} @endif ; font-weight:bold; --}}">
        {{ $btnText }}
        </strong>
      </div>
    </div>

  </a>
</div>
