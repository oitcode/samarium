<div>

  <div class="">
    <div class="d-flex mb-0 p-2 justify-content-end bg-success-rm text-white-rm border" style="background-color: #eee;">
      <button class="btn btn-danger border rounded-circle" wire:click="$emit('exitPurchaseDisplay')">
        <i class="fas fa-times fa-2x-rm"></i>
      </button>
    </div>

    @if ($purchase->payment_status == 'pending')
      @if (true || $modes['addItem'])
        @livewire ('purchase-add-item', ['purchase' => $purchase,])
      @endif
    @endif

    <div class="row">

      <div class="col-md-7">
        <div class="card mb-3">
        
          <div class="card-body p-0">

            {{-- Top info --}}
            <div class="table-responsive">
              <table class="table">
                <tbody>

                  <tr class="bg-success-rm text-white-rm">
                    <th style="font-size: calc(1rem + 0.2vw);">
                      Purchase ID
                    </th>
                    <td>
                      {{ $purchase->purchase_id }}
                    </td>
                  </tr>
                  <tr>
                    <th style="font-size: calc(1rem + 0.2vw);">
                      Date
                    </th>
                    <td>
                      {{ $purchase->created_at->toDateString() }}
                    </td>
                  </tr>

                  <tr>
                    <th style="font-size: calc(1rem + 0.2vw);">
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

        {{-- Show in bigger screens --}}
        <div class="table-responsive d-none d-md-block">
          <table class="table table-bordered table-hover">
            <thead>
              <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
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

        {{-- Show in smaller screens --}}
        <div class="table-responsive border d-md-none">
          <table class="table table-hover border mb-0">
            @if (false)
            <thead>
              <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
                <th>#</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Price per unit</th>
                <th>Amount</th>
              </tr>
            </thead>
            @endif
    
            <tbody class="bg-white">
              @if (count($purchase->purchaseItems) > 0)
                @foreach ($purchase->purchaseItems as $item)
                <tr class="font-weight-bold text-white-rm">
                  <td>
                    <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                  </td>

                  <td>
                    {{ $item->product->name }}
                    <div>
                      <span class="mr-3">
                        Rs
                        @php echo number_format( $item->purchase_price_per_unit ); @endphp
                      </span>
                      <span class="text-primary">
                        Qty:
                        {{ $item->quantity }}
                        {{ $item->unit }}
                      </span>
                    </div>
                  </td>
                  <td class="font-weight-bold" style="font-size: 1rem;">
                    Rs
                    @php echo number_format( $item->getTotalAmount() ); @endphp
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>

            <tfoot class="bg-white">
              <tr class="font-weight-bold" style="font-size: 1.1rem">
                <th colspan="2" class="text-right mr-3">
                  Total
                </th>
                <td>
                  Rs
                  @php echo number_format( $purchase->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
          </table>
        </div>

        <div class="mt-4 bg-white border">
          <h2 class="h4 p-3">
            Payments
          </h2>

          @if (count($purchase->purchasePayments) > 0)
            <div class="table-responsive" style="font-size: calc(1rem + 0.2vw);">
              <table class="table table-bordered mb-0">
                <thead>
                  <tr class="bg-success-rm text-white-rm">
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
                        Rs
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
