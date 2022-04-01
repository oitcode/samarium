@extends('layouts.app')
@section ('content')
  @if (false)
  @livewire ('cafe-sale-component')
  @livewire ('recent-sale-invoices-component')
  @livewire ('viewbook-component')
  @livewire ('sale-invoice-search')
  @endif


  @if (false)
    @livewire ('oit-copyright')
  @endif

  <div class="row mb-4">
    <div class="col-md-3">
      @livewire ('flash-card-total-bookings-today')
    </div>
    <div class="col-md-3">
      @livewire ('flash-card-current-bookings')
    </div>
    <div class="col-md-3">
      @livewire ('flash-card-total-takeaways-today')
    </div>
    @if (false)
    <div class="col-md-3">
      @livewire ('oit-copyright')
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

  <div class="mb-4">
    <div style="width: 300px; height: 300px;">
    </div>
  </div>


@endsection



