@extends('layouts.app')
@section ('content')
  @if (false)
  @livewire('seat-table-work-display', ['seatTable' => $seatTable,])
  @else
  @livewire('sale-component')
  @endif
@endsection
