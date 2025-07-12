<div class="mx-3">
  <a href="{{ route($btnRoute) }}"
      class="btn
        w-100 h-100 py-2 font-weight-bold-rm text-left rounded-0
        @if ($bordered ?? false)
        @endif
        @if(Route::current()->getName() == $btnRoute)
          o-app-left-menu-hl-color-bg o-app-left-menu-hl-color-text
        @endif
        "
      style="
        @if(Route::current()->getName() == $btnRoute)
          color: {{ config('app.app_left_menu_hl_color_text') }};
        @else
          color: {{ config('app.app_left_menu_text_color') }};
        @endif
        border-radius: 15px !important;
      "
      >

    <div class="d-flex">
      <div class="d-flex justify-content-center o-heading-rm">
        <strong>
        {{ $btnText }}
        </strong>
      </div>
    </div>

  </a>
</div>
