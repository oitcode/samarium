<div class="p-3 p-md-0">
  <div class="p-0" style="">

    {{-- Show in bigger screens --}}
    <div class="bg-info-rm mb-4 d-none d-md-block">
      <button class="btn btn-success-rm m-0 border shadow-sm bg-white" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
        Previous
      </button>

      <button class="btn btn-danger-rm m-0 border shadow-sm bg-white" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
        Next
      </button>

      <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </button>



      @if (! $modes['displaySaleInvoice'])
      <div class="shadow-sm-rm float-right" style="width: 500px;">
        <div class="card">
          <div class="card-body p-0 bg-success-rm text-white-rm">
            <div class="p-4">
              <h2 class="font-weight-bold" style="font-size: 2rem;">
                <span class="mr-2">
                  Rs
                </span>
                @php echo number_format( $totalSaleAmount ); @endphp
              </h2>
            </div>
          </div>
        </div>
      </div>
      @endif

      <div class="clearfix">
      </div>

    </div>

    <div class="d-none d-md-block my-3 text-secondary" style="font-size: 1.3rem;">
      <i class="fas fa-calendar mr-2"></i>
      {{ Carbon\Carbon::parse($daybookDate)->format('Y F d') }}
      &nbsp;&nbsp;
      {{ Carbon\Carbon::parse($daybookDate)->format('l') }}

      <input type="date" wire:model.defer="daybookDate" class="ml-5">
      <button class="btn btn-success" wire:click="render">
        Go
      </button>
    </div>


    {{-- Show in smaller screens --}}
    <div class="bg-info-rm mb-4 d-md-none">
      <button class="btn btn-success-rm m-0" style="font-size: 1.5rem;" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
        @if (false)
        Previous
        @endif
      </button>

      <button class="btn btn-danger-rm m-0" style="font-size: 1.5rem;" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
        @if (false)
        Next
        @endif
      </button>

      <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <span class="ml-3 text-secondary" style="font-size: 1rem;">
          Loading...
        </span>
      </button>


      <div class="py-2 px-2" style="font-size: 1.1rem;">
        <i class="fas fa-calendar mr-3"></i>
        <span class="mr-3">
          {{ $daybookDate }}
        </span>
        {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
      </div>

      <div class="shadow-sm-rm" style="width: 500px;">
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

    </div>

    <div class="my-3 px-2">
      Bills: {{ $todaySaleInvoiceCount }}
    </div>

  @if (! $modes['displaySaleInvoice'])
    <div class="row">
      <div class="col-md-12">
        @if ( true {{--$saleInvoices != null && count($saleInvoices) > 0--}})
          <div class="table-responsive mb-0">
            <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border mb-0">
              <thead>
                <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
                  <th style="width: 100px;">Bill no</th>
                  <th class="d-none d-md-table-cell" style="width: 200px;">Time</th>
                  <th class="d-none d-md-table-cell" style="width: 200px;">Table</th>
                  <th class="d-none d-md-table-cell">Customer</th>
                  <th class="border" style="width: 200px;">
                    <span class="d-none d-md-inline">
                      Payment
                    </span>
                    Status
                  </th>
                  <th class="border d-none d-md-table-cell" style="width: 200px;">Pending Amount</th>
                  <th style="width: 200px;">Total</th>
                </tr>
              </thead>
              <tbody class="bg-white" style="font-size: 1.3rem;">
                @foreach ($saleInvoices as $saleInvoice)
                  <tr class="" role="button" wire:click="displaySaleInvoice({{ $saleInvoice }})">
                    <td class="text-secondary-rm"
                        style="font-size: 1rem;"
                        wire:click=""
                        role="button">
                      <span class="text-primary">
                      {{ $saleInvoice->sale_invoice_id }}
                      </span>
                    </td>
                    <td class="d-none d-md-table-cell" style="font-size: 1rem;">
                      @if (false)
                      <div>
                        {{ $saleInvoice->sale_invoice_date }}
                      </div>
                      @endif
                      <div>
                        {{ $saleInvoice->created_at->format('H:i A') }}
                      </div>
                    </td>
                    <td class="d-none d-md-table-cell">
                      @if ($saleInvoice->seatTableBooking)
                      {{ $saleInvoice->seatTableBooking->seatTable->name }}
                      @else
                        Takeaway
                      @endif
                    </td>
                    <td class="d-none d-md-table-cell">
                      @if ($saleInvoice->customer)
                        <i class="fas fa-circle text-success mr-3"></i>
                        {{ $saleInvoice->customer->name }}
                      @else
                        <i class="fas fa-exclamation-circle text-warning mr-3"></i>
                        <span class="text-secondary" style="font-size: 1rem;">
                          Unknown
                        </span>
                      @endif
                    </td>
                    <td class="border">
                      @if ( $saleInvoice->payment_status == 'paid')
                      <span class="badge badge-pill badge-success">
                      Paid
                      </span>
                      @elseif ( $saleInvoice->payment_status == 'partially_paid')
                      <span class="badge badge-pill badge-warning">
                      Partial
                      </span>
                      @elseif ( $saleInvoice->payment_status == 'pending')
                      <span class="badge badge-pill badge-danger">
                        Pending
                      </span>
                      @else
                      <span class="badge badge-pill badge-secondary">
                        {{ $saleInvoice->payment_status }}
                      </span>
                      @endif

                      @foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment)
                      <span class="badge badge-pill ml-3">
                        {{ $saleInvoicePayment->saleInvoicePaymentType->name }}
                      </span>
                      @endforeach
                    </td>
                    <td class="border d-none d-md-table-cell">
                      {{ $saleInvoice->getPendingAmount() }}
                    </td>
                    <td class="font-weight-bold">
                      @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                    </td>
                  </tr>
                @endforeach
              </tbody>
              @if (false)
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
              @endif
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
        
        <div class="row mt-0 border m-0 pt-3 bg-white text-success">
          @foreach ($paymentByType as $key => $val)
            <div class="col-md-2 mb-4">
                  <h2 class="text-muted mb-3 font-weight-bold h5">
                    {{ $key }}
                  </h2>
                  <h3 class="text-dark font-weight-bold h4">
                    Rs
                    @php echo number_format( $val ); @endphp
                  </h3>
            </div>
          @endforeach

          {{-- Pending Amount --}}
          <div class="col-md-2">
                <h2 class="text-muted mb-3 font-weight-bold h5">
                  Pending
                </h2>
                <h3 class="text-danger font-weight-bold h4">
                  Rs
                  @php echo number_format( $netPendingAmount ); @endphp
                </h3>
          </div>

        </div>
      </div>

      {{-- Daybook item count div --}}
      <div class="col-md-6">
        @if (count($todayItems) > 0)
          <div class="table-responsive">
            <table class="table table-bordered table-hover" style="font-size: 1.3rem;">
              <thead>
                <tr class="bg-success-rm text-white-rm">
                  <th>
                    Item
                  </th>
                  <th>
                    Quantity
                  </th>
                </tr>
              </thead>

              <tbody class="bg-white">
                  @foreach ($todayItems as $item)
                    <tr>
                      <td>
                        {{ $item['product']->name }}
                      </td>
                      <td>
                        {{ $item['quantity'] }}
                      </td>
                    <tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
    </div>
  @else
    @livewire ('daybook-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
  @endif
</div>
