@extends('layouts.app')
@section ('content')
  @if (false)
  @livewire('cafe-sale-component')
  @livewire('recent-sale-invoices-component')
  @endif

  <div class="h-100">
    <div class="d-flex justify-content-center h-100 text-success">
      <div class="d-flex justify-content-center align-self-center">
        <span class="badge badge-success text-white" style="font-size: 5rem;">
          &copy;
          OIT
          SmartPY
        </span>
      </div>
    </div>
  </div>

@endsection



