<div class="bg-white py-2-rm text-right d-none d-md-block mb-3 border-bottom-rm">
  @guest
  @else

    {{-- Top menu buttons. --}}

    @include ('partials.app-top-menu-button', [
      'btnRoute' => 'dashboard-purchase',
      'iconFaClass' => 'fas fa-shopping-cart',
      'btnText' => 'Purchase',
    ])
    @include ('partials.app-top-menu-button', [
      'btnRoute' => 'dashboard-expense',
      'iconFaClass' => 'fas fa-tools',
      'btnText' => 'Expense',
    ])
    @include ('partials.app-top-menu-button', [
      'btnRoute' => 'dashboard-vendor',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Vendors',
    ])
    @include ('partials.app-top-menu-button', [
      'btnRoute' => 'dashboard-report',
      'iconFaClass' => 'fas fa-chart-line',
      'btnText' => 'Report',
    ])
    @include ('partials.app-top-menu-button', [
      'btnRoute' => 'dashboard-inventory',
      'iconFaClass' => 'fas fa-dolly',
      'btnText' => 'Inventory',
    ])
    @if (env('HAS_VAT') == true)
      @include ('partials.app-top-menu-button', [
        'btnRoute' => 'dashboard-vat',
        'iconFaClass' => 'fas fa-solar-panel',
        'btnText' => 'VAT',
      ])
    @endif

    {{-- User related. Is placed on top right part. --}}
    @include ('partials.app-top-menu-user-dropdown')

    @if (env('SITE_TYPE') == 'school')
      @include ('partials.app-top-menu-school-dropdown')
    @endif

    {{-- Todo: This could be moved somewhere else --}}
    @if (env('SITE_TYPE') == 'ecs' || env('SITE_TYPE') == 'school')
      @include ('partials.app-top-menu-ecs-dropdown')
    @endif

    {{-- Online order counter component --}}
    <div class="float-right mx-4 px-4 border-left-rm" style="font-size: 1.3rem;">
      @livewire ('online-order-counter')
    </div>
  @endguest

  <div class="clearfix">
  </div>

</div>
