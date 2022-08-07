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

      @livewire ('support-component')
    
    </div>

  @elseif (env('SITE_TYPE') == 'ecs')
    @if (false)
      @livewire ('cms.nav-menu-component')
      @livewire ('ecs.webpage-component')
    @endif
  @endif

@endsection
