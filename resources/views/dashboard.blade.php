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
  </div>

  <div class="mb-4">
    <h2 class="mt-5">
      Week Sales
    </h2>
    <div style="width: 500px; height: 500px;">
      @livewire ('chart-week-sales')
    </div>
  </div>


@endsection



