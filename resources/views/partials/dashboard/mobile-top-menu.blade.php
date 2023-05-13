<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('dashboard') }}">
    <i class="fas fa-check-circle fa-2x mr-3 text-info" style="{{-- font-size: 1.3rem; --}}"></i>
    <span class="h2">
      Ozone
    </span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    @if (false)
    <span class="navbar-toggler-icon"></span>
    @endif
    <i class="fas fa-list fa-2x"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @can ('is-admin')
        <li class="nav-item border bg-success text-white p-3">
          <a class="nav-link text-white" href="{{ route('dashboard') }}">
            <i class="fas fa-tv mr-3"></i>
            Dashboard 
          </a>
        </li>
      @endcan

      <li class="nav-item border bg-success text-white p-3">
        <a class="nav-link text-white" href="{{ route('sale') }}">
          @if (env('CMP_TYPE') == 'cafe')
            <i class="fas fa-skating mr-3"></i>
            Takeaway
          @else
            <i class="fas fa-dice-d6 mr-3"></i>
            Sales
          @endif
        </a>
      </li>

      @if (env('CMP_TYPE') == 'cafe')
        <li class="nav-item border bg-success text-white p-3">
          <a class="nav-link text-white" href="{{ route('cafesale') }}">
            <i class="fas fa-table mr-3"></i>
            Tables
          </a>
        </li>
      @endif

      @can ('is-admin')
      <li class="nav-item border bg-success text-white p-3">
        <a class="nav-link text-white" href="{{ route('menu') }}">
          <i class="fas fa-list mr-3"></i>
          @if (env('CMP_TYPE') == 'cafe')
            Menu
          @else
            Products
          @endif
        </a>
      </li>
      @endcan

      @can ('is-admin')
      <li class="nav-item border bg-success text-white p-3">
        <a class="nav-link text-white" href="{{ route('daybook') }}">
          <i class="fas fa-book mr-3"></i>
          Daybook
        </a>
      </li>
      @endcan

      @can ('is-admin')
      <li class="nav-item border bg-success text-white p-3">
        <a class="nav-link text-white" href="{{ route('weekbook') }}">
          <i class="fas fa-book mr-3"></i>
          Weekbook
        </a>
      </li>
      @endcan

      @can ('is-admin')
      <li class="nav-item border bg-success text-white p-3">
        <a class="nav-link text-white" href="{{ route('online-order') }}">
          <i class="fas fa-cloud-download-alt mr-3"></i>
          Weborder
        </a>
      </li>
      @endcan


      @can ('is-admin')
      <li class="nav-item dropdown bg-success text-white p-3 border">
        <a class="nav-link dropdown-toggle text-white" href="#" id="mobTopMenuDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-list text-secondry mr-2"></i>
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="mobTopMenuDropdown1">
          <a class="dropdown-item" href="{{ route('dashboard-purchase') }}">
            <i class="fas fa-shopping-cart text-secondary mr-2"></i>
            Purchase
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-expense') }}">
            <i class="fas fa-wrench text-secondary mr-2"></i>
            Expense
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-vendor') }}">
            <i class="fas fa-users text-secondary mr-2"></i>
            Vendors
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-report') }}">
            <i class="fas fa-chart-line text-secondary mr-2"></i>
            Report
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-inventory') }}">
            <i class="fas fa-dolly text-secondary mr-2"></i>
            Inventory
          </a>
        </div>
      </li>
      @endcan

      @guest
      @else
        <li class="nav-item dropdown bg-success text-white p-3 border">
          <a class="nav-link dropdown-toggle text-white" href="#" id="mobTopMenuDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog text-secondry mr-2"></i>
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="mobTopMenuDropdown2">
            @can ('is-admin')
            <a class="dropdown-item" href="{{ route('company') }}">
              <i class="fas fa-home text-secondary mr-2"></i>
              Company
            </a>
            @endcan
            @can ('is-admin')
            <a class="dropdown-item" href="{{ route('dashboard-accounting') }}">
              <i class="fas fa-book text-secondary mr-2"></i>
              Accounting
            </a>
            @endcan
            @can ('is-admin')
            <a class="dropdown-item" href="{{ route('dashboard-settings') }}">
              <i class="fas fa-cog text-secondary mr-2"></i>
              Settings
            </a>
            @endcan
            <a class="dropdown-item" href="{{ route('dashboard-change-password') }}">
              <i class="fas fa-key text-secondary mr-2"></i>
              Change password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="">
              <i class="fas fa-history text-secondary mr-2"></i>
              v0.6.3
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
            >
              <i class="fas fa-power-off mr-2 text-warning-rm"></i>
              Logout
            </a>
          </div>
        </li>
      @endguest

    </ul>
  </div>
</nav>
