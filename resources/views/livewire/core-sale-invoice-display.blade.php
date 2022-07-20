<div>
  <div>
    @if ($display_toolbar)
      {{-- Tool bar --}}
      <div class="d-flex justify-content-between mb-4 border p-1 bg-white-rm text-white-rm shadow-sm" style="background-color: #fff;">
        <div>
          <a href="{{ route('dashboard-print-sale-invoice', $saleInvoice->sale_invoice_id) }}"
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
          <button class="btn text-secondary">
            <i class="fas fa-file-excel-o fa-2x-rm"></i>
            <br />
            Excel
          </button>
        </div>
        <div class="">
          <button class="btn text-dark" wire:click="$emit('exitTakeawayWork')">
            <i class="fas fa-times-circle fa-2x"></i>
            <br />
            Close
          </button>
        </div>
      </div>
    @endif
  </div>

  <div class="bg-white shadow">
  
    <div class="border p-0">
  
      {{-- Company Info --}}
      <div class="d-flex justify-content-between pb-3 border-bottom mb-3-rm p-2 d-print-none" style="background-color: #fff;">
        <div class="">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="width: 50px; height: 50px;">
          <h1 class="h5 mt-2 mb-0" style="color: gray;">
            {{ $company->name }}
          </h1>
          <h2 class="h6 mb-2 text-muted" style="font-size: 0.7rem;">
            @if ($has_vat)
              VAT No:
            @else
              PAN No:
            @endif
            {{ $company->pan_number }}
          </h2>
          <h2 class="h6 mb-0 d-inline mr-1" style="font-size: 0.8rem;">
            {{ $company->address }}
          </h2>
          <span class="mr-1">
            |
          </span>
          <h3 class="h6 mb-0 d-inline" style="font-size: 0.8rem;">
            {{ $company->phone }}
          </h3>
          @if (false)
          <h3 class="h6 mb-0 d-inline" style="font-size: 0.8rem;">
            {{ $company->email }}
          </h3>
          @endif
        </div>
  
        <div class="">
          <div class="h-100 d-flex flex-column justify-content-center">
            <div class="bg-danger-rm border-rm mt-2">
              @if (true)
              <div class="mb-3 p-2 bg-primary-rm text-white text-center" style="background-color: orange;">
                SALE INVOICE
              </div>
              @endif
              <div class="mb-1">
                <div class="h6 text-muted-rm mb-1" style="font-size: 0.8rem;">
                  <span class="text-muted" style="font-size: 0.6rem">
                    Bill no:
                  </span>
                  <span style="font-size: 1rem;">
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
        </div>
      </div>

      {{-- Company Info     PRINT     --}}
      <div class="pb-3 border-bottom mb-3-rm p-2 d-none d-md-none d-print-block" style="background-color: #fff; width: 800px !important;">
        <div class="">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="width: 50px; height: 50px;">
          <h1 class="h5 mt-2 mb-0" style="color: gray;">
            {{ $company->name }}
          </h1>
          <h2 class="h6 mb-2 text-muted" style="font-size: 0.7rem;">
            @if ($has_vat)
              VAT No:
            @else
              PAN No:
            @endif
            {{ $company->pan_number }}
          </h2>
          <h2 class="h6 mb-0" style="font-size: 0.8rem;">
            {{ $company->address }}
          </h2>
          <h3 class="h6 mb-0" style="font-size: 0.8rem;">
            {{ $company->phone }}
          </h3>
          @if (false)
          <h3 class="h6 mb-0" style="font-size: 0.8rem;">
            {{ $company->email }}
          </h3>
          @endif
        </div>
  
        <div class="">
          <div class="">
            <div class="border-rm mt-2">
              @if (true)
              <div class="my-3 border-top text-white text-center-rm" style="background-color: orange;">
                SALE INVOICE
              </div>
              @endif
              <div class="mb-1">
                <div class="h6 text-muted-rm mb-1" style="font-size: 0.8rem;">
                  <span class="text-muted" style="font-size: 0.6rem">
                    Bill no:
                  </span>
                  <span style="font-size: 1rem;">
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
        </div>
      </div>
  
      {{-- Main Info --}}
      <div class="shadow-rm">
        <div class="card mb-0 shadow-sm border-0">
          <div class="card-body p-2">
  
  
            <div class="row-rm bg-warning-rm" style="margin: auto; {{-- background-color: #efe; --}}">
  
              <div class="col-md-3-rm mb-3 border-bottom-rm py-3">
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
            </div>
  
          </div>
        </div>
  
        {{-- Items List --}}
  
        {{-- Show in bigger screens --}}
        <div class="table-responsive border bg-white mb-0 d-none d-md-block">
          <table class="table table-sm table-hover border-dark shadow-sm mb-0">
            <thead>
              <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
                @if (false)
                <th>#</th>
                @endif
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
              </tr>
            </thead>
  
            <tbody style="">
              @foreach ($saleInvoice->saleInvoiceItems as $item)
              <tr style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold-rm">
                @if (false)
                <td class="text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
                @endif
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
               <td colspan="3" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right pr-3">
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
                  <td colspan="3" style="font-size: calc(0.6rem + 0.2vw);"
                      class="
                        font-weight-bold text-right border-0 p-0 pr-3
                      ">
                    {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                    @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                    (13%)
                    @endif
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
                <td colspan="3" style="font-size: calc(0.8rem + 0.2vw);" class="font-weight-bold text-right border-0 pr-3">
                  Total
                </td>
                <td style="font-size: calc(0.8rem + 0.2vw);" class="font-weight-bold border-0">
                  @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
  
          </table>
        </div>

  {{-- Print --}}
  <div class="d-none d-print-block" style="width: 100%;">
    <table class="border-dark mb-0" style="">
      <thead>
        <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
          @if (false)
          <th>#</th>
          @endif
          <th style="width: 300px;">Item</th>
          <th style="width: 100px;">Price</th>
          <th style="width: 100px;">Quantity</th>
          <th style="width: 100px;">Amount</th>
        </tr>
      </thead>
    
      <tbody style="">
        @foreach ($saleInvoice->saleInvoiceItems as $item)
        <tr style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold-rm">
          <td>
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
         <td colspan="3" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right pr-3">
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
            <td colspan="3" style="font-size: calc(0.6rem + 0.2vw);"
                class="
                  font-weight-bold text-right border-0 p-0 pr-3
                ">
              {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
              @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
              (13%)
              @endif
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
          <td colspan="3" style="font-size: calc(0.8rem + 0.2vw);" class="font-weight-bold text-right border-0 pr-3">
            Total
          </td>
          <td style="font-size: calc(0.8rem + 0.2vw);" class="font-weight-bold border-0">
            @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
          </td>
        </tr>
      </tfoot>
    
    </table>
  </div>
  
        {{-- Show in smaller screens --}}
        <div class="table-responsive bg-white mb-0 d-md-none d-print-none mt-3">
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
  
        <div class="table-responsive d-md-none d-print-none">
          <table class="table">
  
            <tfoot class="bg-success-rm text-white-rm" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
              <tr>
                <td style="font-size: 1rem;" class="font-weight-bold text-right">
                  <strong>
                  Total
                  </strong>
                </td>
                <td style="font-size: 1rem;" class="font-weight-bold">
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

</div>
