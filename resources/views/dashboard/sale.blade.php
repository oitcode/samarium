@extends('layouts.app')
@section ('content')
  @livewire('seat-table-work-display', ['seatTable' => $seatTable,])
@endsection
