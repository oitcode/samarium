<div class="d-none d-md-block text-right bg-dark text-white">
  <div class="o-darker py-2">
    @guest
    @else
      <div class="float-left d-flex">
        <div class="p-2 px-3" style="color: {{ config('app.oc_select_txt_color') }};">
          <i class="fas fa-check-circle"></i>
        </div>
      </div>

      {{-- Top menu buttons. --}}
      <div class="pt-2 float-right">

        <div class="float-left mr-5 px-2" style="padding-top: 1px;">
          @livewire ('misc.clock-display-component')
        </div>

        {{-- User related. Is placed on top right part. --}}
        @include ('partials.dashboard.app-top-menu-user-dropdown')

        @if (has_module('shop'))
          {{-- Online order counter component --}}
          <div class="float-right px-2" style="padding-top: 1px;">
            <a href="{{ route('online-order') }}" class="text-reset">
              @livewire ('online-order.dashboard.online-order-counter')
            </a>
          </div>
        @endif

        {{-- Help/Support --}}
        <div class="float-right px-2" style="padding-top: 1px;">
          <a href="{{ route('dashboard-help') }}" class="text-reset">
            <i  class="fas fa-question-circle mr-2" style="color: {{ config('app.oc_select_txt_color') }}"></i>
          </a>
        </div>

        {{-- Misc. Misc operations. --}}
        <div class="float-right px-2">
          @include ('partials.dashboard.app-top-menu-misc-dropdown')
        </div>

        {{-- Go to website --}}
        <div class="float-right px-2" style="padding-top: 1px;">
          <a href="/" target="_blank" class="text-reset">
            <i  class="fas fa-globe mr-2" style="color: {{ config('app.oc_select_txt_color') }}"></i>
          </a>
        </div>

      </div>

    <div class="clearfix">
    </div>

    @endguest
  </div>
</div>
