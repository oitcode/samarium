<div>

    {{--
    Table info
    --}}
    <div class="my-5">
      <h1 class="text-primary font-weight-bold">
        {{ $seatTable->name }}
      </h1>
    </div>

    {{--
    Items info
    --}}
    <div class="mb-5">
      <h1>
        Item List
      </h1>
      <div class="table-responsive border">
        @if ($seatTable->isBooked())
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Item</th>
                <th>Rate</th>
                <th>Qty</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($seatTable->getCurrentBooking()->saleInvoice->saleInvoiceItems as $saleInvoiceItem)
                <tr>
                  <td>
                    {{ $loop->iteration }}
                  </td>
                  <td>
                    <img src="{{ asset('storage/' . $saleInvoiceItem->product->image_path) }}" class="img-fluid" style="height: 50px;">
                    {{ $saleInvoiceItem->product->name }}
                  </td>
                  <td>
                    {{ $saleInvoiceItem->price_per_unit }}
                  </td>
                  <td>
                    {{ $saleInvoiceItem->quantity }}
                  </td>
                  <td>
                    {{ $saleInvoiceItem->price_per_unit * $saleInvoiceItem->quantity }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <div class="text-secondary">
            Not opened
          </div>
        @endif
      </div>
    </div>

    {{--
    Total info
    --}}
    <div class="my-3">
      <h1>
        Total
      </h1>

      @if ($seatTable->isBooked())
        <h1 class="text-danger font-weight-bold">
          {{ $seatTable->getCurrentBooking()->saleInvoice->getTotalAmount() }}
        </h1>
      @endif
    </div>
</div>
