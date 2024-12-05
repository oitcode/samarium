<div>

  <div class="">

    <div class="row">

      <div class="col-md-8">

        @if ($purchase->payment_status == 'pending')
          @if (true || $modes['addItem'])
            @livewire ('purchase-add-item', ['purchase' => $purchase,])
          @endif
        @endif

        <div class="card mb-3">
        
          <div class="card-body p-0">

            {{-- Top info --}}
            <div class="row p-4" style="margin: auto;">

              <div class="col-md-3 mb-3">
                <div class="text-muted-rm mb-1">
                  Vendor
                  OLA
                </div>
                <div class="h5">
                  @if ($purchase->vendor)
                    <i class="fas fa-user-circle text-muted mr-2"></i>
                    {{ $purchase->vendor->name }}
                  @else
                    <i class="fas fa-exclamation-circle text-muted mr-2"></i>
                    <span class="text-muted">
                      None
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-3 mb-3">
                <div class="text-muted-rm mb-1">
                  Purchase ID
                </div>
                <div class="h5">
                  {{ $purchase->purchase_id }}
                </div>
              </div>

              <div class="col-md-3 mb-3">
                <div class="text-muted-rm mb-1">
                  Purchase Date
                </div>
                <div class="h5">
                  {{ $purchase->created_at->toDateString() }}
                </div>
              </div>

              <div class="col-md-3 mb-3">
                <div class="text-muted-rm mb-1">
                  Created by
                </div>
                <div class="h5">
                  @if ($purchase->creator)
                    {{ $purchase->creator->name }}
                  @else
                    Unknown
                  @endif
                </div>
              </div>

              <div class="col-md-3 mb-3">
                <div>
                  Payment Status
                </div>
                <div>
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
                 <div>
                   <div class="text-primary" role="button" wire:click="enterMode('showPayments')">
                     Show payments
                   </div>
                 </div>
                 @if (false && $modes['showPayments'])
                   <div>
                     <div>
                       Payments
                     </div>
                     <div>
                       @foreach ($purchase->purchasePayments as $purchasePayment)
                         <div>
                         Rs
                         @php echo number_format( $purchasePayment->amount ); @endphp
                         <span class="badge badge-pill ml-3">
                         {{ $purchasePayment->purchasePaymentType->name }}
                         </span>
                         <span class="badge badge-pill ml-3">
                         {{ $purchasePayment->payment_date }}
                         </span>
                         </div>
                       @endforeach
                     </div>
                   </div>
                 @endif
                </div>
              </div>

            </div>

          </div>
        </div>

        {{-- Show in bigger screens --}}
        <div class="table-responsive border d-none d-md-block">
          <table class="table table-hover mb-0">
            <thead>
              <tr class="bg-success-rm text-white-rm">
                <th>#</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Price per unit</th>
                <th>Amount</th>
              </tr>
            </thead>
    
            <tbody class="bg-white">
              @if (count($purchase->purchaseItems) > 0)
                @foreach ($purchase->purchaseItems as $item)
                <tr class="font-weight-bold text-white-rm border-bottom">
                  <td class="text-secondary"> {{ $loop->iteration }} </td>
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
              <tr class="border-0">
                <td colspan="5" class="font-weight-bold text-right border-0">
                  <strong>
                  Subtotal
                  </strong>
                </td>
                <td class="border-0">
                  @php echo number_format( $purchase->getTotalAmountRaw() ); @endphp
                </td>
              </tr>

              @foreach ($purchase->purchaseAdditions as $purchaseAddition)
                <tr class="border-0">
                  <td colspan="5" class="font-weight-bold text-right border-0">
                    <strong>
                    {{ $purchaseAddition->purchaseAdditionHeading->name }}
                    </strong>
                  </td>
                  <td class="border-0">
                    @php echo number_format( $purchaseAddition->amount ); @endphp
                  </td>
                </tr>
              @endforeach
              <tr class="border-0">
                <td colspan="5" class="font-weight-bold text-right border-0">
                  <strong>
                  Total
                  </strong>
                </td>
                <td class="border-0">
                  @php echo number_format( $purchase->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
    
          </table>
        </div>

        {{-- Show in smaller screens --}}
        <div class="table-responsive border d-md-none">
          <table class="table table-hover border mb-0">
    
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
                  <td class="font-weight-bold">
                    Rs
                    @php echo number_format( $item->getTotalAmount() ); @endphp
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>

            <tfoot class="bg-white">
              <tr class="font-weight-bold">
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

      </div>
    
      <div class="col-md-4">
        <div>
          @if ($modes['payment'] && $purchase->payment_status != 'paid')
            @livewire ('purchase-make-payment', ['purchase' => $purchase,])
          @endif
        </div>
      </div>

    </div>
  <div>

</div>
