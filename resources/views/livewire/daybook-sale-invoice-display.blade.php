<div>

  <div class="border">
    <div class="d-flex mb-0 p-2 justify-content-end bg-success-rm text-white-rm border" style="background-color: #eee;">
      <button class="btn border mr-3" wire:click="enterMode('showPayments')">
        Show payments
      </button>
      <button class="btn btn-danger border rounded-circle" wire:click="$emit('exitDisplaySaleInvoiceMode')">
        <i class="fas fa-times fa-2x-rm"></i>
      </button>
    </div>

    {{-- Main Info --}}
    <div class="shadow">
      <div class="card mb-0 shadow-sm">
        <div class="card-body p-0">


          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr class="" style="font-size: 1.3rem;">
                  <th class="pl-3">
                    Customer
                  </th>
                  <td style="font-weight: bold;">
                    @if ($saleInvoice->customer)
                      {{ $saleInvoice->customer->name }}
                    @else
                      ??
                    @endif
                  </td>
                </tr>
                <tr class="text-secondary" style="font-size: 1.3rem;">
                  <th class="pl-3">
                    Bill ID
                  </th>
                  <td style="font-weight: bold;">
                    {{ $saleInvoice->sale_invoice_id }}
                  </td>
                </tr>
                <tr class="text-secondary" style="font-size: 1rem;">
                  <th class="pl-3">
                    Bill Date
                  </th>
                  <td style="font-weight: bold;">
                    {{ $saleInvoice->created_at->toDateString() }}
                  </td>
                </tr>
                <tr class="text-secondary" style="font-size: 1.3rem;">
                  <th class="pl-3">
                    Total
                  </th>
                  <td class="text-danger" style="font-weight: bold;">
                    @if (false)
                    NRs
                    &nbsp;&nbsp;
                    @endif
                    @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                  </td>
                </tr>

                @if ($saleInvoice->saleInvoiceAdditions)
                  @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
                    <tr class="text-secondary" style="font-size: 1.3rem;">
                      <th class="pl-3">
                        {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                      </th>
                      <td class="text-danger" style="font-weight: bold;">
                        @if (false)
                        NRs
                        &nbsp;&nbsp;
                        @endif
                        @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                      </td>
                    </tr>
                    <tr class="text-secondary" style="font-size: 1.3rem;">
                      <th class="pl-3">
                        Grand Total
                      </th>
                      <td class="text-danger" style="font-weight: bold;">
                        @if (false)
                        NRs
                        &nbsp;&nbsp;
                        @endif
                        @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                      </td>
                    </tr>
                  @endforeach
                @endif

                <tr class="text-secondary" style="font-size: 1.3rem;">
                  <th class="pl-3">
                    Payment Status
                  </th>
                  <td style="font-weight: bold;">
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
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Items List --}}
      <div class="table-responsive bg-white mb-0">
        <table class="table table-bordered table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem; background-color: #eee;">
              <th>#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>

          <tbody style="font-size: 1.3rem;">
            @foreach ($saleInvoice->saleInvoiceItems as $item)
            <tr style="font-size: 1.3rem; {{--background-image: linear-gradient(to right, #AFDBF5, #AFDBF5);--}}" class="font-weight-bold text-white-rm">
              <td class="text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
              <td>
                <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                {{ $item->product->name }}
              </td>
              <td>
                @php echo number_format( $item->product->selling_price ); @endphp
              </td>
              <td>
                <span class="badge badge-pill-rm badge-success">
                  {{ $item->quantity }}
                </span>
              </td>
              <td>
                @php echo number_format( $item->getTotalAmount() ); @endphp
              </td>
            </tr>
            @endforeach
          </tbody>

          <tfoot class="bg-success-rm text-white-rm" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
            <tr>
              <td colspan="4" style="font-size: 1.3rem;" class="font-weight-bold text-right">
                <strong>
                TOTAL
                </strong>
              </td>
              <td style="font-size: 1.3rem;" class="font-weight-bold">
                @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
              </td>
            </tr>
            @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
              <tr>
                <td colspan="4" style="font-size: 1.3rem;" class="font-weight-bold text-right">
                  {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                </td>
                <td style="font-size: 1.3rem;" class="font-weight-bold">
                  @if (false)
                  NRs
                  &nbsp;&nbsp;
                  @endif
                  @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            <tr>
              <td colspan="4" style="font-size: 1.5rem;" class="font-weight-bold text-right">
                <strong>
                GRAND TOTAL
                </strong>
              </td>
              <td style="font-size: 1.5rem;" class="font-weight-bold">
                @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
              </td>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>

    {{-- Show payments if needed --}}
    @if ($modes['showPayments'])
      @livewire ('daybook-sale-invoice-display-show-payments', ['saleInvoice' => $saleInvoice,])
    @endif
  </div>
</div>
