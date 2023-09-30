<div class="bg-warning-rm">
  <div class="mb-0 p-0">
    @if ($display_toolbar)
      {{-- Tool bar --}}

      @if (true)
      <x-toolbar-classic toolbarTitle="Sale invoice">

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
  
    <div class="border p-0">
  
      {{-- Company Info --}}
      <div class="d-flex justify-content-between pb-3-rm border-bottom mb-3-rm p-2 d-print-none" style="background-color: #fff;">
        <div class="">
          @if (false)
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="width: 50px; height: 50px;">
          @endif
          <h1 class="my-3 mb-5 h4 text-muted font-weight-bold">
            SALE INVOICE
          </h1>
          <h1 class="h4 font-weight-bold mt-2 mb-3" style="">
            {{ $company->name }}
          </h1>
          @if (false)
          <h2 class="h6 mt-3 mb-1 text-muted-rm font-weight-bold" style="">
            @if ($has_vat)
              VAT No:
            @else
              PAN No:
            @endif
            {{ $company->pan_number }}
          </h2>
          <h2 class="h6 mb-0 d-inline mr-1" style="">
            {{ $company->address }}
          </h2>
          @endif
          @if (false)
          <span class="mr-1">
            |
          </span>
          <h3 class="h6 mb-0 d-inline" style="">
            {{ $company->phone }}
          </h3>
          @endif
          <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered-rm">
              <tr>
                <td>
                  PAN No
                </td>
                <td>
                  {{ $company->pan_number }}
                </td>
              </tr>
              <tr>
                <td>
                  Address
                </td>
                <td>
                  {{ $company->address }}
                </td>
              </tr>
              <tr>
                <td>
                  Bill no:
                </td>
                <td>
                  {{ $saleInvoice->sale_invoice_id }}
                </td>
              </tr>
              <tr>
                <td>
                  Date:
                </td>
                <td>
                  {{ $saleInvoice->sale_invoice_date }}
                </td>
              </tr>
            </table>
          </div>
        </div>
  
        <div class="">
          <div class="h-100 d-flex flex-column justify-content-center">
            <div class="bg-danger-rm border-rm mt-2">
              <div class="mt-4-rm mb-1 p-2 bg-primary-rm text-white-rm text-center" style="{{-- background-color: orange; --}}">
                <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="width: 100px; height: 100px;">
              </div>
              <div class="mb-1">
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
        </div>
  
        <div class="">
          <div class="">
            <div class="border-rm mt-2">
              <div class="my-3 border-top border-bottom" style="background-color: gray;">
                SALE INVOICE
              </div>
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
      <div class="shadow-rm bg-warning-rm">
        <div class="card mb-0 shadow-sm border-0">
          <div class="card-body px-2 bg-dark-rm p-0">
  
  
            <div class="row-rm bg-warning-rm" style="{{-- margin: auto; background-color: #efe; --}}">
  
              <div class="col-md-3-rm mb-3-rm border-bottom-rm py-3">
                <div class="h5 text-muted-rm mb-2">
                  Customer
                </div>
  
                @if ($saleInvoice->customer)
                <div class="col-md-3 p-0">
                  <table class="table table-sm table-striped table-bordered-rm mb-0">
                    <tr class="border-0 m-0 p-0">
                      <td class="w-25-rm pl-0-rm border-0-rm m-0 p-0-rm" style="">
                        Name
                      </td>
                      <td class="border-0-rm m-0 p-0-rm">
                        @if ($saleInvoice->customer)
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
                      <td class="pl-0-rm border-0-rm m-0 p-0-rm" style="">
                        PAN No
                      </td>
                      <td class="border-0-rm m-0 p-0-rm">
                        @if ($saleInvoice->customer->pan_num)
                          {{ $saleInvoice->customer->pan_num }}
                        @else
                          <span class="text-muted" style="">
                            No info
                          </span>
                        @endif
                      </td>
                    </tr>
                  </table>
                </div>
                @else
                  <div class="text-muted" style="">
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
          <table class="table table-sm table-borderd table-hover border-dark shadow-sm mb-0">
            <thead>
              <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
                <th class="h5 py-2 pl-2 bg-success text-white">Item</th>
                <th class="h5 py-2 bg-info text-white">Price</th>
                <th class="h5 py-2 bg-info text-white">Quantity</th>
                <th class="h5 py-2 bg-info text-white">Amount</th>
              </tr>
            </thead>
  
            <tbody style="">
              @foreach ($saleInvoice->saleInvoiceItems as $item)
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
                  @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                </td>
              </tr>
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
  
              <tr class="border-0 bg-danger-rm p-0">
                <td colspan="3" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right border-0 pr-3">
                  Total
                </td>
                <td style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold border-0">
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
  
            <tbody style="">
              @foreach ($saleInvoice->saleInvoiceItems as $item)
              <tr style="" class="font-weight-bold text-white-rm">
                <td>
                  <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                </td>
                <td>
                  {{ $item->product->name }}
                  <br />
                  <span class="text-primary mr-3">
                    Rs @php echo number_format( $item->price_per_unit); @endphp
                  </span>
                  <span class="text-secondary" style="">
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
          <table class="table table-sm">
  
            <tfoot class="bg-success-rm text-white-rm" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
              <tr>
                <td style="" class="font-weight-bold text-right">
                  <strong>
                  Total
                  </strong>
                </td>
                <td style="" class="font-weight-bold">
                  @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                </td>
              </tr>
              @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
                <tr class="border-0">
                  <td style=""
                      class="
                        font-weight-bold text-right border-0
                      ">
                    {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                  </td>
                  <td style=""
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
                <td  style="" class="font-weight-bold text-right border-0">
                  <strong>
                  Grand total
                  </strong>
                </td>
                <td style="" class="font-weight-bold border-0">
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
