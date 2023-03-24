<div class="w-100">
@if (true)
<div class="d-none d-md-block">

  @include ('partials.dashboard.app-left-menu-button',
      [
          'btnRoute' => 'dashboard',
          'iconFaClass' => 'fas fa-tv',
          'btnText' => 'Dashboard',
      ])


  @if (preg_match("/shop/i", env('MODULES')))
    @if ($modes['shop'])
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "exitMode('shop')",
          'btnIconFaClass' => 'fas fa-shopping-cart',
          'btnText' => 'Shop',
          'btnCheckMode' => 'shop',
      ])
    @else
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "enterModeSilent('shop')",
          'btnIconFaClass' => 'fas fa-shopping-cart',
          'btnText' => 'Shop',
          'btnCheckMode' => 'shop',
      ])
    @endif

    @if ($modes['shop'])
      {{--
      |
      |
      | SHop route buttons
      |
      |
      --}}
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

      @if (env('CMP_TYPE') == 'cafe')
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


      @include ('partials.dashboard.app-left-menu-button',
          [
              'btnRoute' => 'online-order',
              'iconFaClass' => 'fas fa-cloud-download-alt',
              'btnText' => 'Weborder',
          ])

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
  @endif

  @if (preg_match("/cms/i", env('MODULES')))
    @if ($modes['cms'])
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "exitMode('cms')",
          'btnIconFaClass' => 'fas fa-shopping-cart',
          'btnText' => 'CMS',
          'btnCheckMode' => 'cms',
      ])
    @else
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "enterModeSilent('cms')",
          'btnIconFaClass' => 'fas fa-book',
          'btnText' => 'CMS',
          'btnCheckMode' => 'cms',
      ])
    @endif
    @if ($modes['cms'])
      {{--
      |
      |
      | CMS route buttons
      |
      |
      --}}

      <div class="o-animated">
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
          'btnRoute' => 'dashboard-cms-theme',
          'iconFaClass' => 'fas fa-star',
          'btnText' => 'Theme',
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
      </div>
    @endif
  @endif

  @if ($modes['bgc'])
    {{--
    |
    |
    | BGC route buttons
    |
    |
    --}}

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

  @include ('partials.dashboard.app-left-menu-button', [
    'btnRoute' => 'company',
    'iconFaClass' => 'fas fa-home',
    'btnText' => 'Company',
  ])

  @include ('partials.dashboard.app-left-menu-button', [
    'btnRoute' => 'dashboard-settings',
    'iconFaClass' => 'fas fa-cog',
    'btnText' => 'Settings',
  ])

  @include ('partials.dashboard.app-left-menu-button', [
    'btnRoute' => 'dashboard-todo',
    'iconFaClass' => 'fas fa-tasks',
    'btnText' => 'Todo',
  ])

  @include ('partials.dashboard.app-left-menu-button', [
    'btnRoute' => 'dashboard-accounting',
    'iconFaClass' => 'fas fa-book',
    'btnText' => 'Accounting',
  ])

  @include ('partials.dashboard.app-left-menu-button', [
    'btnRoute' => 'dashboard-accounting',
    'iconFaClass' => 'fas fa-question-circle',
    'btnText' => 'Help',
  ])
</div>
@endif
</div>
