<div>
  {{-- Main Info --}}
  <div class="card mb-3 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr class="bg-success text-white" style="font-size: 1.3rem;">
              <th class="pl-3">
                Customer
              </th>
              <td style="font-weight: bold;">
                @if ($customer)
                self
              </td>
            </tr>
            <tr class="text-secondary" style="font-size: 1.3rem;">
              <th class="pl-3">
                Bill ID
              </th>
              <td style="font-weight: bold;">
                90{{ $seatTableBooking->seat_table_booking_id }}
              </td>
            </tr>
            <tr class="text-secondary" style="font-size: 1.3rem;">
              <th class="pl-3">
                Total
              </th>
              <td class="text-danger" style="font-weight: bold;">
                <i class="fas fa-rupee-sign mr-3"></i>
                @php echo number_format( $seatTableBooking->getTotalAmount() ); @endphp
              </td>
            </tr>
            <tr class="text-secondary" style="font-size: 1.3rem;">
              <th class="pl-3">
                Payment Status
              </th>
              <td style="font-weight: bold;">
                <span class="badge badge-success">
                  Paid
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Items List --}}
  <div class="table-responsive">
    <table class="table table-bordered table-hover border-dark shadow-sm">
      <thead>
        <tr class="bg-success text-white" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
          <th>#</th>
          <th>Item</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Amount</th>
        </tr>
      </thead>

      <tbody style="font-size: 1.3rem;">
        @foreach ($seatTableBooking->seatTableBookingItems as $item)
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
      </tbody>

      <tfoot class="bg-success-rm text-white-rm" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
        <td colspan="4" style="font-size: 1.5rem;" class="font-weight-bold text-right">
          <strong>
          TOTAL
          </strong>
        </td>
        <td style="font-size: 1.5rem;" class="font-weight-bold">
          @php echo number_format( $seatTableBooking->getTotalAmount() ); @endphp
        </td>
      </tfoot>

    </table>
  </div>
</div>
