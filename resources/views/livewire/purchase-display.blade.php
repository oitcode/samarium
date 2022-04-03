<div>

  <div class="row">

    <div class="col-md-7">
      <div class="card mb-0">
        <div class="card-header bg-success text-white">
          <h1 class="d-inline" style="font-size: 2rem;">
            Purchase ID:
            {{ $purchase->purchase_id }}
          </h2>

          <div class="d-inline">
            <button wire:loading class="btn">
              <span class="spinner-border text-white mr-3" role="status" style="font-size: 1rem;">
              </span>
            </button>
          </div>
        </div>
      
        <div class="card-body p-3" style="font-size: 1.3rem;">
          Date: {{ $purchase->created_at->toDateString() }}
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover border-dark">
          <thead>
            <tr class="bg-success text-white" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
              <th>#</th>
              <th>Item</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Price per unit</th>
              <th>Amount</th>
            </tr>
          </thead>
  
          <tbody style="font-size: 1.3rem;" class="bg-white">
            @if (count($purchase->purchaseItems) > 0)
              @foreach ($purchase->purchaseItems as $item)
              <tr style="font-size: 1.3rem; {{--background-image: linear-gradient(to right, #AFDBF5, #AFDBF5);--}}" class="font-weight-bold text-white-rm">
                <td class="text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
                <td>
                  <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                  {{ $item->product->name }}
                </td>
                <td>
                  <span class="badge badge-pill-rm badge-success">
                    {{ $item->quantity }}
                  </span>
                </td>
                <td>
                  {{ $item->unit }}
                </td>
                <td>
                  @php echo number_format( $item->purchase_price_per_unit ); @endphp
                </td>
                <td>
                  @php echo number_format( $item->getTotalAmount() ); @endphp
                </td>
              </tr>
              @endforeach
            @endif
          </tbody>
  
          <tfoot class="bg-white" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
            <td colspan="5" style="font-size: 1.5rem;" class="font-weight-bold text-right">
              <strong>
              TOTAL
              </strong>
            </td>
            <td style="font-size: 1.5rem;">
              @php echo number_format( $purchase->getTotalAmount() ); @endphp
            </td>
          </tfoot>
  
        </table>
      </div>

      <div class="mt-4">
        <h2>
          Payments
        </h2>

        @if (count($purchase->purchasePayments) > 0)
          <div class="table-responsive" style="font-size: 1.3rem;">
            <table class="table table-bordered">
              <thead>
                <tr class="bg-success text-white">
                  <th>
                    Date
                  </th>
                  <th>
                    Type
                  </th>
                  <th>
                    Amount
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($purchase->purchasePayments as $purchasePayment )
                  <tr>
                    <td>
                      {{ $purchasePayment->payment_date }}
                    </td>
                    <td>
                      {{ $purchasePayment->purchasePaymentType->name }}
                    </td>
                    <td>
                      {{ $purchasePayment->amount }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
              </tfoot>
            </table>
          </div>
        @else
          <div class="my-3 text-secondary">
            No payments
          </div>
        @endif
      </div>

    </div>
  
    <div class="col-md-5">
      <div>
        @if ($modes['payment'] && $purchase->payment_status != 'paid')
          @livewire ('purchase-make-payment', ['purchase' => $purchase,])
        @endif
      </div>
    </div>

  </div>

</div>
