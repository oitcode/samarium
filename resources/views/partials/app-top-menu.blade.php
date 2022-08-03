      <div class="bg-white py-2-rm text-right d-none d-md-block mb-3 border-bottom-rm">
        @guest
        @else

          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-purchase') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-purchase')
                         btn-danger
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-shopping-cart mr-2"></i>
              Purchase
            </a>
          </div>
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-expense') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-expense')
                         btn-danger
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-tools mr-2"></i>
              Expense
            </a>
          </div>
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-vendor') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-vendor')
                         btn-primary
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-users mr-2"></i>
              Vendors
            </a>
          </div>
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-report') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-report')
                         btn-primary
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-chart-line mr-2"></i>
              Report
            </a>
          </div>
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-inventory') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-inventory')
                         btn-primary
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-dolly mr-2"></i>
              Inventory
            </a>
          </div>
          @if (env('HAS_VAT') == true)
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-vat') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-vat')
                         btn-primary
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-solar-panel mr-2"></i>
              VAT
            </a>
          </div>
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

          @if (false)
          <div class="float-right mx-4-rm mr-4-rm px-4-rm text-white" style="font-size: 1.3rem;">
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-list text-secondry mr-2"></i>
                More
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="{{ route('dashboard-purchase') }}">
                  <i class="fas fa-shopping-cart text-secondary mr-2"></i>
                  Purchase
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-expense') }}">
                  <i class="fas fa-tools text-secondary mr-2"></i>
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
                  <i class="fas fa-dolly-flatbed text-secondary mr-2"></i>
                  Inventory
                </a>
              </div>
            </div>
          </div>
          @endif

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

          <div class="float-right mx-4 px-4 border-left-rm" style="font-size: 1.3rem;">
            @livewire ('online-order-counter')
          </div>
        @endguest
        <div class="clearfix">
        </div>

      </div>
