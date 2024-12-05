<div class="d-none d-md-block py-2-rm text-right bg-dark text-white"
    style="{{-- background-color: {{ config('app.oc_select_color') }}; color: white;  background-image: linear-gradient(to right, {{ config('app.oc_select_color', '#000050') }} , {{
    config('app.oc_select_color', '#000050') }}); --}}">
  <div class="o-darker py-2">
  @guest
  @else

    <div class="float-left d-flex">
      <div class="p-2 px-3" style="color: {{ config('app.oc_select_txt_color') }};">
        <i class="fas fa-check-circle fa-2x-rm"></i>
        @if (false)
        <span class="h3 ml-3">
          Ozone
        </span>
        @endif
      </div>
      @if (false)
        @if (\App\Company::first() && \App\Company::first()->logo_image_path)
          <div class="d-flex justify-content-start mr-3 pl-3">
            <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}" class="img-fluid" style="height: 50px;">
          </div>
        @endif
      @endif
      @if (false)
      <div class="d-flex flex-column justify-content-center">
        <h1 class="pl-3 h4" style="">
          {{ \App\Company::first()->name }}
        </h1>
      </div>
      @endif
    </div>
    {{-- Top menu buttons. --}}

  @if (has_module('shop'))
    @if (false)
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-purchase',
      'iconFaClass' => 'fas fa-shopping-cart',
      'btnText' => 'Purchase',
    ])
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-expense',
      'iconFaClass' => 'fas fa-tools',
      'btnText' => 'Expense',
    ])
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-vendor',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Vendors',
    ])
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-report',
      'iconFaClass' => 'fas fa-chart-line',
      'btnText' => 'Report',
    ])
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-inventory',
      'iconFaClass' => 'fas fa-dolly',
      'btnText' => 'Inventory',
    ])
    @if (config('app.has_vat') == true)
      @include ('partials.dashboard.app-top-menu-button', [
        'btnRoute' => 'dashboard-vat',
        'iconFaClass' => 'fas fa-solar-panel',
        'btnText' => 'VAT',
      ])
    @endif
    @endif
  @endif

    <div class="pt-2 float-right">

    @if (true)
    <div class="float-left mr-5 px-2 border-left-rm" style="padding-top: 1px;">
      @livewire ('misc.clock-display-component')
    </div>
    @endif

    {{-- User related. Is placed on top right part. --}}
    @include ('partials.dashboard.app-top-menu-user-dropdown')

    @if (false)
      @if (has_module('cms'))
        {{-- Todo: This could be moved somewhere else --}}
        @include ('partials.dashboard.app-top-menu-ecs-dropdown')
      @endif
    @endif

    @if (has_module('shop'))
      {{-- Online order counter component --}}
      <div class="float-right mx-4-rm px-2 border-left-rm" style="padding-top: 1px;">
        <a href="{{ route('online-order') }}" class="text-reset">
          @livewire ('online-order.dashboard.online-order-counter')
        </a>
      </div>
    @endif

    {{-- Help/Support --}}
    <div class="float-right mx-4-rm px-2 border-left-rm" style="padding-top: 1px;">
      <a href="{{ route('dashboard-help') }}" class="text-reset">
        <i  class="fas fa-question-circle text-dark-rm mr-2" style="color: {{ config('app.oc_select_txt_color') }}"></i>
      </a>
    </div>

    {{-- Misc. Misc operations. --}}
    <div class="float-right mx-4-rm px-2 border-left-rm">
      @include ('partials.dashboard.app-top-menu-misc-dropdown')
    </div>

    {{-- Go to website --}}
    <div class="float-right mx-4-rm px-2 border-left-rm" style="padding-top: 1px;">
      <a href="/" target="_blank" class="text-reset">
        <i  class="fas fa-globe text-dark-rm mr-2" style="color: {{ config('app.oc_select_txt_color') }}"></i>
      </a>
    </div>

    @if (false)
    <div class="float-right mx-4-rm px-2 border-left-rm">
      @livewire ('lv-package-info')
    </div>
    @endif
    </div>

  <div class="clearfix">
  </div>

  @endguest
  </div>
</div>
