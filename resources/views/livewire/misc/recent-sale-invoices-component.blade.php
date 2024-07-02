<div class="bg-white">
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>
            Invoice ID
          </th>
          <th>
            Customer
          </th>
          <th>
            Amount
          </th>
        </tr>
      </thead>

      <tbody>
        @foreach ($saleInvoices as $saleInvoice)
          <tr>
            <td>
              90{{ $saleInvoice->sale_invoice_id }}
            </td>
            <td>
              @if ($saleInvoice->customer)
              {{ $saleInvoice->customer->name }}
              @else
                <span class="text-secondary">
                  CASH
                </span>
              @endif
            </td>
            <td>
              Rs.
              {{ $saleInvoice->getTotalAmount() }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
