<div>

  {{--
  |
  | Toolbar.
  |
  --}}

  @if ($display_toolbar)
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
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-print mr-1"></i>
          Print
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-file-pdf-o mr-1"></i>
          PDF
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-file-excel-o mr-1"></i>
          Excel
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitPurchaseDisplay')">
          Close
        </x-toolbar-button-component>
      </x-slot>
    </x-toolbar-component>
  @endif

  <div class="bg-white border p-0">
    {{-- Company Info --}}
    <div class="d-flex justify-content-between p-3 border-bottom">
      <div>
        <span class="o-heading">
          Purchase ID
        </span>
        <br/>
        <span>
          {{ $purchase->purchase_id }}
        </span>
      </div>
      <div>
        <span class="o-heading">
          Date
        </span>
        <br/>
        {{ $purchase->purchase_date }}
      </div>
      <div>
        <span class="o-heading">
          Vendor
        </span>
        <br/>
        @if ($purchase->vendor)
          {{ $purchase->vendor->name }}
        @else
          <span class="text-muted">
            Unknown
          </span>
        @endif
      </div>
      <div class="col-md-3 mb-3">
        <div class="o-heading">
          Created by
        </div>
        <div>
          @if ($purchase->creator)
            {{ $purchase->creator->name }}
          @else
            Unknown
          @endif
        </div>
      </div>
      <div>
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
        <div>
          <span class="btn p-0 text-primary" wire:click="enterMode('showPayments')">
            Show payments
          </span>
        </div>

        @if ($modes['showPayments'])
          <div>
            <div>
              Payments
            </div>
            <div>
              @foreach ($purchase->purchasePayments as $purchasePayment)
                <div>
                  {{ config('app.transaction_currency') }}
                  @php echo number_format( $purchasePayment->amount, 2 ); @endphp
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

      <div>
        <div class="mb-3 p-2 bg-danger text-white text-center">
          PURCHASE
        </div>
      </div>
    </div>

    <div>
      {{-- Items List --}}
      {{-- Show in bigger screens --}}
      <div class="table-responsive border bg-white mb-0 d-none d-md-block">
        <table class="table table-sm table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr>
              <th class="o-heading">Item</th>
              <th class="o-heading">Qty</th>
              <th class="o-heading">Unit</th>
              <th class="o-heading">Price per unit</th>
              <th class="o-heading">Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($purchase->purchaseItems as $purchaseItem)
              <tr>
                <td>
                  {{ $purchaseItem->product->name }}
                </td>
                <td>
                  {{ $purchaseItem->quantity }}
                </td>
                <td>
                  {{ $purchaseItem->unit }}
                </td>
                <td>
                  {{ config('app.transaction_currency') }}
                  {{ $purchaseItem->purchase_price_per_unit }}
                </td>
                <td>
                  {{ config('app.transaction_currency') }}
                  @php echo number_format( $purchaseItem->getTotalAmount(), 2 ); @endphp
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot class="mt-4">
            <tr>
             <td colspan="4" class="o-heading text-right pr-3">
                Subtotal
              </td>
              <td class="o-heading">
                {{ config('app.transaction_currency') }}
                @php echo number_format( $purchase->getSubTotal(), 2 ); @endphp
              </td>
            </tr>
            @foreach ($purchase->purchaseAdditions as $purchaseAddition)
              <tr class="border-0 mb-0 p-0">
                <td colspan="4" class="font-weight-bold text-right pr-3 border-0">
                  {{ $purchaseAddition->purchaseAdditionHeading->name }}
                  @if (strtolower($purchaseAddition->purchaseAdditionHeading->name) == 'vat')
                  ( 13% )
                  @endif
                </td>
                <td
                    class="
                      @if ($purchaseAddition->purchaseAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0 p-0 pl-1 pt-2">
                  {{ config('app.transaction_currency') }}
                  @php echo number_format( $purchaseAddition->amount, 2 ); @endphp
                </td>
              </tr>
            @endforeach
            <tr class="border-0 bg-light text-dark p-0">
              <td colspan="4" class="o-heading text-right pr-3 border-0">
                Total
              </td>
              <td class="o-heading border-0">
                {{ config('app.transaction_currency') }}
                @php echo number_format( $purchase->getTotalAmount(), 2 ); @endphp
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

</div>
