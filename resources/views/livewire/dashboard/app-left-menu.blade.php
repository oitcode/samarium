<div class="w-100">
@if (true)
<div class="d-none d-md-block">

  <div class="border-top">
  @include ('partials.dashboard.app-left-menu-button',
      [
          'btnRoute' => 'dashboard',
          'iconFaClass' => 'fas fa-tv',
          'btnText' => 'Dashboard',
          'bordered' => 'yes',
      ])
  </div>





  @if (preg_match("/product/i", env('MODULES')))
    @if ($modes['product'])
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "exitMode('product')",
          'btnIconFaClass' => 'fas fa-shopping-cart',
          'btnText' => 'Product',
          'btnCheckMode' => 'product',
      ])
    @else
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "enterModeSilent('product')",
          'btnIconFaClass' => 'fas fa-shopping-cart',
          'btnText' => 'Product',
          'btnCheckMode' => 'product',
      ])
    @endif

    @if ($modes['product'])
      {{--
      |
      |
      | Product route buttons
      |
      |
      --}}

      <div class="o-animated-rm mb-3 border-bottom">
        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'menu',
                'iconFaClass' => 'fas fa-list',
                'btnText' => 'Products',
            ])

        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'product-category',
                'iconFaClass' => 'fas fa-list',
                'btnText' => 'Product category',
            ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-inventory',
          'iconFaClass' => 'fas fa-dolly',
          'btnText' => 'Inventory',
        ])
      </div>

    @endif
    @if (false)
    <hr class="m-0 p-0"/>
    @endif
  @endif








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
      <div class="o-animated-rm mb-3 border-bottom">
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
                  'btnType' => 'btn-primary',
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
                'btnRoute' => 'dashboard-purchase',
                'iconFaClass' => 'fas fa-shopping-cart',
                'btnText' => 'Purchase',
            ])

        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'dashboard-expense',
                'iconFaClass' => 'fas fa-tools',
                'btnText' => 'Expense',
            ])


        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'customer',
                'iconFaClass' => 'fas fa-users',
                'btnText' => 'Customer',
            ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-vendor',
          'iconFaClass' => 'fas fa-users',
          'btnText' => 'Vendors',
        ])


        @include ('partials.dashboard.app-left-menu-button',
            [
                'btnRoute' => 'online-order',
                'iconFaClass' => 'fas fa-cloud-download-alt',
                'btnText' => 'Weborder',
            ])

        @if (env('HAS_VAT') == true)
          @include ('partials.dashboard.app-left-menu-button', [
            'btnRoute' => 'dashboard-vat',
            'iconFaClass' => 'fas fa-solar-panel',
            'btnText' => 'VAT',
          ])
        @endif

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-accounting',
          'iconFaClass' => 'fas fa-book',
          'btnText' => 'Accounting',
        ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-sale-quotation',
          'iconFaClass' => 'fas fa-edit',
          'btnText' => 'Quotation',
        ])
      </div>
    @endif
    @if (false)
    <hr class="m-0 p-0"/>
    @endif
  @endif


  @if (preg_match("/cms/i", env('MODULES')))
    @if ($modes['cms'])
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "exitMode('cms')",
          'btnIconFaClass' => 'fas fa-book',
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

      <div class="o-animated-rm mb-3 border-bottom">
        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-cms-webpage',
          'iconFaClass' => 'fas fa-clone',
          'btnText' => 'Pages',
        ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-cms-post',
          'iconFaClass' => 'fas fa-edit',
          'btnText' => 'Posts',
        ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-cms-nav-menu',
          'iconFaClass' => 'fas fa-link',
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
      </div>
    @endif
    @if (false)
    <hr class="m-0 p-0"/>
    @endif
  @endif


  @if (preg_match("/school/i", env('MODULES')))

    @if ($modes['school'])
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "exitMode('school')",
          'btnIconFaClass' => 'fas fa-calendar',
          'btnText' => 'Calendar',
          'btnCheckMode' => 'school',
      ])
    @else
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "enterModeSilent('school')",
          'btnIconFaClass' => 'fas fa-calendar',
          'btnText' => 'Calendar',
          'btnCheckMode' => 'school',
      ])
    @endif

    @if ($modes['school'])

      {{--
      |
      |
      | School route buttons
      |
      |
      --}}

      <div class="o-animated-rm mb-3 border-bottom">
        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-school-calendar',
          'iconFaClass' => 'fas fa-calendar',
          'btnText' => 'Calendar',
        ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-calendar-group',
          'iconFaClass' => 'fas fa-users',
          'btnText' => 'Calendar group',
        ])

        @if (false)
        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-school-calendar',
          'iconFaClass' => 'fas fa-calendar',
          'btnText' => 'Event',
        ])
        @endif
      </div>

    @endif

    @if (false)
    <hr class="m-0 p-0"/>
    @endif
  @endif


  @if (preg_match("/team/i", env('MODULES')))

    @if ($modes['team'])
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "exitMode('team')",
          'btnIconFaClass' => 'fas fa-users',
          'btnText' => 'Team',
          'btnCheckMode' => 'team',
      ])
    @else
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "enterModeSilent('team')",
          'btnIconFaClass' => 'fas fa-users',
          'btnText' => 'Team',
          'btnCheckMode' => 'team',
      ])
    @endif

    @if ($modes['team'])

      {{--
      |
      |
      | Team route buttons
      |
      |
      --}}
      <div class="o-animated-rm mb-3 border-bottom">
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

    @if (false)
    <hr class="m-0 p-0"/>
    @endif
  @endif



  @if (preg_match("/report/i", env('MODULES')))

    @if ($modes['report'])
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "exitMode('report')",
          'btnIconFaClass' => 'fas fa-chart-line',
          'btnText' => 'Report',
          'btnCheckMode' => 'report',
      ])
    @else
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "enterModeSilent('report')",
          'btnIconFaClass' => 'fas fa-chart-line',
          'btnText' => 'Report',
          'btnCheckMode' => 'report',
      ])
    @endif

    @if ($modes['report'])

      {{--
      |
      |
      | Team route buttons
      |
      |
      --}}

      <div class="o-animated-rm mb-3 border-bottom">
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

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-report',
          'iconFaClass' => 'fas fa-chart-line',
          'btnText' => 'Report',
        ])
      </div>

    @endif

    @if (false)
    <hr class="m-0 p-0"/>
    @endif
  @endif


  @if (preg_match("/crm/i", env('MODULES')))

    @if ($modes['crm'])
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "exitMode('crm')",
          'btnIconFaClass' => 'fas fa-users',
          'btnText' => 'CRM',
          'btnCheckMode' => 'crm',
      ])
    @else
      @include ('partials.dashboard.app-left-menu-button-lw', [
          'btnClickMethod' => "enterModeSilent('crm')",
          'btnIconFaClass' => 'fas fa-users',
          'btnText' => 'CRM',
          'btnCheckMode' => 'crm',
      ])
    @endif

    @if ($modes['crm'])

      {{--
      |
      |
      | Team route buttons
      |
      |
      --}}
      <div class="o-animated-rm mb-3 border-bottom">
        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-contact-form',
          'iconFaClass' => 'fas fa-sms',
          'btnText' => 'Contact message',
        ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-appointment',
          'iconFaClass' => 'fas fa-paste',
          'btnText' => 'Appointment',
        ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-newsletter-subscription',
          'iconFaClass' => 'fas fa-envelope',
          'btnText' => 'Newsletter subscription',
        ])

        @include ('partials.dashboard.app-left-menu-button', [
          'btnRoute' => 'dashboard-testimonial',
          'iconFaClass' => 'fas fa-sms',
          'btnText' => 'Testimonial',
        ])
      </div>

    @endif

    @if (false)
    <hr class="m-0 p-0"/>
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
    'btnRoute' => 'dashboard-vacancy',
    'iconFaClass' => 'fas fa-edit',
    'btnText' => 'Vacancy',
  ])

  @if (false)
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

  @can ('is-admin')
    @include ('partials.dashboard.app-left-menu-button', [
      'btnRoute' => 'dashboard-users',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Users',
    ])
  @endcan
  @endif

  @include ('partials.dashboard.app-left-menu-button', [
    'btnRoute' => 'dashboard-todo',
    'iconFaClass' => 'fas fa-tasks',
    'btnText' => 'Tasks',
  ])

  @if (false)
  @include ('partials.dashboard.app-left-menu-button', [
    'btnRoute' => 'dashboard-help',
    'iconFaClass' => 'fas fa-question-circle',
    'btnText' => 'Help',
  ])
  @endif

  <div class="px-3 py-2 border-top">
    @if (false)
    <div class="">
      Logout
    </div>
    @endif
    <div class="my-2 text-muted-rm" style="color: {{ env('OC_UNSELECT_TXT_COLOR') }};">
      Version 0.8.1
    </div>
  </div>

</div>
@endif
</div>
