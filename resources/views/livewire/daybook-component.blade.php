<x-box-list title="Daybook">
  <x-menu-bar-horizontal>
    <x-menu-item title="Previous" fa-class="fas fa-arrow-left" click-method="setPreviousDay" />
    <x-menu-item title="Next" fa-class="fas fa-arrow-right" click-method="setNextDay" />
    <span class="badge badge-pill mt-2">
      {{ $daybookDate }}
      &nbsp;
      &nbsp;
      |
      &nbsp;
      &nbsp;
      {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
    </span>
  </x-menu-bar-horizontal>

  @if ($saleInvoices != null && count($saleInvoices) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Cash</th>
            <th>Credit</th>
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
                <a href="" wire:click.prevent="$emit('displaySaleInvoice', {{ $saleInvoice->sale_invoice_id }})">
                {{ $saleInvoice->customer->name }}
                </a>
              </td>
              <td>
                {{ $saleInvoice->getTotalAmount() }}
              </td>
              <td>
                {{ $saleInvoice->getTotalAmount() }}
              </td>
              <td>
                0
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
        <tfoot>
          <tr>
            <td class="font-weight-bold" colspan="3">
              Total
            </td>
            <td class="font-weight-bold">
              {{ $totalAmount }}
            </td>
            <td class="font-weight-bold">
              {{ $totalCashAmount }}
            </td>
            <td class="font-weight-bold">
              {{ $totalCreditAmount }}
            </td>
            <td>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No sales.
    </div>
  @endif
</x-box-list>
