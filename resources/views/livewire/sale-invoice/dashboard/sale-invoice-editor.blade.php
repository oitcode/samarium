<div>

  {{--
  |--------------------------------------------------------------------------
  | Sale Invoice Work View
  |--------------------------------------------------------------------------
  |
  | This blade template handles the sale invoice creation/editing workflow.
  | It displays either a finalized invoice (if creation_status is 'closed')
  | or an interactive interface for building the invoice including:
  | - Adding/removing items to the invoice
  | - Managing payment recording
  | - Real-time invoice totals calculation
  | - Print/email functionality
  |
  | Used by: SaleInvoiceWork Livewire component
  |
  | Dependencies: CoreSaleInvoiceDisplay, SaleInvoiceWorkAddItem,
  |               SaleInvoiceWorkMakePayment livewire components
  |
  --}}

  @if ($saleInvoice->creation_status == 'closed')
    {{--
    |
    | Display final invoice if already created. 
    |
    --}}
    @livewire ('core.dashboard.core-sale-invoice-display', ['saleInvoice' => $saleInvoice, 'exitDispatchEvent' => 'exitSaleInvoiceWorkMode',])
  @else
    <x-transaction-create-component>
      {{--
      |
      | Top toolbar section.
      |
      --}}
      <x-slot name="topToolbarNxt">
        <div class="d-flex justify-content-between text-dark px-1 o-linear-gradient o-border-radius mb-3 pl-3 py-3">
          <div class="d-flex flex-column justify-content-center text-white-rm">
            <div>
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
            </div>
          </div>
          <div class="py-2">
            <span class="btn btn-light border o-border-radius px-4 mr-3 o-heading" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </span>
            <span class="btn btn-light border o-border-radius px-4 mr-3 o-heading" wire:click="">
              <i class="fas fa-envelope"></i>
              Email
            </span>
            <span class="btn btn-light border o-border-radius px-4 mr-3 o-heading" wire:click="">
              <i class="fas fa-print"></i>
              Print
            </span>
            <span class="btn btn-light border o-border-radius px-4 mr-3 o-heading" wire:click="closeThisComponent">
              <i class="fas fa-times-circle text-danger mr-1"></i>
              Close
            </span>
            @if (false)
            <x-toolbar-button-component btnBsClass="btn-success border-0" btnClickMethod="$refresh">
              <i class="fas fa-refresh"></i>
            </x-toolbar-button-component>
            <x-toolbar-button-component btnBsClass="btn-primary border-0" btnClickMethod="">
              <i class="fas fa-envelope"></i>
              Email
            </x-toolbar-button-component>
            <x-toolbar-button-component btnBsClass="btn-dark border-0" btnClickMethod="">
              <i class="fas fa-print"></i>
              Print
            </x-toolbar-button-component>
            <x-toolbar-button-component btnBsClass="btn-danger border-0" btnClickMethod="closeThisComponent">
              <i class="fas fa-times-circle text-danger-rm mr-1"></i>
              Close
            </x-toolbar-button-component>
            @endif
          </div>
        </div>
      </x-slot>

      {{-- Todo: Unused slot --}}
      <x-slot name="topToolbar">
      </x-slot>

      {{-- Todo: Unused slot --}}
      <x-slot name="transactionMainInfo">
      </x-slot>

      {{--
      |
      | Transaction add item section.
      |
      --}}
      <x-slot name="transactionAddItem">
        @livewire ('sale-invoice.dashboard.sale-invoice-editor-add-item', ['saleInvoice' => $saleInvoice,])
      </x-slot>

      {{--
      |
      | Transaction item list section.
      |
      --}}
      <x-slot name="transactionItemList">
        <div class="text-white-rm text-center px-3 py-2 o-package-color-rm">
          <span class="h4 o-heading text-white-rm">
            Transaction #: {{ $saleInvoice->sale_invoice_id }}
          </span>
          <br/>
          {{ $saleInvoice->created_at->toDateString() }}
        </div>
        <div class="card mb-3">
          <div class="card-body p-0">
            @if ($saleInvoice)
              <div class="table-responsive">
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
            @endif
          </div>
        </div>
      </x-slot>

      {{-- Todo: Unused slot --}}
      <x-slot name="transactionTotalBreakdown">
      </x-slot>

      {{--
      |
      | Payment recording section.
      |
      --}}
      <x-slot name="transactionPayment">
        @if ($saleInvoice->status != 'closed' && $saleInvoice->payment_status != 'paid' && $modes['makePayment'])
          @livewire ('sale-invoice.dashboard.sale-invoice-editor-make-payment', ['saleInvoice' => $saleInvoice,])
        @endif
      </x-slot>

      {{--
      |
      | Sale invoice item remove section.
      |
      --}}
      <div>
        @if ($modes['confirmRemoveSaleInvoiceItem'])
          @livewire ('sale-invoice.dashboard.sale-invoice-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
        @endif
      </div>
    </x-transaction-create-component>
  @endif

</div>
