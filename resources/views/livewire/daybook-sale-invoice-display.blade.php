<div>

  <div class="border">
    <div class="d-flex mb-0 p-2 justify-content-end bg-success-rm text-white-rm border" style="background-color: #eee;">
      @if (false)
      <button class="btn border mr-3" wire:click="enterMode('showPayments')">
        Show payments
      </button>
      @endif
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
                <tr class="">
                  <th class="pl-3" style="font-size: calc(1rem + 0.2vw);">
                    Customer
                  </th>
                  <td style="font-weight: bold;" style="font-size: calc(1rem + 0.2vw);">
                    @if ($saleInvoice->customer)
                      {{ $saleInvoice->customer->name }}
                    @else
                      <span class="text-secondary">
                        ??
                      </span>
                    @endif
                  </td>
                </tr>
                <tr class="text-secondary">
                  <th class="pl-3" style="font-size: calc(1rem + 0.2vw);">
                    Bill ID
                  </th>
                  <td style="font-size: calc(1rem + 0.2vw);">
                    {{ $saleInvoice->sale_invoice_id }}
                  </td>
                </tr>
                <tr class="text-secondary">
                  <th class="pl-3" style="font-size: calc(1rem + 0.2vw);">
                    Bill Date
                  </th>
                  <td style="font-weight: bold;">
                    {{ $saleInvoice->created_at->toDateString() }}
                  </td>
                </tr>

                <tr class="text-secondary">
                  <th class="pl-3" style="font-size: calc(1rem + 0.2vw);">
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
                   <button class="btn" wire:click="enterMode('showPayments')">
                     Show payments
                   </button>
                  </td>
                </tr>

                @if ($modes['showPayments'])
                  <tr class="text-secondary" style="font-size: 1.3rem;">
                    <th class="pl-3">
                      Payments
                    </th>
                    <td style="font-weight: bold;">
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
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Items List --}}

      {{-- Show in bigger screens --}}
      <div class="table-responsive bg-white mb-0 d-none d-md-block">
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
              <tr class="border-0">
                <td colspan="4" style="font-size: 1.3rem;"
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
              <td colspan="4" style="font-size: 1.5rem;" class="font-weight-bold text-right border-0">
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
          @if (false)
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem; background-color: #eee;">
              <th>#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>
          @endif

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

      <div class="table-responsive">
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
