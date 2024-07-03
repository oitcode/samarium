<div style="background-color: #fff;">


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


  <div class="bg-white-rm shadow-rm p-0 m-0 col-md-8-rm">
  
    <div class="border-rm p-0">
  
      <div class="px-2" style="{{--background-color: #fff;--}}">
        <div class="">

          {{-- Company Info --}}
          <div class="d-flex justify-content-center py-3" style="{{--  background-color: #eee; --}} font-family: Arial;">
            <div>
              <div class="d-flex">
                <div class="d-flex flex-column justify-content-center mr-5">
                  @if (true)
                  <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="{{-- width: 75px; --}} height: 75px;" class="mr-2">
                  @endif
                </div>
                <div>
                  <div>
                    <h2 class="h4 font-weight-bold mt-2 mb-1" style="">
                      {{ $company->name }}
                    </h2>
                  </div>

                  <div class="table-responsive p-0">
                    <table class="table table-sm table-striped-rm table-bordered-rm mb-0" style="{{-- font-size: 0.9rem; --}}">
                      <tr>
                        <td class="font-weight-bold border-0 px-0 py-0 pr-4">
                          Address
                        </td>
                        <td class="border-0 py-0">
                          {{ $company->address }}
                        </td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold border-0 px-0 py-0">
                          PAN No
                        </td>
                        <td class="border-0 py-0">
                          {{ $company->pan_number }}
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-between mb-0 bg-light-rm py-3 border-top border-bottom">
            @if (false)
            <h1 class="mb-3 p-3 h6 font-weight-bold bg-primary-rm text-white-rm">
              SALE
              QUOTATION
            </h1>
            @endif
            <div>
              <div class="mb-2 font-weight-bold text-secondary-rm" style="{{--font-size: 0.8rem;--}}">
                To
              </div>

              <div class="mb-3-rm">
                <h2 class="h5 font-weight-bold mt-2 mb-0" style="">
                  @if ($saleQuotation->customer)
                    {{ $saleQuotation->customer->name }}
                  @else
                    @if (false)
                      <i class="fas fa-exclamation-circle text-muted mr-1"></i>
                      <span class="text-muted">
                        None
                      </span>
                    @else
                    @endif
                  @endif
                </h2>
              </div>

              <div class="table-responsive">
                <table class="table table-sm table-striped-rm table-bordered-rm mb-0">
                  <tr>
                    @if (false)
                    <td class="font-weight-bold border-0 px-0 pr-5">
                      Address
                    </td>
                    @endif
                    <td class="border-0 px-0 p-0">
                      @if ($saleQuotation->customer)
                        @if ($saleQuotation->customer->address)
                          {{ $saleQuotation->customer->address }}
                        @else
                        @endif
                      @else
                        <span class="text-muted" style="">
                        </span>
                      @endif
                    </td>
                  </tr>
                  <tr class="">
                    @if (false)
                    <td class="font-weight-bold border-0 px-0 pr-5">
                      PAN No
                    </td>
                    @endif
                    <td class="border-0 px-0 p-0">
                      PAN No:
                      @if ($saleQuotation->customer)
                        @if ($saleQuotation->customer->pan_num)
                          {{ $saleQuotation->customer->pan_num }}
                        @else
                        @endif
                      @else
                        <span class="text-muted" style="">
                        </span>
                      @endif
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="px-4">

              @if (false)
              <div class="font-weight-bold bg-warning-rm mb-2" style="font-family: Times;">
                QUOTATION
              </div>
              @endif
              <div class="mb-1">
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
          </div>

        </div>
  
      </div>

      {{-- ----- --}}
      <div class="px-2">


        {{--
            ----
            ----
            ---- Items List
            ----
            ----
        --}}

        @if (false)
        <h2 class="h5 font-weight-bold my-3">
          Item list
        </h2>
        @endif

        {{-- Show in bigger screens --}}
        <div class="table-responsive border-rm bg-white-rm mb-0 d-none d-md-block">
          <table class="table table-sm table-bordered-rm table-hover border-dark shadow-sm mb-0">
            <thead>
              <tr class="bg-success-rm text-white-rm" style="{{--background-color: #ddd;--}}">
                <th class="py-2 pl-2 bg-success-rm text-white-rm" style="border: 1px solid black;">SN</th>
                <th class="py-2 pl-2 bg-success-rm text-white-rm" style="border: 1px solid black;">Item</th>
                <th class="py-2 bg-info-rm text-white-rm" style="border: 1px solid black;">Qty</th>
                <th class="py-2 bg-info-rm text-white-rm" style="border: 1px solid black;">Rate</th>
                <th class="py-2 bg-info-rm text-white-rm" style="border: 1px solid black;">Amount</th>
              </tr>
            </thead>
  
            <tbody style="">
              @foreach ($saleQuotation->saleQuotationItems as $item)
              <tr style="" class="font-weight-bold-rm">
                <td style="border: 1px solid black;">
                  {{ $loop->iteration }}
                </td>
                <td style="border: 1px solid black;">
                  @if (false)
                  <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 30px; height: 30px;">
                  @endif
                  {{ $item->product->name }}
                </td>
                <td style="border: 1px solid black;">
                  @if (false)
                  <span class="badge badge-pill-rm badge-success">
                    {{ $item->quantity }}
                  </span>
                  @endif
                  {{ $item->quantity }}
                </td>
                <td style="border: 1px solid black;">
                  {{--
                  @php echo number_format( $item->product->selling_price ); @endphp
                  --}}
                  @php echo number_format( $item->price_per_unit); @endphp
                </td>
                <td style="border: 1px solid black;">
                  @php echo number_format( $item->getTotalAmount() ); @endphp
                </td>
              </tr>
              @endforeach
              @if (false)
              @for ($ii=0; $ii<5; $ii++)
                <tr>
                  <td style="border: 1px solid black;">&nbsp;</td>
                  <td style="border: 1px solid black;">&nbsp;</td>
                  <td style="border: 1px solid black;">&nbsp;</td>
                  <td style="border: 1px solid black;">&nbsp;</td>
                  <td style="border: 1px solid black;">&nbsp;</td>
                </tr>
              @endfor
              @endif
            </tbody>
  
            <tfoot class="bg-success-rm text-white-rm">
              <tr class="bg-primary-rm">
               <td class="border-0"></td>
               <td class="border-0"></td>
               <td class="border-0"></td>
               <td style="{{-- font-size: calc(0.8rem + 0.2vw); border: 1px solid black; --}}" class="font-weight-bold text-right pr-3 py-3">
                  <strong>
                  Subtotal
                  </strong>
                </td>
                <td style="{{-- font-size: calc(0.8rem + 0.2vw); border: 1px solid black; --}}" class="font-weight-bold py-3">
                  @php echo number_format( $saleQuotation->getTotalAmountRaw() ); @endphp
                </td>
              </tr>

              {{-- TODO --}} 
              @if (false)
              @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
                <tr class="border-0 mb-0 p-0">
                  <td colspan="3" style="{{-- font-size: calc(0.6rem + 0.2vw); --}}"
                      class="
                        font-weight-bold text-muted text-right border-0 p-0 pr-3
                      ">
                    {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                    @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                    (13%)
                    @endif
                  </td>
                  <td style="{{-- font-size: calc(0.6rem + 0.2vw); --}}"
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
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td style="{{-- font-size: calc(0.8rem + 0.2vw); border: 1px solid black; background-color: #ddd; --}}" class="font-weight-bold text-right border-0-rm pr-3 py-3
                bg-success-rm text-white-rm">
                  Total
                </td>
                <td style="{{-- font-size: calc(0.8rem + 0.2vw); border: 1px solid black; background-color: #ddd; --}}" class="font-weight-bold border-0-rm
                bg-success-rm text-white-rm py-3">
                  @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
  
          </table>
        </div>

        {{-- Show in smaller screens --}}
        <div class="table-responsive bg-white-rm mb-0 d-md-none d-print-none mt-3">
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

  <div class="bg-white-rm border-top p-3 col-md-8-rm my-5-rm">
    <div class="d-flex justify-content-between">
      <div>
        <h2 class="h5 font-weight-bold">
          Terms and conditions
        </h2>

        <ul class="pl-3">
          <li>Valid for two weeks.</li>
          <li>13% VAT will be added.</li>
        </ul>
      </div>
      <div>
        <div class="p-5"style="border-bottom: 1px solid black;">
        </div>
        <div style="">
        Signature
        </div>
      </div>
    </div>
  </div>

  @if (false)
  <div class="bg-white-rm border-top p-3 col-md-8-rm my-5-rm" style="{{-- font-size: 0.8rem; --}}">
    Please note that this is a sales quotation/estimate and not a sale invoice.
  </div>

  <div class="bg-white-rm border-top p-3 col-md-8-rm my-5-rm" style="{{-- font-size: 0.8rem; --}}">
    {{ $company->name }}
    <br />
    {{ $company->address }}
    <br />
    Ph: &nbsp;&nbsp;{{ $company->phone }}
    <br />
    Email: &nbsp;&nbsp;{{ $company->email }}
    <br />
  </div>
  @endif

</div>
