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

  <div class="row">
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

@endsection



