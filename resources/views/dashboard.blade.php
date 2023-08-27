@extends('layouts.app')
@section ('content')

  {{-- Greeting row --}}
  <div class="row mb-3 bg-white" style="margin: auto;">
    <div class="col-md-6 px-2-rm">
      @if (true)
      <div class="d-flex justify-content-center-rm border-rm bg-light-rm text-success-rm p-2">
        <h1 class="h4 mt-4">
          <i class="fas fa-feather-alt mr-3"></i>
          Dashboard
        </h1>
      </div>
      @endif
    </div>
    <div class="col-md-6 py-3">
      <div class="d-flex justify-content-end border-rm bg-light-rm bg-danger-rm text-white-rm bg-warning-rm px-5-rm py-2 pt-3 border-rm"
      style="{{-- background-color: #ccc; color: #fff; --}}">
        <div class="d-flex flex-column justify-content-center mr-3 bg-danger-rm h4">
          @if (false)
          <i class="fas fa-check-circle fa-2x-rm"></i>
          @endif
        </div>
        @if (false)
        <div class="d-flex flex-column justify-content-bottom mr-3 bg-warning-rm h4 font-weight-bold">
          Welcome, {{ Auth::user()->name }}
        </div>
        @endif
        <div>
          <button class="btn btn-lg btn-primary mr-3 shadow">
            Profile
          </button>
          <button class="btn btn-lg btn-primary mr-3 shadow">
            New Order
          </button>
        </div>
      </div>
    </div>
  </div>

  @if (true)
  <div class="row">
    <div class="col-md-6">
      @if (preg_match("/cms/i", env('MODULES')))
        {{-- CMS glance --}}
        <div class="mb-4">
          @livewire ('cms.dashboard.cms-glance')
        </div>
      @endif

      {{-- Package welcome --}}
      @if (false)
      @livewire ('lv-package-welcome')
      @endif
      @livewire ('cms.dashboard.cms-glance')
    </div>

    <div class="col-md-6">
      @if (preg_match("/shop/i", env('MODULES')))
        {{-- Shop glance --}}
        <div class="mb-4">
          @livewire ('shop.dashboard.shop-glance')
        </div>

        {{-- Product glance --}}
        <div class="mb-4">
          @livewire ('shop.dashboard.product-glance')
        </div>
      @endif
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-6">
      @livewire ('todo.dashboard.todo-glance')
    </div>
    <div class="col-md-6">
    </div>
  </div>

  @if (preg_match("/shop/i", env('MODULES')))

    {{--
        Show quick links menu. This menu is visible only
        in small screen (mobile).
    --}}
    @include ('partials.dashboard.mobile-dashboard-main-links')

    {{-- Show on bigger screens --}}
    <div class="d-none d-md-block">
    
      @if (false)
      <div class="my-4">
        @livewire ('transactions-navigator')
      </div>
      @endif
    
    </div>
  @endif

@endsection
