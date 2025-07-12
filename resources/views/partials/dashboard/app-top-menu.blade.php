<div class="d-none d-md-block {{ config('app.app_top_menu_bg_color') }}-rm bg-white text-dark {{ config('app.app_top_menu_text_color') }}-rm border-bottom">
  <div class="d-flex justify-content-between o-darker-rm py-2">
    @guest
    @else
      <div class="d-flex flex-column justify-content-center p-2 px-3">
        <div class="d-flex">
          <div class="h1 mb-0 text-primary o-heading mr-2">
            <i class="fas fa-meteor mr-1 text-primary"></i>
            @if (false)
            <span class="o-heading {{ config('app.app_top_menu_text_color') }}-rm">
              @if (false)
              {{ config('app.name') }}
              @endif
              {{ $company->name }}
            </span>
            @endif
          </div>
          <div class="h6 mb-0 text-primary o-heading">
            <div class="d-flex flex-column justify-content-center h-100">
              @if (false)
              <span class="o-heading {{ config('app.app_top_menu_text_color') }}-rm">
                Samarium
              </span>
              @endif
            </div>
          </div>
        </div>
      </div>

      {{-- Top menu buttons. --}}
      <div>
        {{-- User related. Is placed on top right part. --}}
        @include ('partials.dashboard.app-top-menu-user-dropdown')
      </div>
    @endguest
  </div>
</div>
