@extends('layouts.app')
@section ('content')

  <div class="row">
    <div class="col-md-6">
      @if (preg_match("/cms/i", env('MODULES')))
        {{-- CMS glance --}}
        @livewire ('cms.dashboard.cms-glance')
      @endif
    </div>

    <div class="col-md-6">
      <div class="mb-5 border">
        <div class="{{ env('OC_ASCENT_BG_COLOR') }}-rm {{ env('OC_ASCENT_TEXT_COLOR') }}-rm bg-white p-3">
          <h1 class="h4" style="color: #779;">
            Welcome to Dashboard
          </h1>
        </div>
        @if (true)
        <div class="bg-white p-3-rm pl-3 pb-3" style="color: #779;">
          <i class="fas fa-tv fa-3x mr-2"></i>
          v0.3.6
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
