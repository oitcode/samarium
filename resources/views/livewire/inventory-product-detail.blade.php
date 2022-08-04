<div>
  <h1 class="h5">
    {{ $product->name }}
  </h1>

  <div class="d-flex py-2 mb-3 border-top border-bottom  bg-white">
    <div class="mr-3">
      Inventory Unit:
      {{ $product->inventory_unit }}
    </div>
  </div>

  <div class="mt-2-rm mb-3 text-secondary py-3-rm d-flex bg-warning-rm" style="font-size: 1rem;">

    <div>
      <input type="date" wire:model.defer="startDate" class="mr-3" />
      <input type="date" wire:model.defer="endDate" class="mr-3" />

      <button class="btn btn-success mr-3" wire:click="getTransactionsForDateRange">
        Go
      </button>
    </div>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
  </div>

  <div>
    <div class="d-flex bg-success-rm text-white-rm p-2 mb-3">
      <div class="bg-success mr-3" style="font-size: 2rem;">
        &nbsp;
      </div>
      <div class="d-flex flex-column justify-content-center">
        <h2 class="h5 font-weight-bold">
          Opening stock:
          {{ $startingBalance }}
          {{ $product->inventory_unit }}
        </h2>
      </div>
    </div>

    @php
      $balance = $startingBalance;
    @endphp

    <h2 class="h5">
      Purchases
    </h2>
    @if (count($purchaseItems) > 0)
    <div class="table-responsive border mb-3 bg-white">
      <table class="table mb-0">
        <thead>
          <tr>
            <th>Date</th>
            <th>Purchase ID</th>
            <th>Item</th>
            <th>Qty</th>
            @if ($product->subProducts)
              <th>Units</th>
            @endif
          </tr>
        </thead>

        <tbody>
          {{-- First show all the purchases --}}
            @foreach ($purchaseItems as $purchaseItem)
              @php
                $balance += $purchaseItem->quantity * $purchaseItem->product->inventory_unit_consumption;
              @endphp

              <tr>
                <td>
                  {{ $purchaseItem->purchase->purchase_date }}
                </td>
                <td>
                  {{ $purchaseItem->purchase->purchase_id }}
                </td>
                <td>
                  {{ $purchaseItem->product->name }}
                </td>
                <td>
                  {{ $purchaseItem->quantity }}
                </td>
                @if ($product->subProducts)
                  <td>
                    {{ $purchaseItem->quantity * $purchaseItem->product->inventory_unit_consumption }}
                    {{ $purchaseItem->product->inventory_unit }}
                  </td>
                @endif
              </tr>

            @endforeach
        </tbody>
      </table>
    </div>
    @else
      <div class="my-3 text-muted">
        <i class="fas fa-exclamation-circle mr-3"></i>
        No purchases
      </div>
    @endif

    <h2 class="h5">
      Sales
    </h2>
    @if (count($saleInvoiceItems) > 0)
      <div class="table-responsive border mb-3 bg-white">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>Date</th>
              <th>Sale Invoice ID</th>
              <th>Item</th>
              <th>Qty</th>
              @if ($product->subProducts)
                <th>Units</th>
              @endif
            </tr>
          </thead>

          <tbody>
            {{-- Next show all the sales --}}
            @if (count($saleInvoiceItems) > 0)
              @foreach ($saleInvoiceItems as $saleInvoiceItem)
                @php
                  $balance -= $saleInvoiceItem->quantity * $saleInvoiceItem->product->inventory_unit_consumption;
                @endphp

                <tr>
                  <td>
                    {{ $saleInvoiceItem->saleInvoice->sale_invoice_date }}
                  </td>
                  <td>
                    {{ $saleInvoiceItem->saleInvoice->sale_invoice_id }}
                  </td>
                  <td>
                    {{ $saleInvoiceItem->product->name }}
                  </td>
                  <td>
                    {{ $saleInvoiceItem->quantity }}
                  </td>
                  @if ($product->subProducts)
                    <td>
                      {{ $saleInvoiceItem->quantity * $saleInvoiceItem->product->inventory_unit_consumption }}
                      {{ $saleInvoiceItem->product->inventory_unit }}
                    </td>
                  @endif
                </tr>

              @endforeach
            @endif
          </tbody>
        </table>

      </div>
    @else
      <div class="my-3 text-muted">
        <i class="fas fa-exclamation-circle mr-3"></i>
        No sales
      </div>
    @endif
    <div class="d-flex bg-success-rm text-white-rm p-2 mb-3">
      <div class="bg-success mr-3" style="font-size: 2rem;">
        &nbsp;
      </div>
      <div class="d-flex flex-column justify-content-center">
        <h2 class="h5 font-weight-bold">
          Closing stock:
          {{ $balance }}
          {{ $product->inventory_unit }}
        </h2>
      </div>
    </div>
  </div>

</div>
