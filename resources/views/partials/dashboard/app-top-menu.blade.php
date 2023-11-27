<div class="d-none d-md-block py-2-rm text-right"
    style="background-color: {{ env('OC_SELECT_COLOR') }}; color: white; {{--  background-image: linear-gradient(to right, {{ env('OC_SELECT_COLOR', '#000050') }} , {{
    env('OC_SELECT_COLOR', '#000050') }}); --}}">
  <div class="o-darker-rm py-2">
  @guest
  @else

    <div class="float-left d-flex">
      <div class="p-2" style="color: {{ env('OC_SELECT_TXT COLOR') }};">
        <i class="fas fa-feather-alt fa-2x"></i>
        @if (true)
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

  @if (preg_match("/shop/i", env('MODULES')))
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
    @if (env('HAS_VAT') == true)
      @include ('partials.dashboard.app-top-menu-button', [
        'btnRoute' => 'dashboard-vat',
        'iconFaClass' => 'fas fa-solar-panel',
        'btnText' => 'VAT',
      ])
    @endif
    @endif
  @endif

    <div class="pt-2 float-right">
    {{-- User related. Is placed on top right part. --}}
    @include ('partials.dashboard.app-top-menu-user-dropdown')

    @if (false)
      @if (preg_match("/cms/i", env('MODULES')))
        {{-- Todo: This could be moved somewhere else --}}
        @include ('partials.dashboard.app-top-menu-ecs-dropdown')
      @endif
    @endif

    @if (preg_match("/shop/i", env('MODULES')))
      {{-- Online order counter component --}}
      <div class="float-right mx-4-rm px-2 border-left-rm" style="font-size: 1.3rem; padding-top: 1px;">
        <a href="{{ route('online-order') }}" class="text-reset">
          @livewire ('online-order-counter')
        </a>
      </div>
    @endif

    {{-- Help/Support --}}
    <div class="float-right mx-4-rm px-2 border-left-rm" style="font-size: 1.3rem; padding-top: 1px;">
      <a href="{{ route('dashboard-help') }}">
        <i  class="fas fa-question-circle text-dark-rm mr-2" style="color: {{ env('OC_SELECT_TXT_COLOR') }}"></i>
      </a>
    </div>

    {{-- Misc. Misc operations. --}}
    <div class="float-right mx-4-rm px-2 border-left-rm" style="font-size: 1.3rem;">
      @include ('partials.dashboard.app-top-menu-misc-dropdown')
    </div>

    {{-- Go to website --}}
    <div class="float-right mx-4-rm px-2 border-left-rm" style="font-size: 1.3rem; padding-top: 1px;">
      <a href="/" target="_blank">
        <i  class="fas fa-globe text-dark-rm mr-2" style="color: {{ env('OC_SELECT_TXT_COLOR') }}"></i>
      </a>
    </div>

    @if (false)
    <div class="float-right mx-4-rm px-2 border-left-rm" style="font-size: 1.3rem;">
      @livewire ('lv-package-info')
    </div>
    @endif
    </div>

  <div class="clearfix">
  </div>

  @endguest
  </div>
</div>
