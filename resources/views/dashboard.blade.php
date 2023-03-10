@extends('layouts.app')
@section ('content')

  <div class="d-flex justify-content-center h-100">
    <div class="d-flex flex-column justify-content-center h-100">
      <div class="" style="min-width: 500px;">
        @livewire ('lv-package-welcome')
      </div>
    </div>
  </div>

  @if (preg_match("/shop/i", env('MODULES')))

    {{--
        Show quick links menu. This menu is visible only
        in small screen (mobile).
    --}}
    @include ('partials.dashboard.mobile-dashboard-main-links')

    {{-- Show on bigger screens --}}
    <div class="d-none d-md-block">
    
      @if (false)
      <div class="my-4">
        @livewire ('transactions-navigator')
      </div>
      @endif
    
    </div>
  @endif

@endsection
