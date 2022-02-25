<div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover border-dark">
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem; background-color: orange;">
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
                {{ $item->product->selling_price }}
              </td>
              <td>
                <span class="badge badge-pill-rm badge-success">
                  {{ $item->quantity }}
                </span>
              </td>
              <td>
                {{ $item->getTotalAmount() }}
              </td>
            </tr>
            @endforeach
          </tbody>
  
          <tfoot class="bg-success text-white" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
            <td colspan="4" style="font-size: 1.5rem;" class="font-weight-bold text-right">
              <strong>
              TOTAL
              </strong>
            </td>
            <td style="font-size: 1.5rem;" class="font-weight-bold">
              {{ $seatTableBooking->getTotalAmount() }}
            </td>
          </tfoot>
  
        </table>
      </div>
</div>
