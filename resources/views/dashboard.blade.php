@extends('layouts.app')
@section ('content')

  <x-component-header>
    @if (false)
    <i  class="fas fa-th text-muted mr-2"></i>
    @endif
    Dashboard
  </x-component-header>


  @if (true)

    {{--
        Show quick links menu.
    --}}
    <div class="row" style="margin: auto;">
      <div class="col-md-9 bg-info-rm p-0">
        @if (true)
        <div class="h-100 d-flex justify-content-center-rm bg-primary-rm border-rm shadow-sm-rm p-0">
          <div class="h-100 d-flex flex-column justify-content-center p-3-rm w-100">
              @if (true)
                <div class="">
                  @if (true)
                  <div class="mb-4">
                    @livewire ('transactions-navigator')
                  </div>
                  @endif
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
                      @livewire ('todo.dashboard.todo-glance')
                    </div>
                    <div class="col-md-6">
                      {{-- Product glance --}}
                      <div class="mb-4">
                        @livewire ('shop.dashboard.product-glance')
                      </div>

                    
                    </div>
                  </div>
                </div>
              @endif
          </div>
        </div>
        @endif
      </div>
      <div class="col-md-3">
        @include ('partials.dashboard.mobile-dashboard-main-links')
      </div>
    </div>

  @endif

@endsection
