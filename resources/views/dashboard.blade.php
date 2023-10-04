@extends('layouts.app')
@section ('content')

  <x-component-header>
    @if (false)
    <i  class="fas fa-th text-muted mr-2"></i>
    @endif
    Dashboard
  </x-component-header>

  @if (false)
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
  @endif

  @if (true)

    {{--
        Show quick links menu.
    --}}
    <div class="row">
      <div class="col-md-6">
        @include ('partials.dashboard.mobile-dashboard-main-links')
      </div>
      <div class="col-md-6">
        <div class="h-100 d-flex justify-content-center bg-white-rm border-rm shadow-sm-rm">
          <div class="h-100 d-flex flex-column justify-content-center">
            <h2 class="h1 font-weight-bold">
              &copy; OIT
            </h2>
          </div>
        </div>
      </div>
    </div>

  @endif

@endsection
