<div>


  <div class="mb-0 p-0">
    @if ($display_toolbar)
      {{-- Tool bar --}}

      @if (true)
      <x-toolbar-classic toolbarTitle="Sale quotation">

        @if (false)
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "",
            'btnIconFaClass' => 'fas fa-print',
            'btnText' => 'Print',
            'btnCheckMode' => '',
        ])

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "",
            'btnIconFaClass' => 'fas fa-file-pdf',
            'btnText' => 'List',
            'btnCheckMode' => '',
        ])

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "",
            'btnIconFaClass' => 'fas fa-excel-o',
            'btnText' => 'Excel',
            'btnCheckMode' => '',
        ])
        @endif

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => '$refresh',
            'btnIconFaClass' => 'fas fa-refresh',
            'btnText' => '',
            'btnCheckMode' => '',
        ])

        @include ('partials.dashboard.spinner-button')

      </x-toolbar-classic>
      @endif
    @endif
  </div>


  <div class="bg-white shadow-rm p-0 m-0 col-md-8">
  
    <div class="border-rm p-0">
  
      {{-- Company Info --}}
      <div class="d-flex-rm justify-content-between-rm pb-3-rm border-bottom-rm mb-3-rm p-2 d-print-none-rm" style="background-color: #fff;">
        <div class="">
          <h1 class="my-3 p-3 h5 font-weight-bold bg-primary text-white">
            SALE QUOTATION
          </h1>

          <div class="my-3">
            <div class="mb-3">
              <div class="font-weight-bold">
                Quotation no:
              </div>
              <div>
                {{ $saleQuotation->sale_quotation_id }}
              </div>
            </div>
            <div>
              <div class="font-weight-bold">
                Date:
              </div>
              <div>
                {{ $saleQuotation->sale_quotation_date }}
              </div>
            </div>
          </div>

          <div class="row" style="margin: auto;">
            <div class="col-md-6 border">

              <div class="my-3 font-weight-bold">
                From
              </div>

              <h2 class="h5 font-weight-bold mt-2 mb-3" style="">
                @if (true)
                <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="width: 25px; height: 25px;">
                @endif
                {{ $company->name }}
              </h2>

              <div class="table-responsive p-0 py-3">
                <table class="table table-sm table-striped-rm table-bordered-rm mb-0">
                  <tr>
                    <td class="font-weight-bold border-0">
                      Address
                    </td>
                    <td class="border-0">
                      {{ $company->address }}
                    </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold border-0">
                      PAN No
                    </td>
                    <td class="border-0">
                      {{ $company->pan_number }}
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-6 border">

              <div class="my-3 font-weight-bold">
                To
              </div>

              <table class="table">
                <tr>
                  <td>
                    Name
                  </td>
                  <td>
                    @if ($saleQuotation->customer)
                      {{ $saleQuotation->customer->name }}
                    @else
                      <i class="fas fa-exclamation-circle text-muted mr-2"></i>
                      <span class="text-muted">
                        None
                      </span>
                    @endif
                  </td>
                </tr>
                <tr class="">
                  <td>
                    PAN No
                  </td>
                  <td>
                    @if ($saleQuotation->customer)
                      @if ($saleQuotation->customer->pan_num)
                        {{ $saleQuotation->customer->pan_num }}
                      @else
                        Not available
                      @endif
                    @else
                      <span class="text-muted" style="">
                        Not available
                      </span>
                    @endif
                  </td>
                </tr>
              </table>
            </div>
          </div>

        </div>
  
      </div>

      {{-- ----- --}}
      <div class="p-2">


        {{--
            ----
            ----
            ---- Items List
            ----
            ----
        --}}

        <h2 class="h5 font-weight-bold my-3">
          Item list
        </h2>

        {{-- Show in bigger screens --}}
        <div class="table-responsive border-rm bg-white mb-0 d-none d-md-block">
          <table class="table table-sm table-borderd table-hover border-dark shadow-sm mb-0">
            <thead>
              <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
                <th class="h5 py-2 pl-2 bg-success-rm text-white-rm" style="background-color: #eee;">Item</th>
                <th class="h5 py-2 bg-info-rm text-white-rm">Price</th>
                <th class="h5 py-2 bg-info-rm text-white-rm">Quantity</th>
                <th class="h5 py-2 bg-info-rm text-white-rm">Amount</th>
              </tr>
            </thead>
  
            <tbody style="">
              @foreach ($saleQuotation->saleQuotationItems as $item)
              <tr style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold-rm">
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
                  @if (false)
                  <span class="badge badge-pill-rm badge-success">
                    {{ $item->quantity }}
                  </span>
                  @endif
                  {{ $item->quantity }}
                </td>
                <td>
                  @php echo number_format( $item->getTotalAmount() ); @endphp
                </td>
              </tr>
              @endforeach
            </tbody>
  
            <tfoot class="bg-success-rm text-white-rm">
              <tr class="bg-primary-rm">
               <td colspan="3" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right pr-3 pt-4">
                  <strong>
                  Subtotal
                  </strong>
                </td>
                <td style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold pt-4">
                  @php echo number_format( $saleQuotation->getTotalAmountRaw() ); @endphp
                </td>
              </tr>

              {{-- TODO --}} 
              @if (false)
              @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
                <tr class="border-0 mb-0 p-0">
                  <td colspan="3" style="font-size: calc(0.6rem + 0.2vw);"
                      class="
                        font-weight-bold text-muted text-right border-0 p-0 pr-3
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
                    @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                  </td>
                </tr>
              @endforeach
              @endif
  
              <tr class="border-0 bg-danger-rm p-0">
                <td colspan="3" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right border-0 pr-3">
                  Total
                </td>
                <td style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold border-0">
                  @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
  
          </table>
        </div>

        {{-- Show in smaller screens --}}
        <div class="table-responsive bg-white mb-0 d-md-none d-print-none mt-3">
          <table class="table table-bordered-rm table-hover border-dark shadow-sm mb-0">
  
            <tbody style="">
              @foreach ($saleQuotation->saleQuotationItems as $item)
              <tr style="" class="font-weight-bold text-white-rm">
                <td>
                  <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                </td>
                <td>
                  {{ $item->product->name }}
                  <br />
                  <span class="text-secondary mr-3">
                    Rs @php echo number_format( $item->price_per_unit); @endphp
                  </span>
                  <span class="text-secondary" style="">
                    Qty: {{ $item->quantity }}
                  </span>
                </td>
                <td class="bg-warning-rm text-right">
                  @php echo number_format( $item->getTotalAmount() ); @endphp
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  
        <div class="table-responsive d-md-none d-print-none">
          <table class="table table-sm mb-0">
  
            <tfoot class="bg-success-rm text-white-rm" style="background-image: linear-gradient(to right, white, #abc);">
              <tr>
                <td style="" class="font-weight-bold text-right-rm">
                  <strong>
                  Total
                  </strong>
                </td>
                <td style="" class="font-weight-bold text-right">
                  @php echo number_format( $saleQuotation->getTotalAmountRaw() ); @endphp
                </td>
              </tr>

              {{-- TODO --}}
              @if (false)
              @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
                <tr class="border-0">
                  <td style=""
                      class="
                        font-weight-bold text-right-rm border-0
                      ">
                    {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                  </td>
                  <td style=""
                      class="
                        @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                          text-danger
                        @endif
                        text-right
                        font-weight-bold border-0">
                    @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                  </td>
                </tr>
              @endforeach
              @endif
  
              <tr class="border-0">
                <td  style="" class="font-weight-bold text-right-rm border-0">
                  <strong>
                  Grand total
                  </strong>
                </td>
                <td style="" class="font-weight-bold text-right border-0">
                  @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
  
        {{-- ./Show in smaller screens --}}
      </div>
  
    </div>
  </div>

  <div class="bg-white border p-3 col-md-8">
    <h2 class="h5 font-weight-bold">
      Terms and conditions
    </h2>

    <ul class="pl-3">
      <li>Valid for two weeks.</li>
      <li>13% VAT will be added.</li>
    </ul>
  </div>

</div>
