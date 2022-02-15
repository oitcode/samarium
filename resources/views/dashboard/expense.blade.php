@extends('adminlte::page')

@section('title', 'Dashboard')

@if (false)
@section('content_header')
    <h1>Dashboard</h1>
@stop
@endif

@section('content')
  @livewire('expense-component')
@stop
