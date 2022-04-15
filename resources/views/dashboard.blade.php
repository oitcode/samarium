@extends('layouts.app')
@section ('content')

  @if (env('SITE_TYPE') == 'erp')
  <div class="row mb-4">

    @if (env('SITE_TYPE') == 'erp')
    <div class="col-md-3">
      @livewire ('flash-card-current-bookings')
    </div>
    @endif

    <div class="col-md-3">
      @livewire ('flash-card-total-bookings-today')
    </div>

    @if (env('SITE_TYPE') == 'erp')
      <div class="col-md-3">
        @livewire ('flash-card-total-takeaways-today')
      </div>
    @endif

  </div>

  <div class="row mb-4">
    <div class="col-md-3">
      @livewire ('chart-week-sales', key(rand()))
    </div>
    <div class="col-md-6">
      @livewire ('chart-sale-by-category', key(rand()))
    </div>
    @if (false)
    <div class="col-md-6">
      @livewire ('table-top-selling-products-day')
    </div>
    @endif
  </div>

  @elseif (env('SITE_TYPE') == 'ecs')
    @if (false)
      @livewire ('cms.nav-menu-component')
      @livewire ('ecs.webpage-component')
    @endif
  @endif

@endsection
