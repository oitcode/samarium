<div>
  <div class="p-0" style="">
    <div class="bg-info-rm mb-4">
      <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
        Previous
      </button>

      <button class="btn btn-danger m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
        Next
      </button>

      <button wire:loading class="btn btn-danger-rm" style="height: 100px; width: 225px; font-size: 1.5rem;">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <span class="ml-3 text-secondary" style="font-size: 1rem;">
          Loading...
        </span>
      </button>


      <button class="btn btn-success mr-2 float-left" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="">
        <i class="fas fa-calendar mr-3"></i>
        {{ $daybookDate }}
      </button>

      <button class="btn btn-danger m-0 float-left" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="">
        <i class="fas fa-calendar mr-3"></i>
        {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
      </button>

      <div class="shadow-sm-rm float-right" style="width: 500px;">
        <div class="card">
          <div class="card-body p-0 bg-success text-white">
            <div class="p-4">
              <h2 class="font-weight-bold" style="font-size: 2rem;">
                <i class="fas fa-rupee-sign mr-3"></i>
                @php echo number_format( $totalSaleAmount ); @endphp
              </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>

    </div>

  @if (! $modes['displaySaleInvoice'])
    <div class="row">
      <div class="col-md-12">
        @if ( true {{--$saleInvoices != null && count($saleInvoices) > 0--}})
          <div class="table-responsive">
            <table class="table table-sm-rm table-bordered table-hover shadow-sm">
              <thead>
                <tr class="bg-success text-white" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
                  <th style="width: 100px;">Bill no</th>
                  <th style="width: 200px;">Date</th>
                  <th>Table</th>
                  <th>Customer</th>
                  <th>Payment Status</th>
                  <th>Pending Amount</th>
                  <th style="width: 200px;">Total</th>
                </tr>
              </thead>
              <tbody class="bg-white" style="font-size: 1.3rem;">
                @foreach ($saleInvoices as $saleInvoice)
                  <tr class="">
                    <td class="text-secondary-rm" style="font-size: 1rem;">
                      90{{ $saleInvoice->sale_invoice_id }}
                    </td>
                    <td style="font-size: 1rem;">
                      {{ $saleInvoice->sale_invoice_date }}
                    </td>
                    <td class="text-secondary">
                      <span class="badge badge-success" wire:click="displaySaleInvoice({{ $saleInvoice }})">
                        {{ $saleInvoice->seatTableBooking->seatTable->name }}
                      </span>
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
                      @if ( $saleInvoice->payment_status == 'paid')
                      <span class="badge badge-success">
                      Paid
                      </span>
                      @elseif ( $saleInvoice->payment_status == 'partially_paid')
                      <span class="badge badge-warning">
                      Partial
                      </span>
                      @else
                      <span class="badge badge-danger">
                        Pending
                      </span>
                      @endif
                    </td>
                    <td>
                      {{ $saleInvoice->getPendingAmount() }}
                    </td>
                    <td class="font-weight-bold">
                      @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr class="bg-success-rm text-white-rm" style="font-size: 1.5rem; {{--background-image: linear-gradient(to right, white, #abc);--}}">
                  <td class="font-weight-bold text-right" colspan="6">
                    Total
                  </td>
                  <td class="font-weight-bold">
                    @php echo number_format( $totalSaleAmount ); @endphp
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div>
            {{ $saleInvoices->links() }}
          </div>
        @else
          <div class="text-secondary py-3 px-3" style="font-size: 1.5rem;">
            No sales.
          </div>
        @endif
      </div>
      <div class="col-md-6">
      </div>
    </div>
  @else
    @livewire ('daybook-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
  @endif
</div>
