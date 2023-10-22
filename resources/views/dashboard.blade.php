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
      <div class="h-100 d-flex p-0">
        <div class="h-100 d-flex flex-column w-100">
          <div>
            <div class="mb-4">
              @livewire ('transactions-navigator')
            </div>
            <div class="row">
              <div class="col-md-6">
                @if (preg_match("/cms/i", env('MODULES'))) 
                  {{-- CMS glance --}}
                  <div class="mb-4">
                    @livewire ('cms.dashboard.cms-glance')
                  </div>

                @endif

              </div>

              <div class="col-md-6">
                @if (preg_match("/shop/i", env('MODULES')))

                  {{-- Shop glance --}}
                  <div class="mb-4">
                    @livewire ('shop.dashboard.shop-glance')
                  </div>

                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">

                {{-- Product glance --}}
                <div class="mb-4">
                  @livewire ('shop.dashboard.product-glance')
                </div>

              </div>
              <div class="col-md-6">

                {{-- Online order glance --}}
                <div class="mb-4">
                  @livewire ('online-order.dashboard.online-order-glance')
                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="d-none d-md-block">
                  @livewire ('todo.dashboard.todo-glance')
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div>
        {{-- Show quick links menu. --}}
        @include ('partials.dashboard.mobile-dashboard-main-links')
      </div>
    </div>

  </div>

@endsection
