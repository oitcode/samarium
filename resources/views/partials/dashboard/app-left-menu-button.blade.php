<div class="mx-3">
  <a href="{{ route($btnRoute) }}"
      class="btn
        w-100 h-100 py-2 font-weight-bold-rm text-left rounded-0
        @if ($bordered ?? false)
        @endif
        "
      style="
        @if(Route::current()->getName() == $btnRoute)
          background-color: rgba(100, 150, 250, 0.5);
        @else
        @endif
        border-radius: 15px !important;
      "
      >

    <div class="d-flex">
      @if (false)
      <div class="d-flex justify-content-center mr-2 mt-1">
        <i class="{{ $iconFaClass }} {{ config('app.app_menu_dropdown_button_text_color') }}"></i>
      </div>
      @endif
      <div class="d-flex justify-content-center o-heading-rm {{ config('app.app_menu_dropdown_button_text_color') }}">
        <strong>
        {{ $btnText }}
        </strong>
      </div>
    </div>

  </a>
</div>
