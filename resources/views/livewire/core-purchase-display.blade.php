<div class="bg-white shadow-rm">

  {{-- Top tool bar --}}
  <div class="d-flex justify-content-between mb-4 border p-1 bg-white-rm text-white-rm shadow-sm" style="background-color: #fff;">
    <div>
      <a href=""
          target="_blank"
          class="btn text-secondary">
        <i class="fas fa-print fa-2x-rm"></i>
        <br />
        Print
      </a>
      <button class="btn text-secondary">
        <i class="fas fa-file-pdf-o fa-2x-rm"></i>
        <br />
        PDF
      </button>
      <button class="btn text-secondary">
        <i class="fas fa-file-excel-o fa-2x-rm"></i>
        <br />
        Excel
      </button>
    </div>
    <div class="">
      <button class="btn text-dark" wire:click="$emit('exitPurchaseDisplay')">
        <i class="fas fa-times-circle fa-2x"></i>
        <br />
        Close
      </button>
    </div>
  </div>

  <div class="bg-warning" style="font-size: 0.2rem;">
  &nbsp;
  </div>

  <div class="border p-0">
    @if (false)
    <div class="d-flex mb-0 p-2 justify-content-end bg-success text-white border">
      <button class="btn btn-light border rounded-circle" wire:click="$emit('exitSaleInvoiceDisplayMode')">
        <i class="fas fa-times fa-2x-rm"></i>
      </button>
    </div>
    @endif

    {{-- Company Info --}}
    <div class="d-flex justify-content-between p-3 border-bottom bg-success-rm text-white-rm">

      <div class="">
        <div class="mb-1">
          <div class="h6 text-muted-rm mb-1" style="font-size: 0.8rem;">
            <span class="text-muted" style="font-size: 0.8rem">
              Purchase ID:
            </span>
            <span style="font-size: 0.8rem;">
              {{ $purchase->purchase_id }}
            </span>
          </div>
        </div>

        <div class="mb-1">
          <div class="text-muted-rm mb-1" style="font-size: 0.8rem;">
            <span class="text-muted" style="font-size: 0.8rem">
              Date:
            </span>
            <span style="font-size: 0.8rem">
              {{ $purchase->purchase_date }}
            </span>
          </div>
        </div>
      </div>

        <div class="">
          <span class="text-muted" style="font-size: 0.8rem;">
          Vendor
          </span>
          <br/>
          @if ($purchase->vendor)
            {{ $purchase->vendor->name }}
          @else
            <span class="text-muted" style="font-size: 0.6rem;">
              Unknown
            </span>
          @endif
        </div>

        <div class="col-md-3 mb-3">
          <div class="text-muted-rm mb-1">
            Created by
          </div>
          <div class="h5" style="font-size: 0.7rem;">
            @if ($purchase->creator)
              {{ $purchase->creator->name }}
            @else
              Unknown
            @endif
          </div>
        </div>

      <div>
        <div class="text-muted-rm" style="font-size: calc(0.6rem + 0.2vw);">
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
          <span class="btn p-0 text-primary" style="font-size: 0.8rem;" wire:click="enterMode('showPayments')">
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

      <div class="">
        @if (true)
        <div class="mb-3 p-2 bg-danger text-white text-center">
          PURCHASE
        </div>
        @endif
      </div>
    </div>

    {{-- Vendor Info --}}
    @if ($purchase->vendor)
      <div class="p-3">
        Vendor
        <br>
        {{ $purchase->vendor->name }}
      </div>
    @endif

    {{-- Main Info --}}
    <div class="shadow-rm">

      {{-- Items List --}}
      {{-- Show in bigger screens --}}
      <div class="table-responsive border bg-white mb-0 d-none d-md-block">
        <table class="table table-sm table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
              <th>Item</th>
              <th>Qty</th>
              <th>Unit</th>
              <th>Price per unit</th>
              <th>Amount</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($purchase->purchaseItems as $purchaseItem)
              <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
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
                  {{ $purchaseItem->purchase_price_per_unit }}
                </td>
                <td>
                  @php echo number_format( $purchaseItem->getTotalAmount() ); @endphp
                </td>
              </tr>
            @endforeach
          </tbody>

          <tfoot class="bg-success-rm text-white-rm mt-4">
            <tr class="bg-primary-rm">
             <td colspan="4" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right pr-3">
                <strong>
                Subtotal
                </strong>
              </td>
              <td style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold">
                @php echo number_format( $purchase->getSubTotal() ); @endphp
              </td>
            </tr>
            @foreach ($purchase->purchaseAdditions as $purchaseAddition)
              <tr class="border-0 mb-0 p-0">
                <td colspan="4" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right pr-3 border-0">
                  {{ $purchaseAddition->purchaseAdditionHeading->name }}
                  @if (strtolower($purchaseAddition->purchaseAdditionHeading->name) == 'vat')
                  ( 13% )
                  @endif
                </td>
                <td style="font-size: calc(0.6rem + 0.2vw);"
                    class="
                      @if ($purchaseAddition->purchaseAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0 p-0 pl-1 pt-2">
                  @if (false)
                  NRs
                  &nbsp;&nbsp;
                  @endif
                  @php echo number_format( $purchaseAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            <tr class="border-0 bg-light text-dark p-0">
                <td colspan="4" style="font-size: calc(1rem + 0.2vw);" class="font-weight-bold text-right pr-3 border-0">
                Total
              </td>
              <td style="font-size: calc(1rem + 0.2vw);" class="font-weight-bold border-0">
                @php echo number_format( $purchase->getTotalAmount() ); @endphp
              </td>
            </tr>
          </tfoot>

        </table>
      </div>

    </div>

  </div>
</div>
