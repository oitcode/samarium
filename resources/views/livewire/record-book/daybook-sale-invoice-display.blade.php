<div>

  <div class="border shadow mb-5">
    <div class="d-flex mb-0 p-2 justify-content-end border bg-white">
      <button class="btn btn-light border rounded-circle" wire:click="$dispatch('exitDisplaySaleInvoiceMode')">
        <i class="fas fa-times"></i>
      </button>
    </div>

    {{-- Main Info --}}
    <div class="shadow">
      <div class="card mb-0 shadow-sm">
        <div class="card-body p-0">
          <div style="margin: auto;">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <td style="width: 200px;">Invoice ID </td>
                  <td>{{ $saleInvoice->sale_invoice_id }}</td>
                </tr>
                <tr>
                  <td>Invoice Date </td>
                  <td>{{ $saleInvoice->sale_invoice_date }}</td>
                </tr>
                <tr>
                  <td>Customer</td>
                  <td>
                    @if ($saleInvoice->customer)
                      <i class="fas fa-user-circle text-muted mr-2"></i>
                      {{ $saleInvoice->customer->name }}
                    @else
                      <i class="fas fa-exclamation-circle text-muted mr-2"></i>
                      <span class="text-muted">
                        None
                      </span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Created by </td>
                  <td>
                    @if ($saleInvoice->creator)
                      {{ $saleInvoice->creator->name }}
                    @else
                      Unknown
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Payment Status </td>
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

                    @if ($modes['showPayments'])
                      <div>
                        <div class="text-primary py-3" role="button" wire:click="exitMode('showPayments')">
                          Hide payments
                        </div>
                      </div>
                    @else
                      <div>
                        <div class="text-primary py-3" role="button" wire:click="enterMode('showPayments')">
                          Show payments
                        </div>
                      </div>
                    @endif

                    @if ($modes['showPayments'])
                      <div>
                        <div class="mb-3 font-weight-bold">
                          Payments
                        </div>
                        <div>
                          @foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment)
                            <div>
                              <div>
                                Rs
                                @php echo number_format( $saleInvoicePayment->amount ); @endphp
                              </div>
                              <div>
                                <span>
                                  {{ $saleInvoicePayment->saleInvoicePaymentType->name }}
                                </span>
                              </div>
                              <div>
                                <span>
                                {{ $saleInvoicePayment->payment_date }}
                                </span>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    @endif
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      {{-- Show in bigger screens --}}
      <div class="table-responsive bg-white mb-0 d-none d-md-block">
        <table class="table table-sm table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr>
              <th>#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($saleInvoice->saleInvoiceItems as $item)
            <tr class="font-weight-bold">
              <td class="text-secondary"> {{ $loop->iteration }} </td>
              <td>
                <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                {{ $item->product->name }}
              </td>
              <td>
                @php echo number_format( $item->price_per_unit); @endphp
              </td>
              <td>
                <span>
                  {{ $item->quantity }}
                </span>
              </td>
              <td>
                @php echo number_format( $item->getTotalAmount() ); @endphp
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" class="font-weight-bold text-right pr-4">
                <strong>
                Subtotal
                </strong>
              </td>
              <td class="font-weight-bold">
                Rs
                @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
              </td>
            </tr>

            {{-- Non tax sale invoice additions --}}
            @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
              @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                @continue
              @endif
              <tr class="border-0">
                <td colspan="4" class=" font-weight-bold text-right border-0 pr-4">
                  {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                </td>
                <td class="
                      @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0 pr-4"
                >
                  Rs
                  @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            {{-- Taxable amount --}}
            {{-- Todo: Only vat? --}}
            @if ($has_vat)
              <tr class="border-0">
                <td colspan="4" class=" font-weight-bold text-right border-0 pr-4 ">
                  Taxable amount
                </td>
                <td class=" font-weight-bold border-0 pr-4">
                  Rs
                  @php echo number_format( $saleInvoice->getTaxableAmount() ); @endphp
                </td>
              </tr>
            @endif

            {{--Tax sale invoice additions --}}
            @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
              @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) != 'vat')
                @continue
              @endif
              <tr class="border-0">
                <td colspan="4" class="font-weight-bold text-right border-0 pr-4">
                  {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                  (13 %)
                </td>
                <td class="
                      @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0"
                >
                  Rs
                  @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            <tr class="border-0">
              <td colspan="4" class="font-weight-bold text-right border-0 pr-4">
                <strong>
                Total
                </strong>
              </td>
              <td class="font-weight-bold border-0">
                Rs
                @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
              </td>
            </tr>
          </tfoot>
        </table>
      </div>

      {{-- Show in smaller screens --}}
      <div class="table-responsive bg-white mb-0 d-md-none mt-3">
        <table class="table table-hover border-dark shadow-sm mb-0">
          <tbody>
            @foreach ($saleInvoice->saleInvoiceItems as $item)
            <tr class="font-weight-bold">
              <td>
                <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
              </td>
              <td>
                {{ $item->product->name }}
                <br />
                <span class="mr-3">
                  Rs @php echo number_format( $item->price_per_unit); @endphp
                </span>
                <span class="text-secondary">
                  Qty: {{ $item->quantity }}
                </span>
              </td>
              <td>
                Rs @php echo number_format( $item->getTotalAmount() ); @endphp
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2" class="font-weight-bold text-right">
                <strong>
                Subtotal
                </strong>
              </td>
              <td class="font-weight-bold">
                Rs
                @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
              </td>
            </tr>
            @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
              <tr class="border-0">
                <td colspan="2"
                    class="
                      font-weight-bold text-right border-0
                    ">
                  {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                </td>
                <td
                    class="
                      @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0">
                  Rs
                  @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach
            <tr class="border-0">
              <td colspan="2" class="font-weight-bold text-right border-0">
                <strong>
                Total
                </strong>
              </td>
              <td class="font-weight-bold border-0">
                Rs
                @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

</div>
