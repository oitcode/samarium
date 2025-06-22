<div class="d-none d-md-block {{ config('app.app_top_menu_bg_color') }}-rm bg-white text-dark {{ config('app.app_top_menu_text_color') }}-rm border-bottom">
  <div class="d-flex justify-content-between o-darker-rm py-2">
    @guest
    @else
      <div class="p-2 px-3">
        <i class="fas fa-check-circle mr-1"></i>
        <span class="o-heading {{ config('app.app_top_menu_text_color') }}-rm">
          {{ config('app.name') }}
        </span>
      </div>

      {{-- Top menu buttons. --}}
      <div>
        {{-- User related. Is placed on top right part. --}}
        @include ('partials.dashboard.app-top-menu-user-dropdown')
      </div>
    @endguest
  </div>
</div>
