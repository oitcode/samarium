<div>


  <div class="d-flex justify-content-between bg-dark-rm text-white-rm py-0 border-rm">
    {{-- Breadcrumb --}}
    <div class="my-2 py-2">
      Sale

      <i class="fas fa-angle-right mx-2"></i>
      {{ $saleInvoice->sale_invoice_id }}
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm"
            style="{{-- background-color: #dadada; --}}">

          <div>
            <button class="btn btn-light" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-outline-danger" wire:click="$emit('exitSaleInvoiceWorkMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  @if ($saleInvoice->takeaway && $saleInvoice->takeaway->status == 'closed')
    @livewire ('core.core-sale-invoice-display', ['saleInvoice' => $saleInvoice,])
  @else
    <div>
    
      {{-- Show in bigger screens --}}
      <div class="row">
    
        <div class="col-md-8">

          @if (false)
          <div>
            @include ('partials.dashboard.sale-invoice-work-options')
          </div>
          @endif
    
          @if ($saleInvoice)
            {{-- Todo: Why true? Why only takeaway? --}} 
            @if (true || $modes['addItem'])
              @livewire ('sale.sale-invoice-work-add-item', ['saleInvoice' => $saleInvoice,])
            @endif
          @endif
    
          @if ($saleInvoice)
    
          {{-- Component loading indicator line --}}
          <div class="w-100" wire:loading.class="bg-info w-100" style="font-size: 0.2rem;">
            <div>
              &nbsp;
            </div>
          </div>
    
          <div class="card mb-0">
            <div class="card-body p-0">
    
    
              <div class="row p-0 mt-2 pb-5-rm" style="margin: auto;">


                <div class="col-md-3 d-flex">
                  <div class="mb-4">
                    <div class="mb-1 h6 font-weight-bold">
                      Invoice ID
                    </div>
                    <div class="h6">
                      {{ $saleInvoice->sale_invoice_id }}
                    </div>
                  </div>
                </div>

                <div class="col-md-3 d-flex">

                  <div class="">
                    <div class="mb-1 h6 font-weight-bold">
                      Invoice Date
                    </div>
                    @if ($modes['backDate'])
                      <div>
                        <div>
                          <input type="date" wire:model.defer="sale_invoice_date">
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
                        {{ $saleInvoice->sale_invoice_date }}
                      </div>
                    @endif
                  </div>

                </div>
    
    
                <div class="col-md-3 mb-3 border-left border-right">
                  <div class="mb-1 h6 font-weight-bold">
                    Customer
                  </div>
                  <div class="d-flex">
                    @if ($modes['customerSelected'])
                      {{ $saleInvoice->customer->name }}
                    @else
                      @if (
                            (
                              $saleInvoice->takeaway &&
                              $saleInvoice->takeaway->status == 'open'
                            )
                            ||
                            (
                              $saleInvoice->seatTableBooking &&
                              $saleInvoice->seatTableBooking->status == 'open'
                            )
                      )
                        <select class="custom-control w-75" wire:model.defer="customer_id">
                          <option>---</option>
    
                          @foreach ($customers as $customer)
                            <option value="{{ $customer->customer_id }}">
                              {{ $customer->name }}
                            </option>
                          @endforeach
                        </select>
                        <button class="btn btn-sm btn-light ml-2" wire:click="linkCustomerToSaleInvoice">
                          Select
                        </button>
                      @else
                        None
                      @endif
                    @endif
                  </div>
                </div>
    
                <div class="col-md-3">
                  <div class="font-weight-bold">
                    Payment Status
                  </div>
                  <div>
                    @if ( $saleInvoice->payment_status == 'paid')
                    <span class="badge badge-pill badge-success">
                    Paid
                    </span>
                    @elseif ( $saleInvoice->payment_status == 'partially_paid')
                    <span class="badge badge-pill badge-warning">
                    Partial
                    </span>
                    @elseif ( $saleInvoice->payment_status == 'pending')
                    <span class="badge badge-pill badge-danger">
                    Pending
                    </span>
                    @else
                    <span class="badge badge-pill badge-secondary">
                      {{ $saleInvoice->payment_status }}
                    </span>
                    @endif
                  </div>
                </div>

                <div class="col-md-2">
                  @if (false)
                  <div class="d-none d-md-block">
                    <div class="d-flex h-100 h6 font-weight-bold">
                        <span>
                          Sales
                        </span>
                    </div>
                  </div>
                  @endif
                </div>
    
              </div>
    
            </div>
          </div>
          @endif
    
    
          <div class="card mb-3 shadow-sm">
          
            <div class="card-body p-0">
    
              @if ($saleInvoice)
    
                @if (count($saleInvoice->saleInvoiceItems) > 0)
                {{-- Show in bigger screens --}}
                <div class="table-responsive d-none d-md-block">
                  <table class="table table-hover border-dark mb-0">
                    <thead>
                      <tr>
                        <th>--</th>
                        @if (false)
                        <th>#</th>
                        @endif
                        <th>Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
      
                    <tbody>
                      @if ($saleInvoice)
                        @if (count($saleInvoice->saleInvoiceItems) > 0)
                          @foreach ($saleInvoice->saleInvoiceItems as $item)
                          <tr class="font-weight-bold">
                            <td>
                              <a href="" wire:click.prevent="confirmRemoveItemFromSaleInvoice({{ $item->sale_invoice_item_id }})">
                              <i class="fas fa-times-circle text-danger"></i>
                              </a>
                            </td>
                            @if (false)
                            <td class="text-secondary"> {{ $loop->iteration }} </td>
                            @endif
                            <td>
                              <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 30px; height: 30px;">
                              {{ $item->product->name }}
                            </td>
                            <td>
                              @php echo number_format( $item->price_per_unit ); @endphp
                            </td>
                            <td>
                              <span>
                                {{ $item->quantity }}
                              </span>
                            </td>
                            <td>
                              @php echo number_format( $item->getTotalAmount() ); @endphp
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      @endif
                    </tbody>
      
                    <tfoot>
                      <tr class="py-0">
                        <td colspan="4" class="font-weight-bold text-right pr-4 py-3">
                          <strong>
                          Subtotal
                          </strong>
                        </td>
                        <td class="font-weight-bold py-3">
                          @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                        </td>
                      </tr>
    
                      @if (
                        (
                          $saleInvoice->takeaway &&
                          $saleInvoice->takeaway->status == 'closed'
                        ) 
                        ||
                        (
                          $saleInvoice->seatTableBooking &&
                          $saleInvoice->seatTableBooking->status == 'closed'
                        ) 
                      )
                      {{-- Non tax sale invoice additions --}}
                      @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
    
                        @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                          @continue
                        @endif
    
                        <tr class="border-0 p-0">
                          <td colspan="5" class="font-weight-bold text-right border-0 pr-4 py-1">
                            {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                          </td>
                          <td
                              class="
                                @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                                  text-danger
                                @endif
                                font-weight-bold border-0 pr-4 py-1">
                            @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                          </td>
                        </tr>
                      @endforeach
    
                      {{-- Taxable amount --}}
                      {{-- Todo: Only vat? --}}
                      @if ($has_vat)
                        <tr class="border-0 p-0">
                          <td colspan="5" class="font-weight-bold text-right border-0 pr-4 py-1">
                            Taxable amount
                          </td>
                          <td
                              class=" font-weight-bold border-0 pr-4 py-1">
                            @php echo number_format( $saleInvoice->getTaxableAmount() ); @endphp
                          </td>
                        </tr>
                      @endif
    
                      {{--Tax sale invoice additions --}}
                      @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
    
                        @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) != 'vat')
                          @continue
                        @endif
    
                        <tr class="border-0 p-0">
                          <td colspan="5"
                              class="
                                font-weight-bold text-right border-0 pr-4 py-1
                              ">
                            {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                            (13 %)
                          </td>
                          <td class="
                                @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                                  text-danger
                                @endif
                                font-weight-bold border-0 py-1">
                            @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                          </td>
                        </tr>
                      @endforeach
    
                      <tr class="border-0 bg-success text-white p-0">
                        <td colspan="5"
                            class="font-weight-bold text-right border-0 pr-4 py-2">
                          <strong>
                          Total
                          </strong>
                        </td>
                        <td class="font-weight-bold border-0 py-2">
                          @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                        </td>
                      </tr>
                      @endif
                    </tfoot>
      
                  </table>
                </div>
    
                {{-- Show in smaller screens --}}
                <div class="table-responsive d-md-none">
                  <table class="table">
                    @if ($saleInvoice)
                      @if (count($saleInvoice->saleInvoiceItems) > 0)
                        @foreach ($saleInvoice->saleInvoiceItems as $item)
                        <tr class="font-weight-bold">
                          <td>
                            <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                          </td>
                          <td>
                            {{ $item->product->name }}
                            <br />
                            <span class="mr-3">
                              Rs @php echo number_format( $item->product->selling_price ); @endphp
                            </span>
                            <span class="text-secondary">
                              Qty: {{ $item->quantity }}
                            </span>
                          </td>
                          <td>
                            @php echo number_format( $item->getTotalAmount() ); @endphp
                          </td>
                          <td>
                            <a href="" wire:click.prevent="confirmRemoveItemFromTakeaway({{ $item->sale_invoice_item_id }})">
                            <i class="fas fa-trash text-danger"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      @endif
                    @endif
                  </table>
                </div>
                @else
                  <div class="p-4 bg-white border text-muted">
                    <p class="font-weight-bold text-muted-rm h4 py-4 text-center" style="color: #fe8d01;">
                      <i class="fas fa-exclamation-circle mr-2"></i>
                      No items in the list
                    <p>
                  </div>
                @endif
              @endif
    
            </div>
          </div>
    
        </div>
      
    
        <div class="col-md-4">
          @if ($saleInvoice->status != 'closed' && $saleInvoice->payment_status != 'paid' && $modes['makePayment'])
            @livewire ('sale.sale-invoice-work-make-payment', ['saleInvoice' => $saleInvoice,])
          @endif
        </div>
    
        <div class="col-md-2">
        </div>
      </div>
    
      @if ($modes['confirmRemoveSaleInvoiceItem'])
        @livewire ('sale.sale-invoice-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
      @endif
    
    </div>
  @endif


</div>
