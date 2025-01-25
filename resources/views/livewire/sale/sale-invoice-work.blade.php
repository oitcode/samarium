<div>


  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Sale
      <i class="fas fa-angle-right mx-2"></i>
      {{ $saleInvoice->sale_invoice_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-primary" btnClickMethod="">
        <i class="fas fa-envelope"></i>
        Email
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-success" btnClickMethod="">
        <i class="fas fa-print"></i>
        Print
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="closeThisComponent">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>


  @if (
          ($saleInvoice->seatTableBooking && $saleInvoice->seatTableBooking->status == 'closed')
          ||
          $saleInvoice->creation_status == 'closed'
  )
    @livewire ('core.core-sale-invoice-display', ['saleInvoice' => $saleInvoice, 'display_toolbar' => false,])
  @else
    <div>
    
      {{-- Show in bigger screens --}}
      <div class="row">
        <div class="col-md-8">
          @if ($saleInvoice)
            <x-transaction-main-info-component>
              <x-slot name="transactionIdName">
                Sale Invoice ID
              </x-slot>
              <x-slot name="transactionIdValue">
                {{ $saleInvoice->sale_invoice_id }}
              </x-slot>
              <x-slot name="transactionDateName">
                Sale Invoice Date
              </x-slot>
              <x-slot name="transactionDateValue">
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
                    {{ $saleInvoice->sale_invoice_date }}
                  </div>
                @endif
              </x-slot>
              <x-slot name="transactionPartyName">
                Customer
              </x-slot>
              <x-slot name="transactionPartyValue">
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
                    <select class="custom-control w-75" wire:model="customer_id">
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
              </x-slot>
              <x-slot name="transactionPaymentStatusName">
                Payment Status
              </x-slot>
              <x-slot name="transactionPaymentStatusValue">
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
              </x-slot>
            </x-transaction-main-info-component>
          @endif

          @if ($saleInvoice)
            {{-- Todo: Why true? --}} 
            @if (true || $modes['addItem'])
              @livewire ('sale.sale-invoice-work-add-item', ['saleInvoice' => $saleInvoice,])
            @endif
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
                        <th class="o-heading">--</th>
                        <th class="o-heading">Item</th>
                        <th class="o-heading">Price</th>
                        <th class="o-heading">Qty</th>
                        <th class="o-heading">Amount</th>
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
                        <td colspan="4" class="o-heading text-right pr-4 py-3">
                          Subtotal
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
                    <p class="font-weight-bold h4 py-4 text-center" style="color: #fe8d01;">
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
      </div>
      @if ($modes['confirmRemoveSaleInvoiceItem'])
        @livewire ('sale.sale-invoice-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
      @endif
    </div>
  @endif


</div>
