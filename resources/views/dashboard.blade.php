@extends('layouts.app')
@section ('content')
  @if (false)
  @livewire('cafe-sale-component')
  @livewire('recent-sale-invoices-component')
  @endif

  <div class="h-100">
    <div class="d-flex justify-content-center h-100 text-success">
      <div class="d-flex justify-content-center align-self-center">

        {{-- Show in md or bigger screens --}}
        <span class="badge badge-success text-white d-none d-md-block" style="font-size: 5rem;">
          &copy;
          OIT
          SmartPY
        </span>

        {{-- Show in smaller than md screens --}}
        <span class="badge badge-success text-white d-md-none" style="font-size: 2.5rem;">
          &copy;
          OIT
          SmartPY
        </span>
      </div>
    </div>
  </div>

@endsection



