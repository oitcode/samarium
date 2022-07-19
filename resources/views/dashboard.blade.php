@extends('layouts.app')
@section ('content')

  @if (false)
  <div class="border-rm mb-3">
    @include ('partials.quick-links')
  </div>
  @endif

  @if (env('SITE_TYPE') == 'erp')

    {{-- Show on smaller screens --}}
    <div class="row p-3 justify-content-between-rm bg-light-rm mb-4 d-md-none" style="margin: auto;">

      <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
        <a href="{{ route('sale') }}" class="btn btn-success p-3 w-100" style="font-size: 1.3rem;">
          <i class="fas fa-shipping-fast mr-3"></i>
          <br/>
          Takeaway
        </a>
      </div>

      <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
        <a href="{{ route('cafesale') }}" class="btn btn-success p-3 w-100" style="font-size: 1.3rem;">
          <i class="fas fa-table mr-3"></i>
          <br/>
          Tables
        </a>
      </div>

      @can ('is-admin')
      <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
        <a href="{{ route('menu') }}" class="btn btn-success p-3 w-100" style="font-size: 1.3rem;">
          <i class="fas fa-list mr-3"></i>
          <br/>
          Menu
        </a>
      </div>
      @endcan

      @can ('is-admin')
      <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
        <a href="{{ route('daybook') }}" class="btn btn-success p-3 w-100" style="font-size: 1.3rem;">
          <i class="fas fa-book mr-3"></i>
          <br/>
          Daybook
        </a>
      </div>
      @endcan

      @can ('is-admin')
      <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
        <a href="{{ route('weekbook') }}" class="btn btn-success p-3 w-100" style="font-size: 1.3rem;">
          <i class="fas fa-book mr-3"></i>
          <br/>
          Weekbook
        </a>
      </div>
      @endcan

      @can ('is-admin')
      <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
        <a href="{{ route('customer') }}" class="btn btn-success p-3 w-100" style="font-size: 1.3rem;">
          <i class="fas fa-users mr-3"></i>
          <br/>
          Customer
        </a>
      </div>
      @endcan

      @can ('is-admin')
      <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
        <a href="{{ route('online-order') }}" class="btn btn-success p-3 w-100" style="font-size: 1.3rem;">
          <i class="fas fa-cloud-download-alt mr-3"></i>
          <br/>
          Weborders
        </a>
      </div>
      @endcan

    </div>

    {{-- Show on bigger screens --}}
    <div class="d-none d-md-block">

      {{-- TODAY --}}
      @if (false)
      <h2 class="h5 text-muted mb-3">
        TODAY
      </h2>
      @endif

      <div class="row mb-4">

        @if (env('SITE_TYPE') == 'erp')

          @if (false)
          <div class="col-md-1 d-flex flex-column justify-content-center">
            <i class="fas fa-arrow-alt-circle-down fa-3x mr-3-rm text-success"></i>
          </div>

          <div class="col-md-1 d-flex flex-column justify-content-center">
            <i class="fas fa-arrows-alt fa-3x mr-3-rm text-success"></i>
          </div>

          <div class="col-md-1 d-flex flex-column justify-content-center">
            <i class="fas fa-undo fa-3x mr-3-rm text-success"></i>
          </div>
          @endif

          @if (true)

            <div class="col-md-2">
              @livewire ('flash-card-total-sales-today')
            </div>

            <div class="col-md-2">
              @livewire ('flash-card-total-purchase-today')
            </div>

            <div class="col-md-2">
              @livewire ('flash-card-total-expense-today')
            </div>

            @if (false)
            <div class="col-md-3">
            </div>

            <div class="col-md-3 border" style="background-color: #ffd;">
              &nbsp;<br/>
              &nbsp;<br/>
              &nbsp;<br/>
              &nbsp;<br/>
              &nbsp;<br/>
              &nbsp;<br/>
              &nbsp;<br/>
              &nbsp;<br/>
              &nbsp;<br/>
              &nbsp;<br/>
            </div>
            @endif


            @if (false)
              <div class="col-md-2">
                @livewire ('flash-card-total-bookings-today')
              </div>

              @if (env('SITE_TYPE') == 'erp')
                <div class="col-md-2">
                  @livewire ('flash-card-total-takeaways-today')
                </div>
              @endif
            @endif
          @endif

        @endif

      </div>


      {{-- NOW --}}

      <div class="row mb-4">

        @if (false)
          @if (env('SITE_TYPE') == 'erp')
            <div class="col-md-2">
              @livewire ('flash-card-current-bookings')
            </div>
          @endif
        @endif

      </div>
    </div>



    {{-- Show on smaller screens --}}
    @if (false)
    <div class="d-md-none">
      <div class="row mb-4">

        @if (env('SITE_TYPE') == 'erp')
        <div class="col-md-3 p-4">
          <h2 class="h4">
            Current bookings: 2
          </h2>
          <h3 class="h3">
            2,154
          </h3>
        </div>
        @endif

        <div class="col-md-3 p-4">
          <h2 class="h4">
            Today bookings: 2
          </h2>
          <h3 class="h3">
            2,154
          </h3>
        </div>

        @if (env('SITE_TYPE') == 'erp')
        <div class="col-md-3 p-4">
          <h2 class="h4">
            Today bookings: 2
          </h2>
          <h3 class="h3">
            2,154
          </h3>
        </div>
        @endif

      </div>
    </div>
    @endif

  @elseif (env('SITE_TYPE') == 'ecs')
    @if (false)
      @livewire ('cms.nav-menu-component')
      @livewire ('ecs.webpage-component')
    @endif
  @endif

@endsection
