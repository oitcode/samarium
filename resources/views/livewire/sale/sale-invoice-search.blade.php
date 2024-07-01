<div>
  <div class="my-3">
    <input type="text" wire:model.defer="search_sale_invoice_id">
    <button class="btn btn-success" wire:click="search">
      Find
    </button>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr class="bg-success text-white">
          <th>
            Bill ID
          </th>
          <th>
            Date
          </th>
          <th>
            Customer
          </th>
          <th>
            Pendig
          </th>
          <th>
            Total
          </th>
        </tr>
      </thead>

      @if ($saleInvoice)
        <tbody>
          <tr>
            <td>
              {{ $saleInvoice->sale_invoice_id }}
            </td>
            <td>
              {{ $saleInvoice->sale_invoice_date }}
            </td>
            <td>
              @if ($saleInvoice->customer)
                {{ $saleInvoice->customer->name }}
              @else
                CASH
              @endif
            </td>
            <td>
              {{ $saleInvoice->getPendingAmount() }}
            </td>
            <td>
              {{ $saleInvoice->getTotalAmount() }}
            </td>
          </tr>
        </tbody>
      @endif
    </table>
  </div>
</div>
