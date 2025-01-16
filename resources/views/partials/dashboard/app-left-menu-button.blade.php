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
        <i class="{{ $iconFaClass }} {{ config('app.app_menu_dropdown_button_text_color') }}"></i>
      </div>
      <div class="d-flex justify-content-center o-heading {{ config('app.app_menu_dropdown_button_text_color') }}">
        <strong>
        {{ $btnText }}
        </strong>
      </div>
    </div>

  </a>
</div>
