<div class="">

  @if (($saleInvoice->seatTableBooking && $saleInvoice->seatTableBooking->status == 'closed')
        ||
        $saleInvoice->creation_status == 'closed'
  )
    {{--
    |
    | Display final invoice if already created. 
    |
    --}}
    @livewire ('core.dashboard.core-sale-invoice-display', ['saleInvoice' => $saleInvoice, 'exitDispatchEvent' => 'exitSaleInvoiceWorkMode',])
  @else
    <x-transaction-create-component>
      <x-slot name="topToolbar">
        {{--
        |
        | Toolbar
        |
        --}}
        <x-toolbar-component>
          <x-slot name="toolbarInfo">
            @if (false)
            Sale
            <i class="fas fa-angle-right mx-2"></i>
            {{ $saleInvoice->sale_invoice_id }}
            @else
              Sale Invoice ID:
              &nbsp;
              <span class="o-heading text-white-rm">
                {{ $saleInvoice->sale_invoice_id }}
              </span>
              &nbsp;
              &nbsp;
              &nbsp;
              &nbsp;
              &nbsp;
              Date:
              &nbsp;
              <span class="o-heading text-white-rm">
                {{ $saleInvoice->created_at->toDateString() }}
              </span>
            @endif
          </x-slot>
          <x-slot name="toolbarButtons">
            <div class="py-2">
              <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
                <i class="fas fa-refresh"></i>
              </x-toolbar-button-component>
              <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="">
                <i class="fas fa-envelope"></i>
                Email
              </x-toolbar-button-component>
              <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="">
                <i class="fas fa-print"></i>
                Print
              </x-toolbar-button-component>
              <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="closeThisComponent">
                <i class="fas fa-times-circle text-danger mr-1"></i>
                Close
              </x-toolbar-button-component>
            </div>
          </x-slot>
        </x-toolbar-component>
      </x-slot>

      <x-slot name="transactionMainInfo">
        @if (false)
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
      </x-slot>

      <x-slot name="transactionAddItem">
        @livewire ('sale-invoice.dashboard.sale-invoice-work-add-item', ['saleInvoice' => $saleInvoice,])
      </x-slot>

      <x-slot name="transactionItemList">
        <div class="bg-dark text-white text-center px-3 py-2">
          <span class="h4 o-heading text-white">
            Transaction #: {{ $saleInvoice->sale_invoice_id }}
          </span>
          <br/>
          {{ $saleInvoice->created_at->toDateString() }}
        </div>
        <div class="card mb-3 shadow-rm">
          <div class="card-body p-0">
            @if ($saleInvoice)
              {{-- Show in bigger screens --}}
              <div class="table-responsive d-none-rm d-md-block-rm">
                <table class="table table-hover border-dark mb-0">
                  <thead>
                    <tr>
                      <th class="o-heading">--</th>
                      <th class="o-heading">ITEM</th>
                      <th class="o-heading">QTY</th>
                      <th class="o-heading">PRICE</th>
                      <th class="o-heading">TOTAL</th>
                    </tr>
                  </thead>
                  @if (count($saleInvoice->saleInvoiceItems) > 0)
                    <tbody>
                      @foreach ($saleInvoice->saleInvoiceItems as $item)
                      <tr class="font-weight-bold">
                        <td>
                          <a href="" wire:click.prevent="confirmRemoveItemFromSaleInvoice({{ $item->sale_invoice_item_id }})">
                          @if (false)
                          <i class="fas fa-times-circle text-danger"></i>
                          @endif
                          </a>
                          <span class="bg-danger text-white px-2 h-100 mx-1">
                            DEL
                          </span>
                        </td>
                        <td>
                          <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 30px; height: 30px;">
                          {{ $item->product->name }}
                        </td>
                        <td class="">
                          <span>
                            {{ $item->quantity }}
                          </span>
                        </td>
                        <td class="o-heading">
                          {{ config('app.transaction_currency_symbol') }}
                          @php echo number_format( $item->price_per_unit ); @endphp
                        </td>
                        <td class="o-heading">
                          {{ config('app.transaction_currency_symbol') }}
                          @php echo number_format( $item->getTotalAmount() ); @endphp
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  @else
                    <tr class="font-weight-bold">
                      <td colspan="5" class="py-4 text-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        No products added
                      </td>
                    </tr>
                  @endif
                  <tfoot>
                    <tr class="py-0">
                      <td colspan="4" class="o-heading text-right pr-4 py-3">
                        Subtotal
                      </td>
                      <td class="o-heading py-3">
                        {{ config('app.transaction_currency_symbol') }}
                        @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
      
              {{-- Show in smaller screens --}}
              @if (false)
              <div class="table-responsive d-md-none">
                <table class="table">
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
                </table>
              </div>
              @endif
            @endif
          </div>
        </div>
      </x-slot>

      <x-slot name="transactionTotalBreakdown">
        {{-- Todo --}}
      </x-slot>

      <x-slot name="transactionPayment">
        @if ($saleInvoice->status != 'closed' && $saleInvoice->payment_status != 'paid' && $modes['makePayment'])
          @livewire ('sale-invoice.dashboard.sale-invoice-work-make-payment', ['saleInvoice' => $saleInvoice,])
        @endif
      </x-slot>

      <div>
        @if ($modes['confirmRemoveSaleInvoiceItem'])
          @livewire ('sale-invoice.dashboard.sale-invoice-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
        @endif
      </div>
    </x-transaction-create-component>
  @endif

</div>
