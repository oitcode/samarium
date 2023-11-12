<div class="p-3 p-md-0">


  <x-component-header>
    Daybook
  </x-component-header>

  <div class="p-0" style="">

    {{-- Show in bigger screens --}}
    @if (! $modes['displaySaleInvoice'])
    <div class="bg-info-rm mb-4 d-none d-md-block p-3 bg-white border">
      <div class="float-left d-flex bg-warning-rm">

        <i class="fas fa-arrow-alt-circle-left fa-2x mr-3" wire:click="setPreviousDay" role="button"></i>
        <i class="fas fa-arrow-alt-circle-right fa-2x mr-3" wire:click="setNextDay" role="button"></i>

        <div class="d-none d-md-block my-3-rm text-secondary-rm ml-5" style="font-size: 1rem;">
          <i class="fas fa-calendar mr-2"></i>
          {{ Carbon\Carbon::parse($daybookDate)->format('Y F d') }}
          &nbsp;&nbsp;
          {{ Carbon\Carbon::parse($daybookDate)->format('l') }}

          <input type="date" wire:model.defer="daybookDate" class="ml-5">
          <button class="btn {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}" wire:click="render">
            Go
          </button>
        </div>
      </div>

      <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </button>

      @if (! $modes['displaySaleInvoice'])
      <div class="shadow-sm-rm float-right" style="">
        <div class="card bg-white text-dark" style="">
          <div class="card-body p-2 bg-success-rm text-white-rm">
            <div class="p-0">
              <h2 class="font-weight-bold pt-1" style="font-size: 1.5rem;">
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

      @if (! $modes['displaySaleInvoice'])
        <div class="float-left mt-3-rm px-2 pt-2 ml-5">
          Bills: {{ $todaySaleInvoiceCount }}
        </div>
      @endif

      <div class="clearfix">
      </div>

    </div>
    @endif


    {{-- Show in smaller screens --}}
    <div class="bg-info-rm mb-4 d-md-none">
      <button class="btn btn-success-rm m-0" style="font-size: 1.5rem;" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
      </button>

      <button class="btn btn-danger-rm m-0" style="font-size: 1.5rem;" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
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

      @if (! $modes['displaySaleInvoice'])
      <div class="shadow-sm-rm">
        <div class="card">
          <div class="card-body p-0 bg-success text-white">
            <div class="p-4">
              <h2 class="font-weight-bold" style="font-size: 2rem;">
                Rs
                @php echo number_format( $totalSaleAmount ); @endphp
              </h2>
            </div>
          </div>
        </div>
      </div>
      @endif

    </div>


  @if ($modes['displaySaleInvoice'])
    @if (true)
      @if (false)
      {{-- Toolbar --}}
      <div class="d-flex justify-content-between mb-4 border p-1 bg-white-rm text-white-rm shadow-sm" style="background-color: #fff;">
        <div>
          <a href="{{ route('dashboard-print-sale-invoice', $displayingSaleInvoice->sale_invoice_id) }}"
              target="_blank"
              class="btn text-secondary">
            <i class="fas fa-print fa-2x-rm"></i>
            <br />
            Print
          </a>
          <button class="btn text-secondary">
            <i class="fas fa-file-pdf-o fa-2x-rm"></i>
            <br />
            PDF
          </button>
          <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
            <div class="spinner-border text-info mr-3" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </button>
        </div>
      </div>
      @endif
      @livewire ('daybook-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
    @else
      @livewire ('core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
    @endif
  @else
    <div class="row">
      <div class="col-md-12">
        @if ( true {{--$saleInvoices != null && count($saleInvoices) > 0--}})

          {{-- Show in bigger screens --}}
          <div class="table-responsive d-none d-md-block mb-5">
            <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border mb-0">
              <thead>
                <tr class="bg-white" style="font-size: 1rem;">
                  <th style="width: 100px;">ID</th>
                  <th class="d-none d-md-table-cell" style="width: 200px;">Time</th>
                  <th class="d-none d-md-table-cell" style="width: 200px;">Table</th>
                  <th class="d-none d-md-table-cell" style="width: 500px;">Customer</th>
                  <th class="border-rm" style="width: 200px;">
                    <span class="d-none d-md-inline">
                      Payment
                    </span>
                    Status
                  </th>
                  <th class="border-rm d-none d-md-table-cell" style="width: 200px;">Pending Amount</th>
                  <th style="width: 200px;">Total</th>
                </tr>
              </thead>

              <tbody class="bg-white" style="font-size: calc(0.7rem + 0.3vw);">
                @if (count($saleInvoices) > 0)
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
                      <td class="d-none d-md-table-cell">
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
                          <i class="fas fa-user-circle text-muted mr-2"></i>
                          {{ $saleInvoice->customer->name }}
                        @else
                          <i class="fas fa-exclamation-circle text-warning mr-3"></i>
                          <span class="text-secondary" style="font-size: 1rem;">
                            Unknown
                          </span>
                        @endif
                      </td>
                      <td class="border-rm">
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
                      <td class="border-rm d-none d-md-table-cell">
                        @php echo number_format( $saleInvoice->getPendingAmount() ); @endphp
                      </td>
                      <td class="font-weight-bold">
                        @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                      </td>
                    </tr>
                  @endforeach
                @else
                  {{-- Todo --}} 
                @endif
              </tbody>
            </table>
          </div>

          {{-- Show in smaller screens --}}
          <div class="table-responsive d-md-none bg-white border">
            <table class="table">
              <tbody>
                @foreach ($saleInvoices as $saleInvoice)
                  <tr class="" role="button" wire:click="displaySaleInvoice({{ $saleInvoice }})">
                    <td class="text-secondary-rm"
                        style="font-size: 1rem;"
                        wire:click=""
                        role="button">
                      <span class="text-primary">
                      {{ $saleInvoice->sale_invoice_id }}
                      </span>
                      <div>
                        @if ($saleInvoice->seatTableBooking)
                        {{ $saleInvoice->seatTableBooking->seatTable->name }}
                        @else
                          Takeaway
                        @endif
                      </div>
                      <div>
                        {{ $saleInvoice->created_at->format('H:i A') }}
                      </div>
                    </td>
                    <td>
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

                      <div>
                        @if ($saleInvoice->customer)
                          <i class="fas fa-circle text-success mr-3"></i>
                          {{ $saleInvoice->customer->name }}
                        @endif
                      </div>
                    </td>
                    <td class="border d-none d-md-table-cell">
                      {{ $saleInvoice->getPendingAmount() }}
                    </td>
                    <td class="font-weight-bold" style="font-size: 1rem;">
                      Rs
                      @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          {{-- Nav links for pagination -- TODO -- --}}
          <div>
            {{ $saleInvoices->links() }}
          </div>

        @else
          <div class="text-secondary py-3 px-3" style="font-size: 1.5rem;">
            No sales.
          </div>
        @endif
        
        {{-- Payment by types --}}
        <div class="mt-4 border">
          <h2 class="h5 font-weight-bold bg-white p-3 mb-0 border">
            Payment by types
          </h2>
          <div class="row border-rm m-0 p-3 bg-white text-dark d-flex">

            @foreach ($paymentByType as $key => $val)
              <div class="mb-4 mr-5">
                    <h2 class="text-muted-rm mb-3 font-weight-bold h6">
                      {{ $key }}
                    </h2>
                    <h3 class="text-dark-rm font-weight-bold h5">
                      Rs
                      @php echo number_format( $val ); @endphp
                    </h3>
              </div>
            @endforeach

            {{-- Pending Amount --}}
            <div class="">
              <h2 class="text-muted mb-3 font-weight-bold h6">
                Pending
              </h2>
              <h3 class="text-danger font-weight-bold h5">
                Rs
                @php echo number_format( $netPendingAmount ); @endphp
              </h3>
            </div>

          </div>
        </div>

      </div>

      {{-- Daybook item count div --}}
      <div class="col-md-6 mt-5">
        <h2 class="h5 font-weight-bold text-muted-rm mb-3">
          Product sale count
        </h2>
        @if (count($todayItems) > 0)
          <div class="table-responsive">
            <table class="table table-bordered-rm table-hover" style="font-size: 1rem;">
              <thead>
                <tr class="bg-white">
                  <th colspan="2">
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
                    <td style="width: 50px;">
                      <img src="{{ asset('storage/' . $item['product']->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                    </td>
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
        @else
          <div class="text-muted">
            <i class="fas fa-exclamation-circle mr-3"></i>
            No sales
          </div>
        @endif
      </div>
    </div>
  @endif


  {{-- Purchase --}}
  <div class="my-5">
    <h2 class="h5 font-weight-bold">Purchase</h2>
    @include ('partials.dashboard.daybook-purchase')
  </div>

  {{-- Expense --}}
  <div class="my-5">
    <h2 class="h5 font-weight-bold">Expense</h2>
    @include ('partials.dashboard.daybook-expense')
  </div>


</div>
