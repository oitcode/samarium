@extends('layouts.app')
@section ('content')

  <x-component-header>
    @if (false)
    <i  class="fas fa-th text-muted mr-2"></i>
    @endif
    Dashboard
  </x-component-header>

  <div class="d-none d-md-block">
    <div class="row">
      <div class="col-md-6">
        @if (preg_match("/cms/i", env('MODULES')))
          {{-- CMS glance --}}
          <div class="mb-4">
            @livewire ('cms.dashboard.cms-glance')
          </div>
        @endif

      </div>

      <div class="col-md-6">
        @if (preg_match("/shop/i", env('MODULES')))
          {{-- Shop glance --}}
          <div class="mb-4">
            @livewire ('shop.dashboard.shop-glance')
          </div>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        @livewire ('todo.dashboard.todo-glance')
      </div>
      <div class="col-md-6">
        {{-- Product glance --}}
        <div class="mb-4">
          @livewire ('shop.dashboard.product-glance')
        </div>

        @if (true)
        <div class="my-4">
          @livewire ('transactions-navigator')
        </div>
        @endif
      
      </div>
    </div>
  </div>

  @if (preg_match("/shop/i", env('MODULES')))

    {{--
        Show quick links menu. This menu is visible only
        in small screen (mobile).
    --}}
    @include ('partials.dashboard.mobile-dashboard-main-links')

  @endif

@endsection
