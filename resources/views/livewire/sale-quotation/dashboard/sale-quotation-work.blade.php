<div>


  @if (false)
    To be removed
  @else

    <div class="d-flex justify-content-between bg-dark-rm text-white-rm py-0 border-rm">
      {{-- Breadcrumb --}}
      <div class="my-2 py-2">
        Sale quotation

        <i class="fas fa-angle-right mx-2"></i>
        {{ $saleQuotation->sale_quotation_id }}
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

              <button class="btn btn-outline-danger" wire:click="$dispatch('exitSaleQuotationDisplayMode')">
                <i class="fas fa-times"></i>
                Close
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div>
    
      {{-- Show in bigger screens --}}
      <div class="row">
    
        <div class="col-md-6">
    
          @if ($saleQuotation)
            @if ($modes['addItem'])
              @livewire ('sale-quotation.dashboard.sale-quotation-work-add-item', ['saleQuotation' => $saleQuotation,])
            @endif
          @endif
    
          @if ($saleQuotation)
    
          {{-- Component loading indicator line --}}
          <div class="w-100" wire:loading.class="bg-info w-100" style="font-size: 0.2rem;">
            <div>
              &nbsp;
            </div>
          </div>
    
          <div class="card mb-0 shadow-sm">
            <div class="card-body p-0">
    
    
              <div class="row p-0 mt-2" style="margin: auto;">
    
    
                <div class="col-md-2 mb-3">
                  <div class="mb-4">
                    <div class="mb-1 h6 font-weight-bold">
                      Quotation ID
                    </div>
                    <div class="h6">
                      {{ $saleQuotation->sale_quotation_id }}
                    </div>
                  </div>

                  <div>
                    <div class="mb-1 h6 font-weight-bold">
                      Quotation Date
                    </div>
                    @if ($modes['backDate'])
                      <div>
                        <div>
                          <input type="date" wire:model="sale_quotation_date">
                          <div class="mt-2">
                            <button class="btn btn-light" wire:click="changeSaleQuotationDate">
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
                        {{ $saleQuotation->sale_quotation_date }}
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
                      {{ $saleQuotation->customer->name }}
                    @else
                      @if ($saleQuotation->creation_status == 'progress')
                        <select class="custom-control w-75" wire:model="customer_id">
                          <option>---</option>
    
                          @foreach ($customers as $customer)
                            <option value="{{ $customer->customer_id }}">
                              {{ $customer->name }}
                            </option>
                          @endforeach
                        </select>
                        <button class="btn btn-sm btn-light ml-2" wire:click="linkCustomerToSaleQuotation">
                          Select
                        </button>
                      @else
                        None
                      @endif
                    @endif
                  </div>
                </div>
    
                @if (false)
                <div class="col-md-2">
                  <div>
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
                @endif

                <div class="col-md-2">
                  <div class="d-none d-md-block">
                    <div class="d-flex h-100 h1 font-weight-bold">
                        Sale quotation
                    </div>
                  </div>
                </div>
    
              </div>
    
            </div>
          </div>
          @endif
    
    
          <div class="card mb-3 shadow-sm">
          
            <div class="card-body p-0">
    
              @if ($saleQuotation)
    
                @if (count($saleQuotation->saleQuotationItems) > 0)
                {{-- Show in bigger screens --}}
                <div class="table-responsive d-none d-md-block">
                  <table class="table table-hover border-dark mb-0">
                    <thead>
                      <tr>
                        <th>--</th>
                        <th>#</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
      
                    <tbody>
                      @if ($saleQuotation)
                        @if (count($saleQuotation->saleQuotationItems) > 0)
                          @foreach ($saleQuotation->saleQuotationItems as $item)
                          <tr class="font-weight-bold">
                            @if ($saleQuotation->creation_status == 'progress')
                              <td>
                                <a href="" wire:click.prevent="confirmRemoveItemFromSaleQuotation({{ $item->sale_quotation_item_id }})">
                                <i class="fas fa-trash text-danger"></i>
                                </a>
                              </td>
                            @endif
                            <td class="text-secondary"> {{ $loop->iteration }} </td>
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
                        <td colspan="
                            @if ($saleQuotation->creation_status == 'progress')
                              5
                            @else
                              4
                            @endif
                            "
                            class="font-weight-bold text-right pr-4 py-1">
                          <strong>
                          Subtotal
                          </strong>
                        </td>
                        <td class="font-weight-bold py-1">
                          @php echo number_format( $saleQuotation->getTotalAmountRaw() ); @endphp
                        </td>
                      </tr>
    
                      @if ($saleQuotation->creation_status == 'progress')

                      @if (false)
                      {{-- Non tax sale invoice additions --}}
                      @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
    
                        @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                          @continue
                        @endif
    
                        <tr class="border-0 p-0">
                          <td colspan="
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
                                5
                              @else
                                4
                              @endif"
                              class="
                                font-weight-bold text-right border-0 pr-4 py-1
                              ">
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
                      @endif
    
                      @if (false)
                      {{-- Taxable amount --}}
                      {{-- Todo: Only vat? --}}
                      @if ($has_vat)
                        <tr class="border-0 p-0">
                          <td colspan="
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
                                5
                              @else
                                4
                              @endif"
                              class="
                                font-weight-bold text-right border-0 pr-4 py-1
                              ">
                            Taxable amount
                          </td>
                          <td
                              class=" font-weight-bold border-0 pr-4 py-1">
                            @php echo number_format( $saleInvoice->getTaxableAmount() ); @endphp
                          </td>
                        </tr>
                      @endif
                      @endif
    
                      @if (false)
                      {{--Tax sale invoice additions --}}
                      @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
    
                        @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) != 'vat')
                          @continue
                        @endif
    
                        <tr class="border-0 p-0">
                          <td colspan="
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
                                5
                              @else
                                4
                              @endif"
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
                      @endif
    
                      <tr class="border-0 bg-success text-white p-0">
                        <td colspan="
                            @if ($saleQuotation->creation_status == 'progress')
                              5
                            @else
                              4
                            @endif"
                            class="font-weight-bold text-right border-0 pr-4 py-2">
                          <strong>
                          Total
                          </strong>
                        </td>
                        <td class="font-weight-bold border-0 py-2">
                          @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
                        </td>
                      </tr>
                      @endif
                    </tfoot>
      
                  </table>
                </div>
    
                {{-- Show in smaller screens --}}
                <div class="table-responsive d-md-none">
                  <table class="table">
                    @if ($saleQuotation)
                      @if (count($saleQuotation->saleQuotationItems) > 0)
                        @foreach ($saleQuotation->saleQuotationItems as $item)
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
                    <p>
                      <i class="fas fa-exclamation-circle mr-3"></i>
                      No items
                    <p>
                  </div>
                @endif
              @endif
    
            </div>
          </div>
    
        </div>
      
    
        @if (false)
        <div class="col-md-4">
        </div>
        @endif
    
        <div class="col-md-2">
          <div>
            @include ('partials.dashboard.sale-quotation-work-options')
          </div>
        </div>
      </div>
    
      @if ($modes['confirmRemoveSaleQuotationItem'])
        @livewire ('sale-quotation.dashboard.sale-quotation-work-confirm-sale-quotation-item-delete', ['deletingSaleQuotationItem' => $deletingSaleQuotationItem,])
      @endif
    
    </div>
  @endif


</div>
