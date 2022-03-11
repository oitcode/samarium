<div>
  @if ($saleInvoices != null && count($saleInvoices) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-bordered table-hover">
        <thead>
          <tr class="bg-success text-white" style="font-size: 1.3rem;">
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
            <tr style="font-size: 1.3rem;">
              <td>
                {{ $saleInvoice->sale_invoice_id }}
              </td>
              <td class="text-secondary" style="font-size: 1rem;">
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
                @if ($saleInvoice->getPendingAmount() > 0)
                <button class="btn btn-danger mr-3" wire:click="$emit('receiveSaleInvoicePayment', {{ $saleInvoice->sale_invoice_id }})">
                  Receive payment
                </button>
                @endif
                <button class="btn btn-primary mr-3" wire:click="$emit('receiveSaleInvoicePayment', {{ $saleInvoice->sale_invoice_id }})">
                  Print
                </button>
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
</div>
