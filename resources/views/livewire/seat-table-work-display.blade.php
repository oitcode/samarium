<div>
  @if ($seatTable->isBooked())
    @if (true || $modes['addItem'])
      @livewire ('seat-table-work-display-add-item', ['seat_table_booking_id' => $seatTable->getCurrentBooking()->seat_table_booking_id,])
    @endif
  @endif

  <div class="row">

    <div class="col-md-6">
      <div class="card mb-3 shadow">
        <div class="card-header bg-success-rm text-white-rm">
          <h1 class="badge badge-success" style="font-size: 2rem;">
            {{ $seatTable->name }}
          </h2>
        </div>
      
        <div class="card-body p-0">
  
          <div class="row">
            <div class="col-md-8">
              <div class="p-2">
                <div class="float-left">
                  @if ($seatTable->isBooked())
                    <button class="btn btn-warning-rm mr-3" style="height: 100px; width: 225px; font-size: 1.5rem; background-color: orange;" wire:click="enterMode('makePayment')">
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
                <div class="float-left">
                  @if ($seatTable->isBooked())
                    @if (true)
                    <button class="btn btn-warning-rm mr-3 p-3 text-danger" style="font-size: 2.5rem;">
                      <i class="fas fa-rupee-sign mr-2"></i>
                      @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
                    </button>
                    @else
                      FOO
                    @endif
                  @endif
                </div>

                <div class="float-left">
                  <button wire:loading class="btn">
                    <span class="spinner-border text-info mr-3" role="status">
                    </span>
                  </button>
                </div>

                <div class="clearfix">
                </div>
  
  
              </div>

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
                        @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
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
                <div class="d-flex justify-content-center h-100 bg-danger text-white">
                  <div class="d-flex justify-content-center align-self-center">
                    <h3 class="h5 font-weight-bold">
                      BOOKED
                    </h3>
                  </div>
                </div>
              @else
                <div class="d-flex justify-content-center h-100 bg-success text-white">
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
        <table class="table table-bordered table-hover border-dark">
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
              <th>#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>
  
          <tbody style="font-size: 1.3rem;">
            @if ($seatTable->isBooked() && count($seatTable->getCurrentBookingItems()) > 0)
              @foreach ($seatTable->getCurrentBookingItems() as $item)
              <tr style="font-size: 1.3rem; {{--background-image: linear-gradient(to right, #AFDBF5, #AFDBF5);--}}" class="font-weight-bold text-white-rm">
                <td class="text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
                <td>
                  <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                  {{ $item->product->name }}
                </td>
                <td>
                  @php echo number_format( $item->product->selling_price ); @endphp
                </td>
                <td>
                  <span class="badge badge-pill-rm badge-success">
                    {{ $item->quantity }}
                  </span>
                </td>
                <td>
                  @php echo number_format( $item->getTotalAmount() ); @endphp
                </td>
              </tr>
              @endforeach
            @endif
          </tbody>
  
          <tfoot class="bg-success text-white" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
            <td colspan="4" style="font-size: 1.5rem;" class="font-weight-bold text-right">
              <strong>
              TOTAL
              </strong>
            </td>
            <td style="font-size: 1.5rem;" class="font-weight-bold">
              @if ($seatTable->isBooked())
                @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
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
