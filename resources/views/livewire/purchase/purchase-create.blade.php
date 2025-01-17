<div>

  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white border">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
        Purchase
        <i class="fas fa-angle-right mx-2"></i>
        {{ $purchase->purchase_id }}
      </div>
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm">

          <div>
            <button class="btn btn-primary p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-primary p-3" wire:click="">
              <i class="fas fa-envelope"></i>
              Email
            </button>
            <button class="btn btn-success p-3" wire:click="">
              <i class="fas fa-print"></i>
              Print
            </button>
            <button class="btn btn-danger p-3" wire:click="$dispatch('exitPurchaseDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="row">

    <div class="col-md-8">
      {{-- Top info --}}
      <div class="row p-0 py-2 mt-2 bg-white mb-2" style="margin: auto;">

        <div class="col-md-3 d-flex">
          <div class="">
            <div class="mb-1 h6 o-heading">
              Purchase ID
            </div>
            <div class="h6">
              {{ $purchase->purchase_id }}
            </div>
          </div>
        </div>

        <div class="col-md-3 d-flex">

          <div class="">
            <div class="h6 o-heading">
              Purchase Date
            </div>
            @if ($modes['backDate'])
              <div>
                <div>
                  <input type="date" wire:model="sale_invoice_date">
                  <div class="mt-2">
                    <button class="btn btn-light" wire:click="changeSaleInvoiceDate">
                      <i class="fas fa-check-circle text-success"></i>
                    </button>
                    <button class="btn btn-light" wire:click="exitMode('backDate')">
                      <i class="fas fa-times-circle text-danger"></i>
                    </button>
                  </div>
                </div>
              </div>
            @else
              <div class="h6" role="button" wire:click="enterModeSilent('backDate')">
                {{ $purchase->purchase_date }}
              </div>
            @endif
          </div>

        </div>
    
    
        <div class="col-md-3 mb-3 border-left border-right">
          <div class="h6 o-heading">
            Vendor
          </div>
          <div class="d-flex">
            @if ($modes['vendorSelected'])
              {{ $purchase->vendor->name }}
            @else
              @if ($purchase->creation_status == 'progress')
                <select class="custom-control w-75" wire:model="vendor_id">
                  <option>---</option>

                  @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->vendor_id }}">
                      {{ $vendor->name }}
                    </option>
                  @endforeach
                </select>
                <button class="btn btn-sm btn-light ml-2" wire:click="linkVendorToPurchase">
                  Yes
                </button>
              @else
                None
              @endif
            @endif
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="o-heading">
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
          </div>
        </div>

        <div class="col-md-2">
        </div>
    
      </div>

      @if (! $modes['paid'])
        @if (true || $modes['addItem'])
          @livewire ('purchase.purchase-add-item', ['purchase' => $purchase,])
        @endif
      @endif

      @if (false)
      {{-- Component loading indicator line --}}
      <div class="w-100" wire:loading.class="bg-info w-100">
        <div>
          &nbsp;
        </div>
      </div>
      @endif

      <div class="card mb-0">
      
        <div class="card-body p-0">


          @if (count($purchase->purchaseItems) > 0)

            {{-- Show in bigger screens --}}
            <div class="table-responsive border d-none d-md-block">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th class="o-heading">--</th>
                    <th class="o-heading">#</th>
                    <th class="o-heading">Item</th>
                    <th class="o-heading">Quantity</th>
                    <th class="o-heading">Unit</th>
                    <th class="o-heading">Price per unit</th>
                    <th class="o-heading">Amount</th>
                  </tr>
                </thead>
  
                <tbody class="bg-white">
                  @if (count($purchase->purchaseItems) > 0)
                    @foreach ($purchase->purchaseItems as $item)
                    <tr class="font-weight-bold">
                      <td>
                        <a href="" wire:click.prevent="confirmRemoveItemFromPurchase({{ $item->purchase_item_id }})">
                        <i class="fas fa-trash text-danger"></i>
                        </a>
                      </td>
                      <td class="text-secondary"> {{ $loop->iteration }} </td>
                      <td>
                        <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                        {{ $item->product->name }}
                      </td>
                      <td>
                        <span class="badge badge-success">
                          {{ $item->quantity }}
                        </span>
                      </td>
                      <td>
                        {{ $item->unit }}
                      </td>
                      <td>
                        @php echo number_format( $item->purchase_price_per_unit, 2 ); @endphp
                      </td>
                      <td>
                        @php echo number_format( $item->getTotalAmount(), 2 ); @endphp
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
  
                <tfoot>
                  <tr>
                    <td colspan="6" class="o-heading text-right">
                      Subtotal
                    </td>
                    <td class="o-heading">
                      @php echo number_format( $purchase->getTotalAmountRaw(), 2 ); @endphp
                    </td>
                  </tr>

                  @if ($modes['paid'])
                    @foreach ($purchase->purchaseAdditions as $purchaseAddition)
                      <tr>
                        <td colspan="6" class="font-weight-bold text-right">
                          <strong>
                          {{ $purchaseAddition->purchaseAdditionHeading->name }}
                          </strong>
                        </td>
                        <td>
                          @php echo number_format( $purchaseAddition->amount, 2 ); @endphp
                        </td>
                      </tr>
                    @endforeach
                    <tr>
                      <td colspan="6" class="font-weight-bold text-right">
                        <strong>
                        Total
                        </strong>
                      </td>
                      <td> 
                        @php echo number_format( $purchase->getTotalAmount(), 2 ); @endphp
                      </td>
                    </tr>
                  @endif
                </tfoot>
  
              </table>
            </div>

            {{-- Show in smaller screens --}}
            <div class="table-responsive d-md-none border">
              <table class="table table-hover border-dark mb-0">
  
                <tbody class="bg-white">
                  @if (count($purchase->purchaseItems) > 0)
                    @foreach ($purchase->purchaseItems as $item)
                    <tr class="font-weight-bold">
                      <td>
                        <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                      </td>
                      <td>
                        <div class="font-weight-bold">
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
                      <td class="font-weight-bold">
                        Rs
                        @php echo number_format( $item->getTotalAmount(), 2 ); @endphp
                      </td>
                      <td>
                        <a href="" wire:click.prevent="confirmRemoveItemFromCurrentBooking({{ $item->sale_invoice_item_id }})">
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
              <p class="font-weight-bold h4 py-4 text-center" style="color: #fe8d01;">
                <i class="fas fa-exclamation-circle mr-2"></i>
                No items in the list
              <p>
            </div>
          @endif
        </div>
      </div>

    </div>
  
    <div class="col-md-4">
      <div>
        @if (! $modes['paid'])
          @livewire ('purchase.purchase-make-payment', ['purchase' => $purchase,])
        @endif
      </div>
    </div>

  </div>

  {{-- Purchase item delete confirm --}}
  @if ($modes['deletingPurchaseItemMode'])
    @livewire ('purchase-create-confirm-purchase-item-delete', [
        'purchaseItem' => $deletingPurchaseItem,
    ])
  @endif


</div>
