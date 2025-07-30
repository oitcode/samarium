<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 p-0">
  <a class="navbar-brand text-reset" href="{{ route('dashboard') }}">
    <button class="btn p-3-rm m-3 text-white" type="button">
      <i class="fas fa-home fa-2x"></i>
    </button>
  </a>
  <button class="navbar-toggler p-3-rm m-3 text-white border-0" style="" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-th fa-2x"></i>
  </button>

  <div class="collapse navbar-collapse m-0 p-0" id="navbarSupportedContent" style="margin-left: 0;">
    <ul class="navbar-nav m-0 p-0" style="margin: auto;">

      {{-- Product options --}}
      @if (has_module('product'))
        <li class="nav-item dropdown bg-light text-dark pt-2">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuProductDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-dice-d6 text-secondry mr-3"></i>
            <span class="font-weight-bold">
            Product
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuProductDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('product') }}">
              <i class="fas fa-dice-d6 mr-3"></i>
              Products
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('product-category') }}">
              <i class="fas fa-list mr-3"></i>
              Product category
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('product-question') }}">
              <i class="fas fa-question mr-3"></i>
              Product question
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-inventory') }}">
              <i class="fas fa-dolly mr-3"></i>
              Inventory
            </a>
          </div>
        </li>
      @endif

      {{-- Shop options --}}
      @if (has_module('shop'))
        <li class="nav-item dropdown bg-light text-dark">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuShopDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-shopping-cart text-secondry mr-3"></i>
            <span class="font-weight-bold">
            Shop
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuShopDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('sale') }}">
              <i class="fas fa-dice-d6 mr-3"></i>
              Sales
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-purchase') }}">
              <i class="fas fa-shopping-cart mr-3"></i>
              Purchase
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-expense') }}">
              <i class="fas fa-wrench mr-3"></i>
              Expense
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('online-order') }}">
              <i class="fas fa-cloud-download-alt mr-3"></i>
              Weborder
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-sale-quotation') }}">
              <i class="fas fa-edit mr-3"></i>
              Quotation
            </a>
            @if (config('app.cmp_type') === 'cafe')
              <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('cafesale') }}">
                <i class="fas fa-table mr-3"></i>
                Tables
              </a>
            @endif
          </div>
        </li>
      @endif

      {{-- CMS options --}}
      @if (has_module('cms'))
        <li class="nav-item dropdown bg-light text-dark">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuCmsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-edit text-secondry mr-3"></i>
            <span class="font-weight-bold">
            CMS
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuCmsDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-cms-post') }}">
              <i class="fas fa-edit mr-3"></i>
              Post
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-cms-webpage') }}">
              <i class="fas fa-file mr-3"></i>
              Page
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-cms-gallery') }}">
              <i class="fas fa-images mr-3"></i>
              Gallery
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-cms-nav-menu') }}">
              <i class="fas fa-list mr-3"></i>
              Nav menu
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-cms-theme') }}">
              <i class="fas fa-palette mr-3"></i>
              Appearence
            </a>
          </div>
        </li>
      @endif

      {{-- CRM options --}}
      @if (has_module('crm'))
        <li class="nav-item dropdown bg-light text-dark">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuCrmDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-users text-secondry mr-3"></i>
            <span class="font-weight-bold">
            CRM
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuCrmDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('customer') }}">
              <i class="fas fa-users mr-3"></i>
              Customers
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-vendor') }}">
              <i class="fas fa-users mr-3"></i>
              Vendors
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-contact-form') }}">
              <i class="fas fa-comment mr-3"></i>
              Contact message
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-appointment') }}">
              <i class="fas fa-paste mr-3"></i>
              Appointment
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-newsletter-subscription') }}">
              <i class="fas fa-envelope mr-3"></i>
              Newsletter subscription
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-testimonial') }}">
              <i class="fas fa-comment mr-3"></i>
              Testimonial
            </a>
          </div>
        </li>
      @endif

      {{-- Calendar options --}}
      @if (has_module('calendar'))
        <li class="nav-item dropdown bg-light text-dark">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuCalendarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-calendar text-secondry mr-3"></i>
            <span class="font-weight-bold">
            Calendar
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuCalendarDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-calendar') }}">
              <i class="fas fa-calendar mr-3"></i>
              Calendar
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-calendar-group') }}">
              <i class="fas fa-users mr-3"></i>
              Calendar group
            </a>
          </div>
        </li>
      @endif

      {{-- Team options --}}
      @if (has_module('team'))
        <li class="nav-item dropdown bg-light text-dark">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuTeamDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-calendar text-secondry mr-3"></i>
            <span class="font-weight-bold">
            Team
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuTeamDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-team') }}">
              <i class="fas fa-calendar mr-3"></i>
              Team
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-quick-contacts') }}">
              <i class="fas fa-calendar mr-3"></i>
              Quick contacts
            </a>
          </div>
        </li>
      @endif

      {{-- HR options --}}
      @if (has_module('hr'))
        <li class="nav-item dropdown bg-light text-dark">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuHrDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-users text-secondry mr-3"></i>
            <span class="font-weight-bold">
            HR
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuHrDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-vacancy') }}">
              <i class="fas fa-star mr-3"></i>
              Vacancy
            </a>
          </div>
        </li>
      @endif

      {{-- Project options --}}
      @if (has_module('project'))
        <li class="nav-item dropdown bg-light text-dark">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuProjectDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-th text-secondry mr-3"></i>
            <span class="font-weight-bold">
            Project
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuProjectDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-todo') }}">
              <i class="fas fa-star mr-3"></i>
              Tasks
            </a>
          </div>
        </li>
      @endif


      {{-- Report options --}}
      @if (has_module('report'))
        <li class="nav-item dropdown bg-light text-dark">
          <a class="nav-link dropdown-toggle text-dark px-3 py-2" href="#" id="mobTopMenuReportDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-dice-d6 text-secondry mr-3"></i>
            <span class="font-weight-bold">
            Report
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuReportDropdown">
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('daybook') }}">
              <i class="fas fa-book mr-3"></i>
              Daybook
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('weekbook') }}">
              <i class="fas fa-book mr-3"></i>
              Weekbook
            </a>
            <a class="dropdown-item py-2 pl-3 font-weight-bold" href="{{ route('dashboard-report') }}">
              <i class="fas fa-chart-line mr-3"></i>
              Report
            </a>
          </div>
        </li>
      @endif

      {{-- Common things --}}
      <li class="nav-item dropdown bg-light text-dark px-3 py-0">
        <a class="nav-link dropdown-toggle text-dark py-2" href="#" id="mobTopMenuMoreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog text-secondry mr-2"></i>
          <span class="font-weight-bold">
            More
          </span>
        </a>
        <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuMoreDropdown">
          <a class="dropdown-item py-2" href="{{ route('company') }}">
            <i class="fas fa-home mr-2"></i>
            Company
          </a>
          <a class="dropdown-item py-2" href="{{ route('dashboard-settings') }}">
            <i class="fas fa-cog mr-2"></i>
            Settings
          </a>
          <a class="dropdown-item py-2" href="{{ route('dashboard-users') }}">
            <i class="fas fa-users mr-2"></i>
            Users
          </a>
          <a class="dropdown-item py-2" href="{{ route('dashboard-help') }}">
            <i class="fas fa-question-circle mr-2"></i>
            Help
          </a>
        </div>
      </li>

      {{-- Logout and other user related options --}}
      @guest
      @else
        <li class="nav-item dropdown bg-light text-dark px-3 py-0">
          <a class="nav-link dropdown-toggle text-dark py-2" href="#" id="mobTopMenuDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle text-secondry mr-2"></i>
            <span class="font-weight-bold">
            {{ Auth::user()->name }}
            </span>
          </a>
          <div class="dropdown-menu mx-3 p-3 border o-border-radius" style="background-color: #def;" aria-labelledby="mobTopMenuMoreDropdown">
            <a class="dropdown-item py-2" href="{{ route('dashboard-change-password') }}">
              <i class="fas fa-key mr-2"></i>
              Change password
            </a>
            <a class="dropdown-item py-2" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
            >
              <i class="fas fa-power-off mr-2"></i>
              Logout
            </a>
          </div>
        </li>
        <li class="nav-item bg-light text-dark px-3">
          <a class="nav-link text-dark py-2" href="/">
            <span class="btn btn-success badge-pill">
            Website
            </span>
          </a>
        </li>
      @endguest
    </ul>
  </div>
</nav>
