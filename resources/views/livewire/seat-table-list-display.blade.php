<div class="card mb-3 shadow">
  <div class="card-header bg-light" style="background-image: linear-gradient(to right, #fff, #abc);">
    <h2 class="h4 text badge badge-info p-3 text-white" style="font-size: 1.3rem;">
      {{ $seatTable->name }}
    </h2>
  </div>

  <div class="card-body p-0">
    <div class="row" style="margin: auto;">
      <div class="col-md-8">
        <div class="table-responsive">
          <table class="table">
            <tr class="text-success" style="font-size: 1.3rem;">
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
          </table>
        </div>
      </div>

      @if ($seatTable->isBooked())
      <div class="col-md-4 bg-danger text-white" wire:click="$emit('displayWorkingSeatTable', {{ $seatTable->seat_table_id }})">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center align-self-center text-center">
            <h3 class="h5 font-weight-bold">
              BOOKED
            </h3>
          </div>
        </div>
      </div>
      @else
      <div class="col-md-4 bg-success text-white" wire:click="$emit('displayWorkingSeatTable', {{ $seatTable->seat_table_id }})">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center align-self-center text-center">
            <h3 class="h5 font-weight-bold">
              OPEN
            </h3>
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
