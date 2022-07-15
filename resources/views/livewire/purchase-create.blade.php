<div>

  @if (! $modes['paid'])
    @if (true || $modes['addItem'])
      @livewire ('purchase-add-item', ['purchase' => $purchase,])
    @endif
  @endif

  <div class="row">

    <div class="col-md-7">
      <div class="card mb-0">
      
        <div class="card-body p-0">
            {{-- Top info --}}
            <div class="row p-4" style="margin: auto;">

              <div class="col-md-3 mb-3">
                <div class="text-muted-rm mb-1">
                  Vendor
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
                   <div class="text-primary" style="font-size: 0.8rem;" role="button" wire:click="enterMode('showPayments')">
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
          @if (count($purchase->purchaseItems) > 0)

          {{-- Show in bigger screens --}}
          <div class="table-responsive border d-none d-md-block">
            <table class="table table-hover mb-0">
              <thead>
                <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
                  <th>--</th>
                  <th>#</th>
                  <th>Item</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Price per unit</th>
                  <th>Amount</th>
                </tr>
              </thead>
  
              <tbody class="bg-white" style="font-size: calc(0.6rem + 0.2vw);">
                @if (count($purchase->purchaseItems) > 0)
                  @foreach ($purchase->purchaseItems as $item)
                  <tr style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-white-rm">
                    <td>
                      <a href="" wire:click.prevent="confirmRemoveItemFromCurrentBooking({{ $item->sale_invoice_item_id }})" class="">
                      <i class="fas fa-trash text-danger"></i>
                      </a>
                    </td>
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
  
              <tfoot class="bg-success-rm text-white-rm" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
                <td colspan="6" style="font-size: 1.5rem;" class="font-weight-bold text-right">
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

          {{-- Show in smaller screens --}}
          <div class="table-responsive d-md-none border">
            <table class="table table-hover border-dark mb-0">
  
              <tbody class="bg-white">
                @if (count($purchase->purchaseItems) > 0)
                  @foreach ($purchase->purchaseItems as $item)
                  <tr class="font-weight-bold text-white-rm">
                    <td>
                      <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                    </td>
                    <td>
                      <div class="font-weight-bold" style="font-size: 1rem;">
                        {{ $item->product->name }}
                      </div>
                      <div class="mt-2">
                        <span class="mr-3">
                          PPU: Rs {{ $item->purchase_price_per_unit }}
                        </span>
                      </div>
                      <div>
                        <span class="mr-3">
                          Unit: {{ $item->unit }}
                        </span>
                      </div>
                      <div>
                        <span class="text-primary">
                          Qty: {{ $item->quantity }}
                        </span>
                      </div>
                    </td>
                    <td class="font-weight-bold" style="font-size: 1rem;">
                      Rs
                      @php echo number_format( $item->getTotalAmount() ); @endphp
                    </td>
                    <td>
                      <a href="" wire:click.prevent="confirmRemoveItemFromCurrentBooking({{ $item->sale_invoice_item_id }})" class="">
                      <i class="fas fa-trash text-danger"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                @endif
              </tbody>
  
            </table>
          </div>
          @else
            <div class="p-4 bg-white border text-muted">
              <p>
                <i class="fas fa-exclamation-circle mr-3"></i>
                No items
              <p>
            </div>
          @endif
        </div>
      </div>


    </div>
  
    <div class="col-md-5 mt-3 mt-md-0">

      <div class="mb-4">

        <table class="table shadow">
          <tr class="bg-white">
            <td>
              Vendor
            </td>
            <td>
              <select class="w-50 custom-control-rm" wire:model.defer="vendor_id">
                <option>---</option>

                @foreach ($vendors as $vendor)
                  <option value="{{ $vendor->vendor_id }}">
                    {{ $vendor->name }}
                  </option>
                @endforeach
              </select>
            </td>
            <td>
              <button class="btn border" wire:click="linkPurchaseToVendor">
                Confirm
              </button>
            </td>
          </tr>
        </table>

      </div>

      <div>
        @if (! $modes['paid'])
          @livewire ('purchase-make-payment', ['purchase' => $purchase,])
        @endif
      </div>
    </div>

  </div>

</div>
