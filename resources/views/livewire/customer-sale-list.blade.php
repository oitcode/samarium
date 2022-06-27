<div>
  @if ($saleInvoices != null && count($saleInvoices) > 0)

    {{-- Show in bigger screens --}}
    <div class="table-responsive d-none d-md-block">
      <table class="table table-sm table-bordered table-hover">
        <thead>
          <tr class="text-secondary" style="font-size: 1.1rem;">
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
            <tr style="font-size: 1.1rem;">
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
                @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
              </td>
              <td>
                @php echo number_format( $saleInvoice->getPaidAmount() ); @endphp
              </td>
              <td>
                @php echo number_format( $saleInvoice->getPendingAmount() ); @endphp
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
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="$emit('displaySaleInvoice', {{ $saleInvoice }})">
                      <i class="fas fa-folder text-primary mr-2"></i>
                      View bill
                    </button>
                    <button class="dropdown-item" wire:click="$emit('receiveSaleInvoicePayment', {{ $saleInvoice->sale_invoice_id }})">
                      <i class="fas fa-money-check-alt text-primary mr-2"></i>
                      Receive payment
                    </button>
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-print text-primary mr-2"></i>
                      Print
                    </button>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- Show in smaller screens --}}
    <div class="table-responsive d-md-none border">
      <table class="table table-sm table-hover">
        <tbody>
          @foreach ($saleInvoices as $saleInvoice)
            <tr>
              <td>
                {{ $saleInvoice->sale_invoice_id }}
                <div>
                  {{ $saleInvoice->sale_invoice_date }}
                </div>
              </td>
              <td>
                <div class="font-weight-bold" style="font-size: 1rem;">
                  Rs
                  {{ $saleInvoice->getTotalAmount() }}
                </div>
                <div>
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
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="$emit('displaySaleInvoice', {{ $saleInvoice }})">
                      <i class="fas fa-folder text-primary mr-2"></i>
                      View bill
                    </button>
                    <button class="dropdown-item" wire:click="$emit('receiveSaleInvoicePayment', {{ $saleInvoice->sale_invoice_id }})">
                      <i class="fas fa-money-check-alt text-primary mr-2"></i>
                      Receive payment
                    </button>
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-print text-primary mr-2"></i>
                      Print
                    </button>
                  </div>
                </div>
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
