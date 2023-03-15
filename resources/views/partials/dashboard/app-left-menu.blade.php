{{-- Show only in bigger screens --}}
<div class="d-none d-md-block">

  {{-- Top most button in the left menu. --}}
  @if (false)
  <div class="text-center border-rm">
    <a href="{{ route('dashboard') }}" class="btn btn-warning-rm w-100 h-100 p-3 pl-4 font-weight-bold text-left" style="font-size: 1rem;">
      <div class="d-flex justify-content-center">
        <i class="far fa-check-circle text-primary mr-1" style="font-size: 1.3rem;"></i>
      </div>
      <span class="" style="font-size: 1.3rem;">
      </span>
    </a>
  </div>
  @endif

  @if (preg_match("/dashboard/i", env('MODULES')))
    @include ('partials.dashboard.app-left-menu-button',
        [
            'btnRoute' => 'dashboard',
            'iconFaClass' => 'fas fa-tv',
            'btnText' => 'Dashboard',
        ])
  @endif

  @if (preg_match("/shop/i", env('MODULES')))
    @can ('is-admin')
      @if (env('CMP_TYPE') == 'shop')
        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'sale',
                'iconFaClass' => 'fas fa-dice-d6',
                'btnText' => 'Sales',
            ])
      @else
        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'sale',
                'iconFaClass' => 'fas fa-skating',
                'btnText' => 'Takeaway',
            ])
      @endif
    @endcan

    @if (env('CMP_TYPE') == 'cafe')
      @include ('partials.dashboard.app-left-menu-button',
          [
              'btnRoute' => 'cafesale',
              'iconFaClass' => 'fas fa-table',
              'btnText' => 'Tables',
          ])
    @endif

    @include ('partials.dashboard.app-left-menu-button',
        [
            'btnRoute' => 'customer',
            'iconFaClass' => 'fas fa-users',
            'btnText' => 'Customer',
        ])

    @include ('partials.dashboard.app-left-menu-button',
        [
            'btnRoute' => 'dashboard-purchase',
            'iconFaClass' => 'fas fa-shopping-cart',
            'btnText' => 'Purchase',
        ])

    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-vendor',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Vendors',
    ])

    @include ('partials.dashboard.app-left-menu-button',
        [
            'btnRoute' => 'dashboard-expense',
            'iconFaClass' => 'fas fa-tools',
            'btnText' => 'Expense',
        ])
  @endif

  @if (preg_match("/shop/i", env('MODULES')))
    @can ('is-admin')
      @if (env('CMP_TYPE') == 'cafe')
        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'menu',
                'iconFaClass' => 'fas fa-list',
                'btnText' => 'Menu',
            ])
      @else
        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'menu',
                'iconFaClass' => 'fas fa-list',
                'btnText' => 'Products',
            ])
      @endif
    @endcan

    @can ('is-admin')
      @include ('partials.dashboard.app-left-menu-button',
          [
              'btnRoute' => 'daybook',
              'iconFaClass' => 'fas fa-book',
              'btnText' => 'Daybook',
          ])

      @include ('partials.dashboard.app-left-menu-button',
          [
              'btnRoute' => 'weekbook',
              'iconFaClass' => 'fas fa-book',
              'btnText' => 'Weekbook',
          ])

    @endcan

    @can ('is-admin')
      @include ('partials.dashboard.app-left-menu-button',
          [
              'btnRoute' => 'online-order',
              'iconFaClass' => 'fas fa-cloud-download-alt',
              'btnText' => 'Weborder',
          ])
    @endcan
  @endif

  @if (preg_match("/shop/i", env('MODULES')))
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-report',
      'iconFaClass' => 'fas fa-chart-line',
      'btnText' => 'Report',
    ])
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-inventory',
      'iconFaClass' => 'fas fa-dolly',
      'btnText' => 'Inventory',
    ])
    @if (env('HAS_VAT') == true)
      @include ('partials.dashboard.app-left-menu-button', [
        'btnRoute' => 'dashboard-vat',
        'iconFaClass' => 'fas fa-solar-panel',
        'btnText' => 'VAT',
      ])
    @endif
  @endif
</div>
