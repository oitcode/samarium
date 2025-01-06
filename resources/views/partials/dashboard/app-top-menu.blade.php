<div class="d-none d-md-block bg-dark text-white">
  <div class="o-darker py-2 d-flex justify-content-between ">
    @guest
    @else
      <div class="p-2 px-3">
        <i class="fas fa-check-circle text-success mr-1"></i>
        <span class="o-heading text-success">
          Samarium
        </span>
      </div>

      {{-- Top menu buttons. --}}
      <div class="d-flex flex-column justify-content-center">

        <div class="d-flex">
          @if (false)
          <div class="mr-5 px-2">
            @livewire ('misc.clock-display-component')
          </div>

          {{-- Go to website --}}
          <div class="px-2 pt-2">
            <a href="/" target="_blank" class="text-reset">
              <i  class="fas fa-globe mr-2" style="color: {{ config('app.oc_select_txt_color') }}"></i>
            </a>
          </div>

          {{-- Misc. Misc operations. --}}
          <div class="px-2">
            @include ('partials.dashboard.app-top-menu-misc-dropdown')
          </div>

          {{-- Help/Support --}}
          <div class="px-2 pt-2">
            <a href="{{ route('dashboard-help') }}" class="text-reset">
              <i  class="fas fa-question-circle mr-2" style="color: {{ config('app.oc_select_txt_color') }}"></i>
            </a>
          </div>

          @if (has_module('shop'))
            {{-- Online order counter component --}}
            <div class="px-2 pt-2">
              <a href="{{ route('online-order') }}" class="text-reset">
                @livewire ('online-order.dashboard.online-order-counter')
              </a>
            </div>
          @endif
          @endif

          {{-- User related. Is placed on top right part. --}}
          @include ('partials.dashboard.app-top-menu-user-dropdown')

        </div>
      </div>
    @endguest
  </div>
</div>
