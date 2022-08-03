<div class="bg-white py-2-rm text-right d-none d-md-block mb-3 border-bottom-rm">
  @guest
  @else
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

    <div class="float-right text-white border-right-rm" style="font-size: 1.3rem;">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog text-secondry mr-2"></i>
          {{ Auth::user()->name }}
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
          <a class="dropdown-item" href="{{ route('company') }}">
            <i class="fas fa-home text-secondary mr-2"></i>
            Company
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-accounting') }}">
            <i class="fas fa-book text-secondary mr-2"></i>
            Accounting
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-settings') }}">
            <i class="fas fa-cog text-secondary mr-2"></i>
            Settings
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-change-password') }}">
            <i class="fas fa-key text-secondary mr-2"></i>
            Change password
          </a>
          <div class="dropdown-divider mb-0"></div>
          <a class="dropdown-item" href="">
            <i class="fas fa-history text-secondary mr-2"></i>
            v0.2.6
          </a>
          <div class="dropdown-divider mb-0"></div>
          <a class="dropdown-item mb-0" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
          >
            <i class="fas fa-power-off mr-2 text-warning-rm"></i>
            Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </div>
    </div>

    @if (env('SITE_TYPE') == 'ecs')
    <div class="float-right mx-4 px-4 text-white border-right-rm" style="font-size: 1.3rem;">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog text-secondry mr-2"></i>
          CMS
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a class="dropdown-item" href="{{ route('dashboard-cms-webpage') }}">
            <i class="fas fa-user text-secondary mr-2"></i>
            Pages
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-cms-nav-menu') }}">
            <i class="fas fa-home text-secondary mr-2"></i>
            Nav menu
          </a>
        </div>
      </div>
    </div>
    @endif

    {{-- Online order counter component --}}
    <div class="float-right mx-4 px-4 border-left-rm" style="font-size: 1.3rem;">
      @livewire ('online-order-counter')
    </div>
  @endguest

  <div class="clearfix">
  </div>

</div>
