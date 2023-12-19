@extends('layouts.app')


{{--
   |
   | Welcome to the dashboard!
   |
   | This is the blade file of dashboard main screen. Our dashboard is a simple one
   | so that anyone can use it with ease. It is this screen that the admin users
   | will see most of the time. Keep it simple and clean. Simple is good.
   |
--}}


@section ('content')

  <x-component-header>
    Dashboard
  </x-component-header>



  <div class="row" style="margin: auto;">

    <div class="col-md-9 d-none d-md-block p-0">

      {{-- Announcement --}}
      @if (false)
      @if (env('ANNOUNCEMENT'))
        @include ('partials.misc.dashboard-vendor-announcement')
      @endif
      @endif

      <div class="h-100 d-flex p-0">
        <div class="h-100 d-flex flex-column w-100">
          <div>

            @if (false)
            {{-- Transactions navigator --}}
            @if (preg_match("/shop/i", env('MODULES')))
              <div class="mb-4">
                @livewire ('transactions-navigator')
              </div>
            @endif
            @endif

            @if (true)
            {{-- Calendar glance/navigator --}}
            @if (preg_match("/calendar/i", env('MODULES')))
              <div class="mb-4">
                @livewire ('calendar.dashboard.calendar-glance-component')
              </div>
            @endif
            @endif

            <div class="row">

              @if (false)
              {{-- CMS glance --}}
              @if (preg_match("/cms/i", env('MODULES'))) 
                <div class="col-md-6">
                    {{-- CMS glance --}}
                    <div class="mb-4">
                      @livewire ('cms.dashboard.cms-glance')
                    </div>
                </div>
              @endif
              @endif

              {{-- Shop glance --}}
              @if (preg_match("/shop/i", env('MODULES')))
                <div class="col-md-6">
                  <div class="mb-4">
                    @livewire ('shop.dashboard.shop-glance')
                  </div>
                </div>
              @endif

              @if (false)
              {{-- Product glance --}}
              @if (preg_match("/shop/i", env('MODULES')))
                <div class="col-md-6">
                  <div class="mb-4">
                    @livewire ('shop.dashboard.product-glance')
                  </div>
                </div>
              @endif
              @endif

              {{-- Online order glance --}}
              @if (preg_match("/shop/i", env('MODULES')))
                <div class="col-md-6">
                  <div class="mb-4">
                    @livewire ('online-order.dashboard.online-order-glance')
                  </div>
                </div>
              @endif

              {{-- Notice glance --}}
              @if (preg_match("/crm/i", env('MODULES')))
                <div class="col-md-6">
                  <div class="mb-4">
                    @livewire ('cms.dashboard.notice-glance-component')
                  </div>
                </div>
              @endif

              {{-- Contact form glance --}}
              @if (preg_match("/crm/i", env('MODULES')))
                <div class="col-md-6">
                  <div class="mb-4">
                    @livewire ('contact-form.dashboard.contact-message-glance-component')
                  </div>
                </div>
              @endif

            </div>

            {{-- Todo glance --}}
            <div class="row">
              <div class="col-md-12">
                @if (false)
                <div class="d-none d-md-block">
                  @livewire ('todo.dashboard.todo-glance')
                </div>
                @endif
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="mb-3 d-none d-md-block">
        @livewire ('lv-package-welcome')
      </div>

      <div class="mb-3 d-none d-md-block">
        @if (false)
          @livewire ('lv-company-info')
          @livewire ('clock-display-component')
        @endif
      </div>

      <div>
        {{-- Show quick links menu. --}}
        @if (false)
        @include ('partials.dashboard.mobile-dashboard-main-links')
        @endif
      </div>
    </div>

  </div>

@endsection
