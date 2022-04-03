<div>

  <div class="border">
    <div class="d-flex mb-0 p-2 justify-content-end bg-light-rm border" style="background-color: #eee;">
      <button class="btn btn-danger border rounded-circle" wire:click="$emit('exitPurchaseDisplay')">
        <i class="fas fa-times fa-2x-rm"></i>
      </button>
    </div>

    <div class="row">

      <div class="col-md-7">
        <div class="card mb-0">
        
          <div class="card-body p-0" style="font-size: 1.3rem;">
            <div class="table-responsive">
              <table class="table">
                <tbody>

                  <tr class="bg-success text-white">
                    <th>
                      Purchase ID
                    </th>
                    <td>
                      {{ $purchase->purchase_id }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Date
                    </th>
                    <td>
                      {{ $purchase->created_at->toDateString() }}
                    </td>
                  </tr>

                  <tr>
                    <th>
                      Payment status
                    </th>
                    <td>
                      @if ( $purchase->payment_status == 'paid')
                        <span class="badge badge-pill badge-success">
                          Paid
                        </span>
                      @elseif ( $purchase->payment_status == 'partially_paid')
                        <span class="badge badge-pill badge-warning">
                          Partial
                        </span>
                      @elseif ( $purchase->payment_status == 'pending')
                        <span class="badge badge-pill badge-danger">
                          Pending
                        </span>
                      @else
                        <span class="badge badge-pill badge-secondary">
                          {{ $purchase->payment_status }}
                        </span>
                      @endif
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered table-hover">
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
    
            <tfoot class="bg-white">
              <tr style="font-size: 1.8rem;">
                <td colspan="5" style="font-size: 1.8rem;" class="font-weight-bold text-right">
                  <strong>
                  TOTAL
                  </strong>
                </td>
                <td style="font-size: 1.8rem;">
                  @php echo number_format( $purchase->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
    
          </table>
        </div>

        <div class="mt-4">
          <h2 class="m-3">
            Payments
          </h2>

          @if (count($purchase->purchasePayments) > 0)
            <div class="table-responsive" style="font-size: 1.3rem;">
              <table class="table table-bordered mb-0">
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
            <div class="my-3 p-3 text-secondary">
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
  <div>

</div>
