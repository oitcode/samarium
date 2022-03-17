<div class="card mb-3 shadow">
  <div class="card-header @if ($seatTable->isBooked()) @else bg-success-rm @endif" style="{{--background-image: linear-gradient(to right, #5a5,
  green); @if ($seatTable->isBooked()) background-color: orange; @endif--}}">

    <div class="float-left">
      <h2 class="badge @if ($seatTable->isBooked()) badge-danger @else badge-success @endif" style="font-size: 1.7rem;">
        {{ $seatTable->name }}
      </h2>
    </div>
    <div class="float-right text-secondary" style="font-size: 1.5rem;">
        @if ($seatTable->isBooked())
          <i class="fas fa-rupee-sign mr-3"></i>
          @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
        @else
        @endif
    </div>
    <div class="clearfix">
    </div>

  </div>

  <div class="card-body p-0">
    <div class="row" style="margin: auto;">
      <div class="col-md-8">
        <div class="table-responsive">
          <table class="table">
            <tr class="text-success" style="font-size: 1.3rem;">
              <td>
                <i class="fas fa-clock mr-3"></i>
                Start time
              </td>
              <td class="font-weight-bold">
                @if ($seatTable->getCurrentBooking())
                  {{ $seatTable->getCurrentBooking()->created_at->format('h:i') }}
                @else
                  NA
                @endif
              </td>
            </tr>
            <tr class="text-secondary" style="font-size: 1.3rem;">
              <td>
                <i class="fas fa-shopping-cart mr-3"></i>
                Total items
              </td>
              <td class="font-weight-bold">
                @if ($seatTable->isBooked())
                  {{ $seatTable->getCurrentBookingTotalItems() }}
                @else
                  NA
                @endif
              </td>
            </tr>
            @if (false)
            <tr style="font-size: 1.3rem;">
              <td>
                <i class="fas fa-rupee-sign mr-3"></i>
                Total bill amount
              </td>
              <td class="font-weight-bold">
                @if ($seatTable->isBooked())
                  {{ $seatTable->getCurrentBookingTotalAmount() }}
                @else
                  NA
                @endif
              </td>
            </tr>
            @endif
          </table>
        </div>
      </div>

      @if ($seatTable->isBooked())
      <div class="col-md-4 bg-danger-rm text-white" wire:click="$emit('displayWorkingSeatTable', {{ $seatTable->seat_table_id }})"
      style="background-color: orange;"
      role="button">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center align-self-center text-center">
            <h3 class="h5 font-weight-bold p-4">
              BOOKED
            </h3>
            <button wire:loading class="btn">
              <span class="spinner-border text-info mr-3" role="status">
              </span>
            </button>
          </div>
        </div>
      </div>
      @else
      <div class="col-md-4 bg-success text-white" wire:click="$emit('displayWorkingSeatTable', {{ $seatTable->seat_table_id }})"
      style="{{--background-color: green;--} font-weight: bold;"
      role="button">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center align-self-center text-center">
            <h3 class="h5 font-weight-bold p-4">
              OPEN
            </h3>
            <button wire:loading class="btn">
              <span class="spinner-border text-info mr-3" role="status">
              </span>
            </button>
          </div>
        </div>
      </div>
      @endif

    </div>

    @if (false)
    <div class="p-2">
      <button class="btn btn-danger mr-3">
        <i class="fas fa-check mr-3"></i>
        Clear table
      </button>

      <button class="btn btn-success mr-3">
        Book
      </button>
    </div>
    @endif

  </div>
</div>
