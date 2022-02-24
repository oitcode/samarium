@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
  @livewire('product-category-component')
  @livewire('product-component')
@stop
