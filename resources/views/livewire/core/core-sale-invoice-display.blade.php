<div class="bg-white">


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
                    <table class="table table-sm table-striped-rm table-bordered-rm mb-0">
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
            <div>
              <div class="mb-2 font-weight-bold text-secondary-rm">
                To
              </div>

              <div class="mb-3-rm">
                <h2 class="h5 font-weight-bold mt-2 mb-0">
                  @if ($saleInvoice->customer)
                    {{ $saleInvoice->customer->name }}
                  @else
                  @endif
                </h2>
              </div>

              <div class="table-responsive">
                <table class="table table-sm table-striped-rm table-bordered-rm mb-0">
                  <tr>
                    <td class="border-0 px-0 p-0">
                      @if ($saleInvoice->customer)
                        @if ($saleInvoice->customer->address)
                          {{ $saleInvoice->customer->address }}
                        @else
                        @endif
                      @else
                        <span class="text-muted" style="">
                        </span>
                      @endif
                    </td>
                  </tr>
                  <tr class="">
                    <td class="border-0 px-0 p-0">
                      PAN No:
                      @if ($saleInvoice->customer)
                        @if ($saleInvoice->customer->pan_num)
                          {{ $saleInvoice->customer->pan_num }}
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

              <div class="mb-1">
                <div class="font-weight-bold">
                  Invoice no:
                </div>
                <div>
                  {{ $saleInvoice->sale_invoice_id }}
                </div>
              </div>
              <div>
                <div class="font-weight-bold">
                  Date:
                </div>
                <div>
                  {{ $saleInvoice->sale_invoice_date }}
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
              @foreach ($saleInvoice->saleInvoiceItems as $item)
              <tr style="" class="font-weight-bold-rm">
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
            </tbody>
  
            <tfoot class="">
              <tr class="bg-primary-rm">
               <td class="border-0"></td>
               <td class="border-0"></td>
               <td class="border-0"></td>
               <td style="border: 1px solid black;" class="font-weight-bold text-right pr-3">
                  <strong>
                  Subtotal
                  </strong>
                </td>
                <td style="border: 1px solid black;" class="font-weight-bold py-3-rm">
                  @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                </td>
              </tr>

              {{-- TODO --}} 
              @if (true)
              @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
                <tr class="border-0 mb-0 p-0">
                  <td class="border-0"></td>
                  <td class="border-0"></td>
                  <td class="border-0"></td>
                  <td style="border: 1px solid black;"
                      class="font-weight-bold text-right pr-3">
                    {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                    @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                    (13%)
                    @endif
                  </td>
                  <td style="border: 1px solid black;"
                      class="
                        @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                          text-danger
                        @endif
                        font-weight-bold">
                    @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                  </td>
                </tr>
              @endforeach
              @endif
  
              <tr class="border-0 bg-danger-rm p-0">
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td style="border: 1px solid black; {{-- background-color: #ddd; --}}" class="font-weight-bold
                text-right border-0-rm pr-3 py-3-rm
                bg-success-rm text-white-rm">
                  Total
                </td>
                <td style="border: 1px solid black; {{-- background-color: #ddd; --}}" class="font-weight-bold border-0-rm
                bg-success-rm text-white-rm py-3-rm">
                  @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
  
          </table>
        </div>

        {{-- Show in smaller screens --}}
        <div class="table-responsive bg-white-rm mb-0 d-md-none d-print-none mt-3">
          <table class="table table-bordered-rm table-hover border-dark shadow-sm mb-0">
  
            <tbody style="">
              @foreach ($saleInvoice->saleInvoiceItems as $item)
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
                  @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                </td>
              </tr>

              {{-- TODO --}}
              <tr class="border-0">
                <td  style="" class="font-weight-bold text-right-rm border-0">
                  <strong>
                  Grand total
                  </strong>
                </td>
                <td style="" class="font-weight-bold text-right border-0">
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

  <div class="bg-white-rm border-top-rm p-3 col-md-8-rm my-5-rm">
    <div class="d-flex justify-content-between">
      <div>
        <div class="p-5"style="border-bottom: 1px solid black;">
        </div>
        <div style="">
        Signature
        </div>
      </div>
    </div>
  </div>


</div>
