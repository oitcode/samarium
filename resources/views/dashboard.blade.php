@extends('layouts.app')
@section ('content')

  {{-- Greeting row --}}
  <div class="row mb-5" style="margin: auto;">
    <div class="col-md-6 px-2">
      <div class="d-flex border bg-success text-white p-5">
        <div class="d-flex flex-column justify-content-center mr-3">
          <i class="fas fa-check-circle fa-2x"></i>
        </div>
        <div>
          <h2 class="h4">
            Welcome, {{ Auth::user()->name }}
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-6 px-2">
      <div class="d-flex justify-content-center border bg-primary text-white p-5">
        <h2 class="h4">
          <i class="fas fa-feather-alt mr-3"></i>
          Oztrich
        </h2>
      </div>
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
