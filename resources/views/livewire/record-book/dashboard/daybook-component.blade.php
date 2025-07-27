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
    {{-- Date selector section --}}
    @if (! $modes['displaySaleInvoice'])
      <div class="mb-3 bg-white p-3 py-4 border o-border-radius">
        <div class="d-flex">
          <div class="mr-3" wire:click="setPreviousDay" role="button">
            <i class="fas fa-arrow-alt-circle-left fa-2x text-primary"></i>
          </div>
          <div class="mr-3 o-heading pt-1">
            <i class="fas fa-calendar mr-2"></i>
            {{ Carbon\Carbon::parse($daybookDate)->format('Y F d') }}
            ,
            {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
          </div>
          <div class="mr-3" wire:click="setNextDay" role="button">
            <i class="fas fa-arrow-alt-circle-right fa-2x text-primary"></i>
          </div>
          <div class="d-flex flex-column justify-content-center">
            <div>
              <input type="date" wire:model="daybookDate" class="px-3 badge-pill mr-3 border o-border-darker-gray">
              @if (true)
              <button class="btn btn-primary px-3 o-border-radius-sm-rm px-4 badge-pill o-heading text-white py-1 my-3 my-md-0" wire:click="render">
                Go
              </button>
              @endif
            </div>
          </div>
          <div class="mx-3">
            @include ('partials.dashboard.spinner-button')
          </div>
        </div>
      </div>
    @endif

    {{-- Summary info --}}
    <div class="p0 py-4-rm mb-3 bg-white-rm border-rm o-border-radius-rm">
      <div class="row" style="margin: auto;">
        <div class="col-md-4 p-0 pr-3">
          <div class="border o-border-radius p-3 bg-success text-white">
            <div class="mb-2">
              TOTAL SALES
            </div>
            <div class="h4 o-heading text-white">
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $totalSaleAmount ); @endphp
            </div>
          </div>
        </div>
        <div class="col-md-4 p-0 pr-3">
          <div class="border o-border-radius p-3 bg-danger text-white">
            <div class="mb-2">
              TOTAL PURCHASE
            </div>
            <div class="h4 o-heading text-white">
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $totalPurchaseAmount ); @endphp
            </div>
          </div>
        </div>
        <div class="col-md-4 p-0 pr-3">
          <div class="border o-border-radius p-3 bg-warning">
            <div class="mb-2">
              TOTAL EXPENSE
            </div>
            <div class="h4 o-heading">
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format($totalExpenseAmount); @endphp
            </div>
          </div>
        </div>
      </div>
    </div>

    <div>
        @if ($modes['displaySaleInvoice'])
          @livewire ('core.dashboard.core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice, 'exitDispatchEvent' => 'exitDisplaySaleInvoiceMode',])
        @else
          <div class="bg-white border p-2 o-border-radius py-4 mb-3">
          <div class="d-flex justify-content-between mt-2 mb-4 px-1">
            <h2 class="h5 o-heading px-1">Sales</h2>
            <div class="px-2 py-3-rm border-rm">
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
          </div>

          <div>
            <div>
              @if ( true {{--$saleInvoices != null && count($saleInvoices) > 0--}})
                <div class="table-responsive mb-3 border o-border-radius">
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
                          <tr class="table-warning">
                            <td colspan="7" class="py-4">
                              <i class="fas fa-exclamation-circle mr-1"></i>
                              No sales
                            </td>
                          </tr>
                      @endif
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
              <div class="border mb-3 o-border-radius py-4">
                <h2 class="h6 o-heading px-3 mb-4">
                  Payment by types
                </h2>
                <div class="m-0 px-3 d-flex">
                  @foreach ($paymentByType as $key => $val)
                    <div class="mb-4-rm mr-5">
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
            <div class="border o-border-radius p-3">
              <h2 class="h6 o-heading mb-3 px-1 py-3">
                Product sale count
              </h2>
              @if (count($todayItems) > 0)
                <div class="table-responsive border o-border-radius">
                  <table class="table table-hover border-rm mb-0">
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
                            @if ($item['product']->image_path)
                              <img src="{{ asset('storage/' . $item['product']->image_path) }}" class="mr-3 o-border-radius" style="width: 40px; height: 40px;">
                            @else
                              <div style="width: 40px; height: 40px; background-color: #ddd;" class="o-border-radius">
                              </div>
                            @endif
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
                <div class="py-3-rm">
                  <i class="fas fa-exclamation-circle mr-3"></i>
                  No sales
                </div>
              @endif
            </div>
          </div>
          </div>
        @endif
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
