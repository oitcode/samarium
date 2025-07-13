<div>

  {{--
  |
  | Purchase Editor Livewire Component View
  | 
  | Blade template for the purchase editor Livewire component that handles
  | the display and editing of purchase transactions.
  | 
  | Component Features:
  | - Displays completed purchases with full transaction details
  | - Allows editing of purchase-in-progress transactions
  | - Vendor selection and linking functionality
  | - Item management (add/remove items from purchase)
  | - Payment status tracking (paid, partial, pending)
  | - Payment processing integration
  | 
  | Livewire Properties Used:
  | - $purchase - The purchase model instance
  | - $modes - Array controlling various component states
  | - $vendors - Collection of available vendors
  | - $vendor_id - Selected vendor ID
  | - $purchase_date - Purchase date for editing
  |
  --}}

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $purchase->purchase_id }}
    </div>
  </div>

  @if ($purchase->creation_status == 'created')
    @livewire ('core.dashboard.core-purchase-display', ['purchase' => $purchase, 'exitDispatchEvent' => 'exitPurchaseCreate',])
  @else
    <x-transaction-create-component>
      <x-slot name="topToolbar">
        <x-toolbar-component>
          <x-slot name="toolbarInfo">
            Purchase
            <i class="fas fa-angle-right mx-2"></i>
            {{ $purchase->purchase_id }}
          </x-slot>
          <x-slot name="toolbarButtons">
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
            <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitPurchaseDisplayMode')">
              <i class="fas fa-times-circle text-danger mr-1"></i>
              Close
            </x-toolbar-button-component>
          </x-slot>
        </x-toolbar-component>
      </x-slot>

      <x-slot name="transactionMainInfo">
        <x-transaction-main-info-component>
          <x-slot name="transactionIdName">
            Purchase ID
          </x-slot>
          <x-slot name="transactionIdValue">
            {{ $purchase->purchase_id }}
          </x-slot>
          <x-slot name="transactionDateName">
            Purchase Date
          </x-slot>
          <x-slot name="transactionDateValue">
            @if ($modes['backDate'])
              <div>
                <div>
                  <input type="date" wire:model="purchase_date">
                  <div class="mt-2">
                    <button class="btn btn-light" wire:click="changePurchaseDate">
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
          </x-slot>
          <x-slot name="transactionPartyName">
            Vendor
          </x-slot>
          <x-slot name="transactionPartyValue">
            @if ($modes['vendorSelected'])
              {{ $purchase->vendor->name }}
            @else
              @if ($purchase->creation_status == 'progress')
                <div class="d-flex">
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
                </div>
              @else
                None
              @endif
            @endif
          </x-slot>
          <x-slot name="transactionPaymentStatusName">
            Payment Status
          </x-slot>
          <x-slot name="transactionPaymentStatusValue">
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
          </x-slot>
        </x-transaction-main-info-component>
      </x-slot>

      <x-slot name="transactionAddItem">
        @livewire ('purchase.dashboard.purchase-editor-add-item', ['purchase' => $purchase,])
      </x-slot>

      <x-slot name="transactionItemList">
        <div class="card mb-0">
          <div class="card-body p-0">
            <div class="table-responsive border">
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
                        {{ $item->quantity }}
                      </td>
                      <td>
                        {{ $item->unit }}
                      </td>
                      <td>
                        {{ config('app.transaction_currency_symbol') }}
                        @php echo number_format( $item->purchase_price_per_unit, 2 ); @endphp
                      </td>
                      <td>
                        {{ config('app.transaction_currency_symbol') }}
                        @php echo number_format( $item->getTotalAmount(), 2 ); @endphp
                      </td>
                    </tr>
                    @endforeach
                  @else
                    <tr class="font-weight-bold">
                      <td colspan="7" class="text-center py-4">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        No products added
                      </td>
                    </tr>
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="6" class="o-heading text-right">
                      Subtotal
                    </td>
                    <td class="o-heading">
                      {{ config('app.transaction_currency_symbol') }}
                      @php echo number_format( $purchase->getTotalAmountRaw(), 2 ); @endphp
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </x-slot>

      <x-slot name="transactionTotalBreakdown">
        {{-- Todo --}}
      </x-slot>

      <x-slot name="transactionPayment">
        @if (! $modes['paid'])
          @livewire ('purchase.dashboard.purchase-editor-make-payment', ['purchase' => $purchase,])
        @endif
      </x-slot>

      {{-- Purchase item delete confirm --}}
      @if ($modes['deletingPurchaseItemMode'])
        @livewire ('purchase-create-confirm-purchase-item-delete', [
            'purchaseItem' => $deletingPurchaseItem,
        ])
      @endif
    </x-transaction-create-component>
  @endif

</div>
