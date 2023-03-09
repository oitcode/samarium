@extends('layouts.app')
@section ('content')

  <div class="mb-5">
    @livewire ('lv-package-welcome')
  </div>

  @if (preg_match("/shop/i", env('MODULES')))

    {{--
        Show quick links menu. This menu is visible only
        in small screen (mobile).
    --}}
    @include ('partials.dashboard.mobile-dashboard-main-links')

    {{-- Show on bigger screens --}}
    <div class="d-none d-md-block">
    
      @if (true)
      <div class="my-4">
        @livewire ('transactions-navigator')
      </div>
      @endif
    
    </div>
  @endif

@endsection
