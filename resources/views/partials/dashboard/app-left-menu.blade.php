{{-- Show only in bigger screens --}}
<div class="d-none d-md-block">

  {{-- Top most button in the left menu. --}}
  @if (false)
  <div class="text-center border-rm">
    <a href="{{ route('dashboard') }}" class="btn btn-warning-rm w-100 h-100 p-3 pl-4 font-weight-bold text-left">
      <div class="d-flex justify-content-center">
        <i class="far fa-check-circle text-primary mr-1"></i>
      </div>
      <span>
      </span>
    </a>
  </div>
  @endif

  @if (has_module('dashboard'))
    @include ('partials.dashboard.app-left-menu-button',
        [
            'btnRoute' => 'dashboard',
            'iconFaClass' => 'fas fa-tv',
            'btnText' => 'Dashboard',
        ])
  @endif

  @if (has_module('shop'))
    @can ('is-admin')
      @if (config('app.cmp_type') === 'shop')
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

    @if (config('app.cmp_type') === 'cafe')
      @include ('partials.dashboard.app-left-menu-button',
          [
              'btnRoute' => 'cafesale',
              'iconFaClass' => 'fas fa-table', 'btnText' => 'Tables', ])
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

  @if (has_module('shop'))
    @can ('is-admin')
      @if (config('app.cmp_type') === 'cafe')
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

  @if (has_module('shop'))
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
    @if (config('app.has_vat') == true)
      @include ('partials.dashboard.app-left-menu-button', [
        'btnRoute' => 'dashboard-vat',
        'iconFaClass' => 'fas fa-solar-panel',
        'btnText' => 'VAT',
      ])
    @endif
  @endif


  {{--
  |
  |
  | CMS route buttons
  |
  |
  --}}

  @if (has_module('cms'))
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-cms-webpage',
      'iconFaClass' => 'fas fa-globe',
      'btnText' => 'Pages',
    ])

    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-cms-post',
      'iconFaClass' => 'fas fa-book',
      'btnText' => 'Posts',
    ])

    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-cms-nav-menu',
      'iconFaClass' => 'fas fa-book',
      'btnText' => 'Nav menu',
    ])

    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-cms-gallery',
      'iconFaClass' => 'fas fa-image',
      'btnText' => 'Gallery',
    ])

    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-team',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Team',
    ])

    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-quick-contacts',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Quick contacts',
    ])
  @endif

  {{--
  |
  |
  | BGC route buttons
  |
  |
  --}}

  @if (has_module('bgc'))
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-organizing-committee',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Organizing committee',
    ])

    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-sponsors',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Sponsors',
    ])
  @endif


  {{--
  |
  |
  | Misc modules
  | 
  |
  --}}
  @if (false)
  @can ('is-admin')
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Users',
    ])
  @endcan
  @endif

  @can ('is-admin')
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'company',
      'iconFaClass' => 'fas fa-home',
      'btnText' => 'Company',
    ])
  @endcan

  @can ('is-admin')
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-settings',
      'iconFaClass' => 'fas fa-cog',
      'btnText' => 'Settings',
    ])
  @endcan

  @if (has_module('todo'))
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-todo',
      'iconFaClass' => 'fas fa-tasks',
      'btnText' => 'Todo',
    ])
  @endif

  @if (has_module('accounting'))
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-accounting',
      'iconFaClass' => 'fas fa-book',
      'btnText' => 'Accounting',
    ])
  @endif
</div>
