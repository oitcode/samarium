<div>

  <div class="mb-0 p-0">
    @if ($display_toolbar)

      {{--
      |
      | Toolbar.
      |
      --}}

      <x-toolbar-classic toolbarTitle="Sale quotation">
        @include ('partials.dashboard.spinner-button')
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => '$refresh',
            'btnIconFaClass' => 'fas fa-refresh',
            'btnText' => '',
            'btnCheckMode' => '',
        ])
      </x-toolbar-classic>
    @endif
  </div>

  <div class="p-0 m-0">
    <div class="p-0">
      <div class="px-2">
        <div>
          {{-- Company Info --}}
          <div class="d-flex justify-content-center py-3" style="{{--  background-color: #eee; --}} font-family: Arial;">
            <div>
              <div class="d-flex">
                <div class="d-flex flex-column justify-content-center mr-5">
                  <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="{{-- width: 75px; --}} height: 75px;" class="mr-2">
                </div>
                <div>
                  <div>
                    <h2 class="h4 font-weight-bold mt-2 mb-1">
                      {{ $company->name }}
                    </h2>
                  </div>

                  <div class="table-responsive p-0">
                    <table class="table table-sm mb-0">
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

          <div class="d-flex justify-content-between mb-0 py-3 border-top border-bottom">
            <div>
              <div class="mb-2 font-weight-bold">
                To
              </div>
              <div>
                <h2 class="h5 font-weight-bold mt-2 mb-0">
                  @if ($saleQuotation->customer)
                    {{ $saleQuotation->customer->name }}
                  @else
                  @endif
                </h2>
              </div>
              <div class="table-responsive">
                <table class="table table-sm mb-0">
                  <tr>
                    <td class="border-0 px-0 p-0">
                      @if ($saleQuotation->customer)
                        @if ($saleQuotation->customer->address)
                          {{ $saleQuotation->customer->address }}
                        @else
                        @endif
                      @else
                        <span class="text-muted">
                        </span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td class="border-0 px-0 p-0">
                      PAN No:
                      @if ($saleQuotation->customer)
                        @if ($saleQuotation->customer->pan_num)
                          {{ $saleQuotation->customer->pan_num }}
                        @else
                        @endif
                      @else
                        <span class="text-muted">
                        </span>
                      @endif
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="px-4">
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

      <div class="px-2">

        {{--
        |
        | Items List
        |
        --}}

        {{-- Show in bigger screens --}}
        <div class="table-responsive mb-0 d-none d-md-block">
          <table class="table table-sm table-hover border-dark shadow-sm mb-0">
            <thead>
              <tr>
                <th class="py-2 pl-2" style="border: 1px solid black;">SN</th>
                <th class="py-2 pl-2" style="border: 1px solid black;">Item</th>
                <th class="py-2" style="border: 1px solid black;">Qty</th>
                <th class="py-2" style="border: 1px solid black;">Rate</th>
                <th class="py-2" style="border: 1px solid black;">Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($saleQuotation->saleQuotationItems as $item)
                <tr>
                  <td style="border: 1px solid black;">
                    {{ $loop->iteration }}
                  </td>
                  <td style="border: 1px solid black;">
                    {{ $item->product->name }}
                  </td>
                  <td style="border: 1px solid black;">
                    {{ $item->quantity }}
                  </td>
                  <td style="border: 1px solid black;">
                    @php echo number_format( $item->price_per_unit); @endphp
                  </td>
                  <td style="border: 1px solid black;">
                    @php echo number_format( $item->getTotalAmount() ); @endphp
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="o-heading text-right pr-3 py-3">
                  Subtotal
                </td>
                <td class="font-weight-bold py-3">
                  @php echo number_format( $saleQuotation->getTotalAmountRaw() ); @endphp
                </td>
              </tr>
              <tr class="border-0 p-0">
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="font-weight-bold text-right pr-3 py-3">
                  Total
                </td>
                <td class="font-weight-bold py-3">
                  @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
          </table>
        </div>

        {{-- Show in smaller screens --}}
        <div class="table-responsive mb-0 d-md-none d-print-none mt-3">
          <table class="table table-hover border-dark shadow-sm mb-0">
            <tbody>
              @foreach ($saleQuotation->saleQuotationItems as $item)
              <tr class="font-weight-bold">
                <td>
                  <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                </td>
                <td>
                  {{ $item->product->name }}
                  <br />
                  <span class="text-secondary mr-3">
                    Rs @php echo number_format( $item->price_per_unit); @endphp
                  </span>
                  <span class="text-secondary">
                    Qty: {{ $item->quantity }}
                  </span>
                </td>
                <td class="text-right">
                  @php echo number_format( $item->getTotalAmount() ); @endphp
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  
        <div class="table-responsive d-md-none d-print-none">
          <table class="table table-sm mb-0">
            <tfoot style="background-image: linear-gradient(to right, white, #abc);">
              <tr>
                <td class="o-heading">
                  Total
                </td>
                <td class="font-weight-bold text-right">
                  @php echo number_format( $saleQuotation->getTotalAmountRaw() ); @endphp
                </td>
              </tr>
              <tr class="border-0">
                <td class="o-heading border-0">
                  Grand total
                </td>
                <td class="font-weight-bold text-right border-0">
                  @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="border-top p-3">
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
        <div>
        Signature
        </div>
      </div>
    </div>
  </div>

</div>
