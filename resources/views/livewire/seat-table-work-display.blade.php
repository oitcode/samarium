<div>
  @if ($modes['addItem'])
    @livewire ('seat-table-work-display-add-item', ['seat_table_booking_id' => $seatTable->getCurrentBooking()->seat_table_booking_id,])
  @endif

  <div class="row">

    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-info">
          <h2 class="h4">
            {{ $seatTable->name }}
          </h2>
        </div>
      
        <div class="card-body p-0">
  
          <div class="row">
            <div class="col-md-8">
              <div class="p-2">
  
                @if ($seatTable->isBooked())
                  <button class="btn btn-success mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('addItem')">
                    <i class="fas fa-plus mr-3"></i>
                    Add Item
                  </button>
                @endif
  
                @if ($seatTable->isBooked())
                  <button class="btn btn-warning mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('makePayment')">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    Payment
                  </button>
                @else
                  <button class="btn btn-success mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="bookSeatTable">
                    <i class="fas fa-check mr-3"></i>
                    Book table
                  </button>
                @endif
  
              </div>

              <div class="table-responsive">
                <table class="table">
                  <tr class="text-success" style="font-size: 1.3rem;">
                    <td>
                      <i class="fas fa-shopping-cart mr-3"></i>
                      Total items
                    </td>
                    <td>
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
                    <td>
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

            <div class="col-md-4">
              @if ($seatTable->isBooked())
                <div class="d-flex justify-content-center h-100 bg-danger">
                  <div class="d-flex justify-content-center align-self-center">
                    <h3 class="h5 font-weight-bold">
                      BOOKED
                    </h3>
                  </div>
                </div>
              @else
                <div class="d-flex justify-content-center h-100 bg-success">
                  <div class="d-flex justify-content-center align-self-center">
                    <h3 class="h5 font-weight-bold">
                      OPEN
                    </h3>
                  </div>
                </div>
              @endif
            </div>
          </div>

        </div>
      </div>

      @if ($modes['makePayment'])
        @livewire ('seat-table-work-display-make-payment', ['seatTable' => $seatTable,])
      @endif
  
    </div>
  
    <div class="col-md-6">
      @if ($seatTable->isBooked())
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-success" style="font-size: 1.3rem;">
              <th>#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>
  
          <tbody style="font-size: 1.3rem;" class="bg-info">
            @if ($seatTable->isBooked() && count($seatTable->getCurrentBookingItems()) > 0)
              @foreach ($seatTable->getCurrentBookingItems() as $item)
              <tr>
                <td> {{ $loop->iteration }} </td>
                <td>
                  {{ $item->product->name }}
                </td>
                <td>
                  {{ $item->product->selling_price }}
                </td>
                <td>
                  {{ $item->quantity }}
                </td>
                <td>
                  {{ $item->getTotalAmount() }}
                </td>
              </tr>
              @endforeach
            @endif
          </tbody>
  
          <tfoot class="bg-danger">
            <td colspan="4" style="font-size: 1.5rem;" class="font-weight-bold text-right">
              TOTAL
            </td>
            <td style="font-size: 1.5rem;" class="font-weight-bold">
              @if ($seatTable->isBooked())
                {{ $seatTable->getCurrentBookingTotalAmount() }}
              @else
                0
              @endif
            </td>
          </tfoot>
  
        </table>
      </div>
      @endif

      <div>
        <div class="float-right">
        </div>
      </div>
      
    </div>
  </div>
</div>
