<div class="p-3 p-md-0">

  {{--
     |
     | Top toolbar
     |
  --}}

  <x-toolbar-classic toolbarTitle="Daybook">
    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>

  <div class="p-0">
    {{-- Show in bigger screens --}}
    @if (! $modes['displaySaleInvoice'])
      <div class="mb-3 d-none d-md-block p-3 bg-white border">
        <div class="d-flex">
          <div class="d-flex">
            <i class="fas fa-arrow-alt-circle-left fa-2x mr-3" wire:click="setPreviousDay" role="button"></i>
            <i class="fas fa-arrow-alt-circle-right fa-2x mr-3" wire:click="setNextDay" role="button"></i>
            <div class="d-none d-md-block ml-5">
              <i class="fas fa-calendar mr-2"></i>
              {{ Carbon\Carbon::parse($daybookDate)->format('Y F d') }}
              &nbsp;&nbsp;
              {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
              <input type="date" wire:model="daybookDate" class="ml-5">
              <button class="btn btn-success mx-3" wire:click="render">
                View
              </button>
            </div>
          </div>

          @include ('partials.dashboard.spinner-button')
        </div>
      </div>
    @endif

    {{-- Show in smaller screens --}}
    <div class="mb-4 d-md-none">
      <button class="btn m-0" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
      </button>
      <button class="btn m-0" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
      </button>
      <input type="date" wire:model="daybookDate" class="ml-3">
      <button class="btn {{ config('app.oc_ascent_btn_color') }} mx-3" wire:click="render">
        Go
      </button>
      <button wire:loading class="btn">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <span class="ml-3 text-secondary">
          Loading...
        </span>
      </button>

      <div class="py-2 px-2">
        <i class="fas fa-calendar mr-3"></i>
        <span class="mr-3">
          {{ $daybookDate }}
        </span>
        {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
      </div>

      @if (! $modes['displaySaleInvoice'])
        <div class="my-4">
          <div class="table-responsive bg-white">
            <table class="table">
              <tbody>
                <tr>
                  <th>Sale</th>
                  <td>
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $totalSaleAmount ); @endphp
                  </td>
                </tr>
                <tr>
                  <th>Purchase</th>
                  <td>
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $totalPurchaseAmount ); @endphp
                  </td>
                </tr>
                <tr>
                  <th>Expense</th>
                  <td>
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $totalExpenseAmount ); @endphp
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      @endif
    </div>

  <div class="row">
    <div class="col-md-6">
      @if ($modes['displaySaleInvoice'])
        @livewire ('core.dashboard.core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice, 'exitDispatchEvent' => 'exitDisplaySaleInvoiceMode',])
      @else
        <div class="bg-white border p-2">
        <h2 class="h5 o-heading py-3 px-1">Sale</h2>
        <div class="my-3 px-2 py-3 border">
          <div class="d-flex">
            <div class="mr-3 font-weight-bold">
              Total:
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $totalSaleAmount ); @endphp
            </div>
            <div class="font-weight-bold">
              Bills: {{ $todaySaleInvoiceCount }}
            </div>
          </div>
        </div>

        <div>
          <div>
            @if ( true {{--$saleInvoices != null && count($saleInvoices) > 0--}})
              {{-- Show in bigger screens --}}
              <div class="table-responsive d-none d-md-block mb-3">
                <table class="table shadow-sm border mb-0">
                  <thead>
                    <tr>
                      <th class="o-heading" style="width: 100px;">ID</th>
                      <th class="o-heading" class="d-none d-md-table-cell" style="width: 200px;">Time</th>
                      <th class="o-heading" class="d-none d-md-table-cell" style="width: 200px;">Table</th>
                      <th class="o-heading" class="d-none d-md-table-cell" style="width: 500px;">Customer</th>
                      <th class="o-heading" style="width: 200px;">
                        <span class="d-none d-md-inline">
                          Payment
                        </span>
                        Status
                      </th>
                      <th class="o-heading d-none d-md-table-cell" style="width: 200px;">Pending Amount</th>
                      <th class="o-heading" style="width: 200px;">Total</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @if (count($saleInvoices) > 0)
                      @foreach ($saleInvoices as $saleInvoice)
                        <tr role="button" wire:click="displaySaleInvoice({{ $saleInvoice }})">
                          <td wire:click="" role="button">
                            <span>
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
                              <i class="fas fa-user-circle mr-2"></i>
                              {{ $saleInvoice->customer->name }}
                            @else
                              <i class="fas fa-exclamation-circle mr-1"></i>
                              <span>
                                Unknown
                              </span>
                            @endif
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
                          </td>
                          <td class="d-none d-md-table-cell">
                            {{ config('app.transaction_currency_symbol') }}
                            @php echo number_format( $saleInvoice->getPendingAmount() ); @endphp
                          </td>
                          <td class="font-weight-bold">
                            {{ config('app.transaction_currency_symbol') }}
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
              <div class="table-responsive d-md-none bg-white border mb-3">
                <table class="table">
                  <tbody>
                    @foreach ($saleInvoices as $saleInvoice)
                      <tr role="button" wire:click="displaySaleInvoice({{ $saleInvoice }})">
                        <td wire:click="" role="button">
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
                        <td class="font-weight-bold">
                          {{ config('app.transaction_currency_symbol') }}
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
              <div class="py-3 px-3">
                No sales.
              </div>
            @endif
            
            {{-- Payment by types --}}
            <div class="border mb-3">
              <h2 class="h6 o-heading p-3 mb-0 border">
                Payment by types
              </h2>
              <div class="row m-0 p-3 d-flex">
                @foreach ($paymentByType as $key => $val)
                  <div class="mb-4 mr-5">
                    <h2 class="h6 mb-3 o-heading">
                      {{ $key }}
                    </h2>
                    <h2 class="h6">
                      {{ config('app.transaction_currency_symbol') }}
                      @php echo number_format( $val ); @endphp
                    </h2>
                  </div>
                @endforeach

                {{-- Pending Amount --}}
                <div>
                  <h2 class="h6 mb-3 o-heading">
                    Pending
                  </h2>
                  <h2 class="h6 text-danger">
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $netPendingAmount ); @endphp
                  </h2>
                </div>
              </div>
            </div>
          </div>

          {{-- Daybook item count div --}}
          <div class="border">
            <h2 class="h6 o-heading p-3 mb-0 border">
              Product sale count
            </h2>
            @if (count($todayItems) > 0)
              <div class="table-responsive">
                <table class="table table-hover border mb-0">
                  <thead>
                    <tr>
                      <th class="o-heading" colspan="2">
                        Item
                      </th>
                      <th class="o-heading">
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
              <div class="p-3">
                <i class="fas fa-exclamation-circle mr-3"></i>
                No sales
              </div>
            @endif
          </div>
        </div>
        </div>
      @endif
    </div>
    <div class="col-md-6">
      {{-- Purchase --}}
      <div class="mb-3">
        @include ('partials.dashboard.daybook-purchase')
      </div>

      {{-- Expense --}}
      <div class="my-3">
        @include ('partials.dashboard.daybook-expense')
      </div>
    </div>
  </div>

</div>
