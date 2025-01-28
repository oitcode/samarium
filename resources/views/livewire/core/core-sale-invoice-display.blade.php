<div class="bg-white">


  {{--
  |
  | Toolbar.
  |
  --}}

  @if ($display_toolbar == true)
    <x-toolbar-component>
      <x-slot name="toolbarInfo">
        Sale invoice
        <i class="fas fa-angle-right mx-2"></i>
        {{ $saleInvoice->sale_invoice_id }}
      </x-slot>
      <x-slot name="toolbarButtons">
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-refresh"></i>
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-print mr-1"></i>
          Print
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-file-pdf-o mr-1"></i>
          PDF
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-file-excel-o mr-1"></i>
          Excel
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('{{ $exitDispatchEvent }}')">
          Close
        </x-toolbar-button-component>
      </x-slot>
    </x-toolbar-component>
  @endif

  <div class="p-0 m-0">
    <div class="p-0">
      <div class="px-2">
        <div>
          {{-- Company Info --}}
          <div class="d-flex justify-content-center py-3">
            <div>
              <div class="d-flex">
                <div class="d-flex flex-column justify-content-center mr-5">
                  <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="height: 75px;" class="mr-2">
                </div>
                <div>
                  <div>
                    <h2 class="h4 o-heading mt-2 mb-1">
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
                        <td class="o-heading border-0 px-0">
                          PAN No
                        </td>
                        <td class="border-0">
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
              <div class="mb-2 o-heading">
                To
              </div>

              <div>
                <h2 class="h6 mt-2 mb-0">
                  @if ($saleInvoice->customer)
                    {{ $saleInvoice->customer->name }}
                  @else
                    ---
                  @endif
                </h2>
              </div>

              <div class="table-responsive">
                <table class="table table-sm mb-0">
                  <tr>
                    <td class="border-0 px-0 p-0">
                      @if ($saleInvoice->customer)
                        @if ($saleInvoice->customer->address)
                          {{ $saleInvoice->customer->address }}
                        @else
                        @endif
                      @else
                        <span class="text-muted">
                        </span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td class="border-0 px-0 p-0 py-3">
                      <span class="o-heading">
                      PAN No:
                      </span>
                      @if ($saleInvoice->customer)
                        @if ($saleInvoice->customer->pan_num)
                          {{ $saleInvoice->customer->pan_num }}
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
                <div class="o-heading">
                  Invoice no:
                </div>
                <div>
                  {{ $saleInvoice->sale_invoice_id }}
                </div>
              </div>
              <div>
                <div class="o-heading">
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

      <div class="px-2">

        {{--
        |
        | Items List.
        |
        --}}

        {{-- Show in bigger screens --}}
        <div class="table-responsive mb-0 d-none d-md-block">
          <table class="table table-sm table-hover border-dark shadow-sm mb-0">
            <thead>
              <tr>
                <th class="py-2 pl-2 o-heading" style="border: 1px solid black;">SN</th>
                <th class="py-2 pl-2 o-heading" style="border: 1px solid black;">Item</th>
                <th class="py-2 o-heading" style="border: 1px solid black;">Qty</th>
                <th class="py-2 o-heading" style="border: 1px solid black;">Rate</th>
                <th class="py-2 o-heading" style="border: 1px solid black;">Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($saleInvoice->saleInvoiceItems as $item)
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
            <tfoot>
              <tr>
               <td class="border-0"></td>
               <td class="border-0"></td>
               <td class="border-0"></td>
               <td style="border: 1px solid black;" class="o-heading text-right pr-3">
                Subtotal
                </td>
                <td style="border: 1px solid black;" class="o-heading">
                  @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                </td>
              </tr>
              {{-- TODO --}} 
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
              <tr class="border-0 p-0">
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td style="border: 1px solid black;" class="o-heading text-right pr-3">
                  Total
                </td>
                <td style="border: 1px solid black;" class="o-heading">
                  @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                </td>
              </tr>
            </tfoot>
          </table>
        </div>

        {{-- Show in smaller screens --}}
        <div class="table-responsive mb-0 d-md-none d-print-none mt-3">
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
                <td class="font-weight-bold">
                  <strong>
                  Total
                  </strong>
                </td>
                <td class="font-weight-bold text-right">
                  @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                </td>
              </tr>
              {{-- TODO --}}
              <tr class="border-0">
                <td class="font-weight-bold border-0">
                  <strong>
                  Grand total
                  </strong>
                </td>
                <td class="font-weight-bold text-right border-0">
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

  <div class="p-3">
    <div class="d-flex justify-content-between">
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
