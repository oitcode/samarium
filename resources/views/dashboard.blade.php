@extends('layouts.app')
@section ('content')

  {{-- Greeting row --}}
  <div class="row mb-3" style="margin: auto;">
    <div class="col-md-6 px-2">
      <div class="d-flex border-rm bg-light-rm text-secondary p-2">
        <div class="d-flex flex-column justify-content-center mr-3 bg-danger-rm">
          <i class="fas fa-check-circle fa-2x-rm"></i>
        </div>
        <div class="d-flex flex-column justify-content-bottom mr-3 bg-warning-rm">
          Welcome, {{ Auth::user()->name }}
        </div>
      </div>
    </div>
    <div class="col-md-6 px-2">
      @if (false)
      <div class="d-flex justify-content-center border-rm bg-light-rm text-success p-2">
        <i class="fas fa-feather-alt mr-3"></i>
        Oztrich
      </div>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      @if (preg_match("/cms/i", env('MODULES')))
        {{-- CMS glance --}}
        @livewire ('cms.dashboard.cms-glance')
      @endif
    </div>

    <div class="col-md-6">
      @if (preg_match("/shop/i", env('MODULES')))
        {{-- Shop glance --}}
        @livewire ('shop.dashboard.shop-glance')
      @endif
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
