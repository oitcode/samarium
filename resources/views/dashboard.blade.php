@extends('layouts.app')
@section ('content')

  <div class="border">
    <div class="{{ env('OC_ASCENT_BG_COLOR') }} {{ env('OC_ASCENT_TEXT_COLOR') }} p-5">
      <h1>
        Welcome to Dashboard!
      </h1>
    </div>
    <div class="bg-white text-dark p-5">
      <i class="fas fa-tv fa-3x mr-2"></i>
      v0.3.5
      @if (false)
      <div class="row">
        <div class="col-md-4">
          <i class="fas fa-shopping-cart fa-3x"></i>
        </div>
        <div class="col-md-4">
          <i class="fas fa-star fa-3x"></i>
        </div>
        <div class="col-md-4">
          <i class="fas fa-dice-d6 fa-3x"></i>
        </div>
      </div>
      @endif
    </div>
  </div>

  @if (false)
  <div class="d-flex justify-content-center h-100">
    <div class="d-flex flex-column justify-content-center h-100">
      <div class="" style="min-width: 500px;">
        @livewire ('lv-package-welcome')
      </div>
    </div>
  </div>
  @endif

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
