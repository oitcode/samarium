<div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Sale quotation
      <i class="fas fa-angle-right mx-2"></i>
      {{ $saleQuotation->sale_quotation_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="enterModeSilent('addItem')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add item
      </x-toolbar-button-component>
      <a href="{{ route('dashboard-print-sale-quotation', $saleQuotation->sale_quotation_id) }}" class="btn btn-light px-3 border" target="_blank">
        <i class="fas fa-print mr-1"></i>
        Print
      </a>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitSaleQuotationDisplayMode')">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div>
    {{-- Show in bigger screens --}}
    @if ($saleQuotation)
      @if ($modes['addItem'])
        @livewire ('sale-quotation.dashboard.sale-quotation-work-add-item', ['saleQuotation' => $saleQuotation,])
      @endif
    @endif
  
    @if ($saleQuotation)
      <div class="card mb-0 shadow-sm">
        <div class="card-body p-0 mt-3">
          <div class="row p-0" style="margin: auto;">
            <div class="col-md-4 d-flex">
              <div class="mb-4">
                <div class="mb-1 h6 o-heading">
                  Quotation ID
                </div>
                <div class="h6">
                  {{ $saleQuotation->sale_quotation_id }}
                </div>
              </div>
            </div>

            <div class="col-md-4 d-flex">
              <div>
                <div class="mb-1 h6 o-heading">
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
  
            <div class="col-md-4 mb-3 border-left border-right">
              <div class="mb-1 h6 o-heading">
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
                <tr class="o-heading">
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
                    <tr>
                      @if ($saleQuotation->creation_status == 'progress')
                        <td>
                          <a href="" wire:click.prevent="confirmRemoveItemFromSaleQuotation({{ $item->sale_quotation_item_id }})">
                          <i class="fas fa-trash text-danger"></i>
                          </a>
                        </td>
                      @endif
                      <td> {{ $loop->iteration }} </td>
                      <td>
                        <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 30px; height: 30px;">
                        {{ $item->product->name }}
                      </td>
                      <td>
                        {{ config('app.transaction_currency_symbol') }}
                        @php echo number_format( $item->price_per_unit ); @endphp
                      </td>
                      <td>
                        <span>
                          {{ $item->quantity }}
                        </span>
                      </td>
                      <td>
                        {{ config('app.transaction_currency_symbol') }}
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
                      class="o-heading text-right pr-4 py-1">
                    <strong>
                    Subtotal
                    </strong>
                  </td>
                  <td class="o-heading py-1">
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $saleQuotation->getTotalAmountRaw() ); @endphp
                  </td>
                </tr>
                @if ($saleQuotation->creation_status == 'progress')
                <tr class="border-0 bg-light text-dark p-0">
                  <td colspan="
                      @if ($saleQuotation->creation_status == 'progress')
                        5
                      @else
                        4
                      @endif"
                      class="o-heading text-right border-0 pr-4 py-2">
                    <strong>
                    Total
                    </strong>
                  </td>
                  <td class="o-heading border-0 py-2">
                    {{ config('app.transaction_currency_symbol') }}
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
                  <tr class="o-heading">
                    <td>
                      <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                    </td>
                    <td>
                      {{ $item->product->name }}
                      <br />
                      <span class="mr-3">
                        Rs @php echo number_format( $item->product->selling_price ); @endphp
                      </span>
                      <span>
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
  
    @if ($modes['confirmRemoveSaleQuotationItem'])
      @livewire ('sale-quotation.dashboard.sale-quotation-work-confirm-sale-quotation-item-delete', ['deletingSaleQuotationItem' => $deletingSaleQuotationItem,])
    @endif
  </div>

</div>
