@extends('layouts.app')
@section ('content')

  @if (env('SITE_TYPE') == 'erp')

    {{--
        Show quick links menu. This menu is visible only
        in small screen (mobile).
    --}}
    @include ('partials.mobile-dashboard-main-links')

    {{-- Show on bigger screens --}}
    <div class="d-none d-md-block">
    
      @if (false)
        {{-- Today: Show sales, purchase, expense  --}}
        <div class="row mb-4">
          @if (env('SITE_TYPE') == 'erp')
            <div class="col-md-2">
              @livewire ('flash-card-total-sales-today')
            </div>
    
            <div class="col-md-2">
              @livewire ('flash-card-total-purchase-today')
            </div>
    
            <div class="col-md-2">
              @livewire ('flash-card-total-expense-today')
            </div>
          @endif
        </div>
      @endif

      @if (false)
      @livewire ('support-component')
      @endif

      @if (true)
      @livewire ('transactions-navigator')
      @endif
    
    </div>

  @elseif (env('SITE_TYPE') == 'ecs')
    @if (false)
      @livewire ('cms.nav-menu-component')
      @livewire ('ecs.webpage-component')
    @endif
  @endif

  @if (false)
  {{-- Dashboard info section --}}
  <div class="row mb-4">
    <div class="col-md-10 border rounded-rm bg-white py-1" style="border-radius: 10px;">
      <h2 class="h6 mt-2 mb-0 pb-0">
        <i class="fas fa-link mr-2 text-primary"></i>
        Quick links
      </h2>

      <hr />

      <div class="mb-3">
        <div class="d-flex">
          <div class="mr-4">
            <i class="fas fa-shopping-cart fa-3x" style="color: #ccc;"></i>
          </div>
          <div class="d-flex flex-column justify-content-center">
            You dont have any orders
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Dashboard info section --}}
  <div class="row mb-4">
    <div class="col-md-10 border rounded-rm bg-white py-1" style="border-radius: 10px;">
      <h2 class="h6 mt-2 mb-0 pb-0">
        <i class="fas fa-wifi mr-2 text-primary"></i>
        Messages
      </h2>

      <hr />

      <div class="mb-3">
        <div class="d-flex">
          <div class="mr-4">
            <i class="fas fa-shopping-cart fa-3x" style="color: #ccc;"></i>
          </div>
          <div class="d-flex flex-column justify-content-center">
            You dont have any orders
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- Our brand info --}}
  <div class="bg-white p-3 border my-4">
    <div>
      <i class="fas fa-check-circle mr-1"></i>
      <span class="text-success">
        @if (false)
        Welcome
        @endif
        Dashboard
      </span>
    </div>
    <div class="text-muted">
      <i class="fas fa-archive mr-1"></i>
      v 0.3.2
    </div>
  </div>

@endsection
