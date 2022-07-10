<div>

  <div class="border shadow mb-5">
    <div class="d-flex mb-0 p-2 justify-content-end bg-success-rm text-white-rm border" style="background-color: #eee;">
      <button class="btn btn-danger border rounded-circle" wire:click="$emit('exitDisplaySaleInvoiceMode')">
        <i class="fas fa-times fa-2x-rm"></i>
      </button>
    </div>

    {{-- Main Info --}}
    <div class="shadow">
      <div class="card mb-0 shadow-sm">
        <div class="card-body p-0">


          <div class="row p-4" style="margin: auto; {{-- background-color: #ffe; --}}">

            <div class="col-md-3 mb-3">
              <div class="text-muted-rm mb-1">
                Customer
              </div>
              <div class="h6">
                @if ($saleInvoice->customer)
                  {{ $saleInvoice->customer->name }}
                @else
                  <span class="text-secondary">
                    ??
                  </span>
                @endif
              </div>
            </div>

            <div class="col-md-3 mb-3">
              <div class="text-muted-rm mb-1">
                Invoice ID
              </div>
              <div class="h6">
                {{ $saleInvoice->sale_invoice_id }}
              </div>
            </div>

            <div class="col-md-3 mb-3">
              <div class="text-muted-rm mb-1">
                Invoice Date
              </div>
              <div class="h6">
                {{ $saleInvoice->created_at->toDateString() }}
              </div>
            </div>

            <div class="col-md-3 mb-3">
              <div>
                Payment Status
              </div>
              <div>
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
               <div>
                 <div class="text-primary" style="font-size: 0.8rem;" role="button" wire:click="enterMode('showPayments')">
                   Show payments
                 </div>
               </div>
               @if ($modes['showPayments'])
                 <div>
                   <div>
                     Payments
                   </div>
                   <div>
                     @foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment)
                       <div>
                       Rs
                       {{ $saleInvoicePayment->amount }}
                       <span class="badge badge-pill ml-3">
                       {{ $saleInvoicePayment->saleInvoicePaymentType->name }}
                       </span>
                       <span class="badge badge-pill ml-3">
                       {{ $saleInvoicePayment->payment_date }}
                       </span>
                       </div>
                     @endforeach
                   </div>
                 </div>
               @endif
              </div>
            </div>

          </div>

        </div>
      </div>

      {{-- Items List --}}

      {{-- Show in bigger screens --}}
      <div class="table-responsive bg-white mb-0 d-none d-md-block">
        <table class="table table-sm table-bordered table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: 1.1rem; background-color: #eee;">
              <th>#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>

          <tbody style="font-size: 1.1rem;">
            @foreach ($saleInvoice->saleInvoiceItems as $item)
            <tr style="font-size: 1.1rem;" class="font-weight-bold text-white-rm">
              <td class="text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
              <td>
                <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                {{ $item->product->name }}
              </td>
              <td>
                {{--
                @php echo number_format( $item->product->selling_price ); @endphp
                --}}
                @php echo number_format( $item->price_per_unit); @endphp
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

          <tfoot class="bg-success-rm text-white-rm">
            <tr>
              <td colspan="4" style="font-size: 1.1rem;" class="font-weight-bold text-right pr-4">
                <strong>
                Subtotal
                </strong>
              </td>
              <td style="font-size: 1.3rem;" class="font-weight-bold">
                @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
              </td>
            </tr>

            {{-- Non tax sale invoice additions --}}
            @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)

              @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                @continue
              @endif

              <tr class="border-0">
                <td colspan="4" style="font-size: 1.1rem;"
                    class="
                      font-weight-bold text-right border-0 pr-4
                    ">
                  {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                </td>
                <td style="font-size: 1.1rem;"
                    class="
                      @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0 pr-4">
                  @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            {{-- Taxable amount --}}
            <tr class="border-0">
              <td colspan="4" style="font-size: 1.1rem;"
                  class="
                    font-weight-bold text-right border-0 pr-4
                  ">
                Taxable amount
              </td>
              <td style="font-size: 1.1rem;"
                  class=" font-weight-bold border-0 pr-4">
                @php echo number_format( $saleInvoice->getTaxableAmount() ); @endphp
              </td>
            </tr>

            {{--Tax sale invoice additions --}}
            @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)

              @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) != 'vat')
                @continue
              @endif

              <tr class="border-0">
                <td colspan="4" style="font-size: 1.1rem;"
                    class="
                      font-weight-bold text-right border-0 pr-4
                    ">
                  {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                  (13 %)
                </td>
                <td style="font-size: 1.1rem;"
                    class="
                      @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0">
                  @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            <tr class="border-0">
              <td colspan="4" style="font-size: 1.5rem;" class="font-weight-bold text-right border-0 pr-4">
                <strong>
                Grand total
                </strong>
              </td>
              <td style="font-size: 1.5rem;" class="font-weight-bold border-0">
                @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
              </td>
            </tr>
          </tfoot>

        </table>
      </div>

      {{-- Show in smaller screens --}}
      <div class="table-responsive bg-white mb-0 d-md-none mt-3">
        <table class="table table-bordered-rm table-hover border-dark shadow-sm mb-0">

          <tbody style="font-size: 1.3rem;">
            @foreach ($saleInvoice->saleInvoiceItems as $item)
            <tr style="font-size: 1.1rem;" class="font-weight-bold text-white-rm">
              <td>
                <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
              </td>
              <td>
                {{ $item->product->name }}
                <br />
                <span class="text-primary mr-3">
                  Rs @php echo number_format( $item->price_per_unit); @endphp
                </span>
                <span class="text-secondary" style="font-size: 1rem;">
                  Qty: {{ $item->quantity }}
                </span>
              </td>
              <td>
                @php echo number_format( $item->getTotalAmount() ); @endphp
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="table-responsive d-md-none">
        <table class="table">

          <tfoot class="bg-success-rm text-white-rm" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
            <tr>
              <td style="font-size: 1.3rem;" class="font-weight-bold text-right">
                <strong>
                Total
                </strong>
              </td>
              <td style="font-size: 1.3rem;" class="font-weight-bold">
                @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
              </td>
            </tr>
            @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
              <tr class="border-0">
                <td style="font-size: 1.3rem;"
                    class="
                      font-weight-bold text-right border-0
                    ">
                  {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                </td>
                <td style="font-size: 1.3rem;"
                    class="
                      @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0">
                  @if (false)
                  NRs
                  &nbsp;&nbsp;
                  @endif
                  @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            <tr class="border-0">
              <td  style="font-size: 1.5rem;" class="font-weight-bold text-right border-0">
                <strong>
                Grand total
                </strong>
              </td>
              <td style="font-size: 1.5rem;" class="font-weight-bold border-0">
                @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
              </td>
            </tr>
          </tfoot>
        </table>
      </div>

      {{-- ./Show in smaller screens --}}
    </div>

  </div>
</div>
