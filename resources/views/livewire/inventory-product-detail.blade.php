<div>
  <h1 class="h5">
    {{ $product->name }}
  </h1>

  <div class="d-flex py-2 mb-3 border-top border-bottom  bg-white">
    <div class="mr-3">
      Inventory Unit:
      {{ $product->inventory_unit }}
    </div>
    <div>
      Stock count:
      {{ $product->stock_count }}
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
    <h2 class="h6">
      Starting balance:
      @if ($product->opening_stock_count)
        {{ $product->opening_stock_count }}
      @else
        xx
      @endif
    </h2>

    @php
      $balance = $product->opening_stock_count;
    @endphp
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Date</th>
            <th>ID</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Direction</th>
            <th>Balance</th>
          </tr>
        </thead>

        <tbody>
          @if (count($saleInvoiceItems) > 0)
            @foreach ($saleInvoiceItems as $saleInvoiceItem)
              @php
                $balance -= $saleInvoiceItem->quantity;
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
                <td>
                  Out
                </td>
                <td>
                  {{ $balance }}
                </td>
              </tr>

            @endforeach
          @endif
        </tbody>
      </table>

    </div>
  </div>

</div>
