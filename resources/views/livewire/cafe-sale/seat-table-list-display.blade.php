<div class="h-100">

  {{-- Show in bigger screens --}}
  <div class="card mb-3 shadow h-100 d-none d-md-block"
      wire:click="displayWorkingSeatTable({{ $seatTable->seat_table_id }})"
      role="button"
  >
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <div>
          <h2 class="h6 o-heading">
            {{ $seatTable->name }}
            @if ($seatTable->isBooked())
              <span class="badge badge-danger badge-pill ml-2">
                Booked
              </span>
            @else
              <span class="badge badge-success badge-pill ml-2">
                Open
              </span>
            @endif
          </h2>
        </div>
        <div>
            @if ($seatTable->isBooked())
              <span class="h6 pt-4">
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
              </span>
            @else
            @endif
        </div>
      </div>
      @include ('partials.dashboard.spinner-button')
    </div>
  
    <div class="card-body p-0">
      @if ($seatTable->getCurrentBooking())
      <div class="row" style="margin: auto;">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table">
              <tr class="border-0">
                <td class="border-0">
                  <i class="fas fa-clock mr-3"></i>
                  Start
                </td>
                <td class="font-weight-bold border-0">
                  @if ($seatTable->getCurrentBooking())
                    {{ $seatTable->getCurrentBooking()->created_at->format('h:i') }}
                  @else
                    NA
                  @endif
                </td>
              </tr>
              <tr class="border-0">
                <td class="border-0">
                  <i class="fas fa-shopping-cart mr-3"></i>
                  Items
                </td>
                <td class="font-weight-bold border-0">
                  @if ($seatTable->isBooked())
                    {{ $seatTable->getCurrentBookingTotalItems() }}
                  @else
                    NA
                  @endif
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      @else
        <div class="d-flex flex-column justify-content-center p-3 h-100">
          <div class="d-flex justify-content-between">
            <div wire:click="displayWorkingSeatTable({{ $seatTable->seat_table_id }})">
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="card mb-0 shadow
      @if ($seatTable->isBooked()) bg-danger text-white  @else bg-success text-white @endif
      h-100
      d-md-none"
      wire:click="$dispatch('displayWorkingSeatTable', {seatTableId: {{ $seatTable->seat_table_id }} })"
      role="button"
  >
    <div class="card-header @if ($seatTable->isBooked()) @else bg-success text-white @endif">
      <div class="d-flex">
        <div>
          <h2 class="badge">
            {{ $seatTable->name }}
          </h2>
        </div>
        @include ('partials.dashboard.spinner-button')
      </div>
    </div>
  
    <div class="card-body p-0">
      @if ($seatTable->getCurrentBooking())
        <div class="row" style="margin: auto;">
          <div class="col-md-12">
            <table class="table @if ($seatTable->isBooked()) bg-danger @else bg-success @endif text-white">
              <tr class="border-0">
                <td class="border-0">
                  @if ($seatTable->getCurrentBooking())
                    {{ $seatTable->getCurrentBooking()->created_at->format('h:i') }}
                  @else
                    NA
                  @endif
                </td>
                <td class="font-weight-bold border-0">
                  @if ($seatTable->isBooked())
                    {{ $seatTable->getCurrentBookingTotalItems() }}
                  @else
                    NA
                  @endif
                </td>
              </tr>
              <tr class="border-0">
                <td colspan="2" class="border-0">
                  @if ($seatTable->isBooked())
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
                  @else
                  @endif
                </td>
              </tr>
            </table>
          </div>
        </div>
      @else
        <div>
          <table class="table @if ($seatTable->isBooked()) bg-danger @else bg-success @endif text-white">
            <tr class="border-0">
              <td class="border-0">
                OPEN
              </td>
              <td class="font-weight-bold border-0">
              </td>
            </tr>
            <tr class="border-0">
              <td colspan="2" class="border-0">
              <i class="fas fa-plus-circle"></i>
              </td>
            </tr>
          </table>
        </div>
      @endif
    </div>
  </div>

</div>
