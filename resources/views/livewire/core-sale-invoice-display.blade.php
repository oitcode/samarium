<div class="bg-white shadow">

  <div class="border p-3">
    @if (false)
    <div class="d-flex mb-0 p-2 justify-content-end bg-success text-white border">
      <button class="btn btn-light border rounded-circle" wire:click="$emit('exitSaleInvoiceDisplayMode')">
        <i class="fas fa-times fa-2x-rm"></i>
      </button>
    </div>
    @endif

    {{-- Company Info --}}
    <div class="d-flex justify-content-between py-3 border-bottom mb-3-rm">
      <div class="">
        <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="width: 50px; height: 50px;">
        <h1 class="h5 mt-2 mb-0" style="color: gray;">
          {{ $company->name }}
        </h1>
        <h2 class="h6 mb-2 text-muted" style="font-size: 0.7rem;">
          PAN No:
          {{ $company->pan_number }}
        </h2>
        <h2 class="h6 mb-0" style="font-size: 0.8rem;">
          {{ $company->address }}
        </h2>
        <h3 class="h6 mb-0" style="font-size: 0.8rem;">
          {{ $company->phone }}
        </h3>
        <h3 class="h6 mb-0" style="font-size: 0.8rem;">
          {{ $company->email }}
        </h3>
      </div>

      <div class="">
        @if (true)
        <div class="mb-3 p-2 bg-primary-rm text-white text-center" style="background-color: orange;">
          SALE INVOICE
        </div>
        @endif
        <div class="mb-1">
          <div class="h6 text-muted-rm mb-1" style="font-size: 0.8rem;">
            <span class="text-muted" style="font-size: 0.6rem">
              ID:
            </span>
            <span>
              {{ $saleInvoice->sale_invoice_id }}
            </span>
          </div>
        </div>

        <div class="mb-1">
          <div class="text-muted-rm mb-1" style="font-size: 0.8rem;">
            <span class="text-muted" style="font-size: 0.6rem">
              Date:
            </span>
            <span>
              {{ $saleInvoice->created_at->toDateString() }}
            </span>
          </div>
        </div>
      </div>
    </div>

    {{-- Main Info --}}
    <div class="shadow-rm">
      <div class="card mb-0 shadow-sm border-0">
        <div class="card-body p-0">


          <div class="row-rm bg-warning-rm" style="margin: auto; background-color: #efe;">

            <div class="col-md-3-rm mb-3 border-bottom py-3">
              <div class="h5 text-muted mb-2">
                Customer
              </div>

              @if ($saleInvoice->customer)
              <div class="col-md-3 p-0">
                <table class="table table-sm">
                  <tr class="border-0 m-0 p-0">
                    <td class="w-25 pl-0 border-0 m-0 p-0" style="font-size: 0.8rem;">
                      Name
                    </td>
                    <td class="border-0 m-0 p-0 h5">
                      @if ($saleInvoice->customer)
                        @if (false)
                          <i class="fas fa-user-circle text-muted mr-2"></i>
                        @endif
                        {{ $saleInvoice->customer->name }}
                      @else
                        <i class="fas fa-exclamation-circle text-muted mr-2"></i>
                        <span class="text-muted">
                          None
                        </span>
                      @endif
                    </td>
                  </tr>
                  <tr class="border-0 m-0 p-0">
                    <td class="pl-0 border-0 m-0 p-0" style="font-size: 0.8rem;">
                      PAN No
                    </td>
                    <td class="border-0 m-0 p-0">
                      @if ($saleInvoice->customer->pan_num)
                        {{ $saleInvoice->customer->pan_num }}
                      @else
                        <span class="text-muted" style="font-size: 0.5rem;">
                          No info
                        </span>
                      @endif
                    </td>
                  </tr>
                  @if (false)
                  <tr class="border-0 m-0 p-0">
                    <td class="pl-0 border-0 m-0 p-0" style="font-size: 0.8rem;">
                      Address
                    </td>
                    <td class="border-0 m-0 p-0">
                      @if ($saleInvoice->customer->address)
                        {{ $saleInvoice->customer->address }}
                      @else
                        <span class="text-muted" style="font-size: 0.5rem;">
                          No info
                        </span>
                      @endif
                    </td>
                  </tr>
                  <tr class="border-0 m-0 p-0">
                    <td class="pl-0 border-0 m-0 p-0" style="font-size: 0.8rem;">
                      Phone
                    </td>
                    <td class="border-0 m-0 p-0">
                      @if ($saleInvoice->customer->phone)
                        {{ $saleInvoice->customer->phone }}
                      @else
                        <span class="text-muted" style="font-size: 0.5rem;">
                          No info
                        </span>
                      @endif
                    </td>
                  </tr>
                  <tr class="border-0 m-0 p-0">
                    <td class="pl-0 border-0 m-0 p-0" style="font-size: 0.8rem;">
                      Email
                    </td>
                    <td class="border-0 m-0 p-0">
                      @if ($saleInvoice->customer->email)
                        {{ $saleInvoice->customer->email }}
                      @else
                        <span class="text-muted" style="font-size: 0.5rem;">
                          No info
                        </span>
                      @endif
                    </td>
                  </tr>
                  @endif
                </table>
              </div>
              @else
                <div class="text-muted" style="font-size: 0.6rem;">
                  <i class="fas fa-exclamation-circle mr-2"></i>
                  No info
                </div>
              @endif

            </div>


            @if (false)
            <div class="col-md-3-rm mb-3">
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
                       @php echo number_format( $saleInvoicePayment->amount ); @endphp
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
            @endif

          </div>

        </div>
      </div>

      {{-- Items List --}}

      {{-- Show in bigger screens --}}
      <div class="table-responsive border bg-white mb-0 d-none d-md-block">
        <table class="table table-sm table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
              <th>#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>

          <tbody style="">
            @foreach ($saleInvoice->saleInvoiceItems as $item)
            <tr style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold">
              <td class="text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
              <td>
                <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 30px; height: 30px;">
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
            <tr class="bg-primary-rm">
             <td colspan="4" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right">
                <strong>
                Subtotal
                </strong>
              </td>
              <td style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold">
                @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
              </td>
            </tr>
            @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
              <tr class="border-0 mb-0 p-0">
                <td colspan="4" style="font-size: calc(0.6rem + 0.2vw);"
                    class="
                      font-weight-bold text-right border-0 p-0 pr-1
                    ">
                  {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                </td>
                <td style="font-size: calc(0.6rem + 0.2vw);"
                    class="
                      @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0 p-0 pl-1">
                  @if (false)
                  NRs
                  &nbsp;&nbsp;
                  @endif
                  @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            <tr class="border-0 bg-danger-rm p-0">
              <td colspan="4" style="font-size: calc(1rem + 0.2vw);" class="font-weight-bold text-right border-0">
                Total
              </td>
              <td style="font-size: calc(1rem + 0.2vw);" class="font-weight-bold border-0">
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
