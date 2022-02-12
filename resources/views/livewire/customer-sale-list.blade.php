<x-box-list title="Sale list">
  @if ($saleInvoices != null && count($saleInvoices) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Paid</th>
            <th>Pending</th>
            <th>Payment status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($saleInvoices as $saleInvoice)
            <tr>
              <td>
                {{ $saleInvoice->sale_invoice_id }}
              </td>
              <td>
                {{ $saleInvoice->sale_invoice_date }}
              </td>
              <td>
                <a href="" wire:click.prevent="">
                {{ $saleInvoice->customer->name }}
                </a>
              </td>
              <td>
                {{ $saleInvoice->getTotalAmount() }}
              </td>
              <td>
                {{ $saleInvoice->getPaidAmount() }}
              </td>
              <td>
                {{ $saleInvoice->getPendingAmount() }}
              </td>
              <td>
                @if (strtolower($saleInvoice->payment_status) === 'pending')
                  <span class="badge badge-danger badge-pill">
                    Pending
                  </span>
                @elseif (strtolower($saleInvoice->payment_status) === 'partially_paid')
                  <span class="badge badge-warning badge-pill">
                    Partially Paid
                  </span>
                @elseif (strtolower($saleInvoice->payment_status) === 'paid')
                  <span class="badge badge-success badge-pill">
                    {{ $saleInvoice->payment_status }}
                  </span>
                @endif
              </td>
              <td>
                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-pencil-alt text-info"></i>
                </span>

                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No sales.
    </div>
  @endif
</x-box-list>
