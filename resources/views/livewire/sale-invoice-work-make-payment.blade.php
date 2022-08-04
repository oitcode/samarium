<div class="card">
  <div class="card-header
      {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
      {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
      p-0">
    <div class="d-flex justify-content-between py-1-rm">
      <div class="d-flex flex-column justify-content-center">
        <h2 class="pl-3" style="font-size: calc(1.1rem + 0.2vw);">
          Payment
        </h1>
      </div>
      <div>
        <div wire:loading class="">
          <span class="spinner-border text-white" role="status" style="font-size: 0.8rem;">
          </span>
        </div>
      </div>
      @if (true)
      <div class="px-3 mb-2">
        @if ($modes['multiplePayments'])
          <button class="btn btn-sm mr-3 border-secondary" wire:click="exitMultiplePaymentsMode">
            Single payment
          </button>
        @else
          <button class="btn btn-sm mr-3
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}"
              wire:click="enterMultiplePaymentsMode" style="font-size: calc(1rem + 0.2vw);">
            <i class="fas fa-ellipsis-h"></i>
          </button>
        @endif
      </div>
      @endif
    </div>
  </div>
  <div class="card-body p-0">

    {{-- Customer --}}
    <div class="table-responsive mb-0">
      <table class="table mb-0">
        <tbody>
          <tr class="border-bottom" style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 pt-2 bg-info-rm font-weight-bold" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Customer
              </span>
            </td>
            <td class="p-0 h-100 w-50 font-weight-bold border-0">
              <select class="w-100 h-100 custom-control border-0" wire:model.defer="customer_id">
                <option>---</option>

                @foreach ($customers as $customer)
                  <option value="{{ $customer->customer_id }}">
                    {{ $customer->name }}
                  </option>
                @endforeach
              </select>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="table-responsive mb-0">
      <table class="table table-bordered-rm mb-0 bg-danger">
        <tbody>


          <tr style="height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 h-100 bg-info-rm font-weight-bold border-0 pt-2" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Subtotal
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm font-weight-bold pl-3 pt-2 border-0" style="font-size: calc(1rem + 0.2vw);">
              @php echo number_format( $this->total ); @endphp
            </td>
          </tr>

          {{-- Deal with non-taxes additions first --}}
          @foreach ($saleInvoiceAdditions as $key => $val)

          @if (strtolower($key) == 'vat')
            @continue
          @else
          <tr style="height: 40px;" class="bg-light border-0">
            <td class="w-50 p-0 bg-info-rm p-0 pt-2 font-weight-bold border-bottom" style="font-size: calc(0.6rem + 0.2vw);">
              {{-- Hard code for discount . Temp. Todo permanent design/fix --}} 
              @if (strtolower($key) == 'discount')
                <div class="ml-4">
                  {{ $key }}
                  <select
                      class="bg-white border border-secondary badge-pill"
                      wire:model="discount_percentage"
                      wire:change="calculateDiscount">
                    <option value="--">--</option>
                    <option value="5">5 %</option>
                    <option value="10">10 %</option>
                    <option value="15">15 %</option>
                    <option value="20">20 %</option>
                    <option value="25">25 %</option>
                    <option value="50">50 %</option>
                  </select>
                </div>
              @elseif (strtolower($key) == 'vat')
                <div class="ml-4">
                  {{ $key }} (13 %)
                </div>
              @else
                <span class="ml-4">
                  {{ $key }}
                </span>
              @endif
            </td>
            <td class="p-0 h-100 font-weight-bold border-bottom" style="font-size: calc(0.6rem + 0.2vw);">
              @if (strtolower($key) == 'vat')
                {{ $val }}
              @else
                <input class="w-100 h-100 font-weight-bold pl-3 border-0"
                    type="text" wire:model.debounce.500ms="saleInvoiceAdditions.{{ $key }}"
                    style="font-size: calc(0.6rem + 0.2vw);"
                    wire:keydown.enter="updateNumbers" wire:change="updateNumbers" />
              @endif
            </td>
          </tr>
          @endif
          @endforeach

          {{-- Todo: Only vat? Any other taxes? --}}
          @if ($has_vat)
          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 h-100 bg-info-rm font-weight-bold border-0 pt-2" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Taxable amount
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm font-weight-bold pl-3 pt-2 border-0" style="font-size: calc(1rem + 0.2vw);">
              @php echo number_format( $this->taxable_amount ); @endphp
            </td>
          </tr>
          @endif


          {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
          @foreach ($saleInvoiceAdditions as $key => $val)

            {{-- Todo: Wont there be any other taxes other than vat? --}}
            @if (strtolower($key) != 'vat')
              @continue
            @else
            <tr style="height: 50px;" class="bg-light border-bottom">
              <td class="w-50 p-0 h-100 bg-info-rm font-weight-bold border-0 pt-2" style="font-size: calc(0.8rem + 0.2vw);">
                @if (strtolower($key) == 'vat')
                  <div class="ml-4">
                    {{ $key }} (13 %)
                  </div>
                @else
                  <span class="ml-4">
                    {{ $key }}
                  </span>
                @endif
              </td>
              <td class="pl-3 h-100 font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
                @php echo number_format( $val ); @endphp
              </td>
            </tr>
            @endif
          @endforeach

          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 pt-2 bg-info-rm font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4 d-inline-block">
                Total
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm text-primary font-weight-bold pl-3 border-0" style="font-size: calc(1.3rem + 0.2vw);">
              @php echo number_format( $this->grand_total ); @endphp
            </td>
          </tr>
        </tbody>
      </table>
    </div>


    <div>
    @if (! $modes['multiplePayments'])
    <div class="table-responsive mb-0" wire:key=" boomboom ">
      <table class="table table-bordered mb-0">
        <tbody>

          <tr style="height: 50px;" class="bg-light-rm border-bottom">
            <td class="w-50 p-0 pt-2 bg-success-rm text-white-rm p-0 font-weight-bold border-0" style="font-size: calc(0.9rem + 0.2vw);">
              <span class="ml-4 d-inline-block mt-2 mb-3" style="font-size: 1rem;">
                @if (true)
                Tender Amount
                @endif
              </span>
              <i class="fas fa-arrow-alt-circle-right ml-2 fa-2x-rm"></i>
              @error('tender_amount')
              <div class="pl-3" style="font-size: 0.8rem;">
                <span class="text-danger">{{ $message }}</span>
              </div>
              @enderror
            </td>
            <td class="p-0 h-100 font-weight-bold border-0">
              <input class="w-100 h-100 font-weight-bold border-0 pl-3"
                  type="text"
                  style="font-size: calc(1.2rem + 0.2vw); background-color: #afa; outline: none;"
                  wire:model.defer="tender_amount" />
            </td>
          </tr>

          <tr style="height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 pt-2 bg-info-rm font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Payment type
              </span>
            </td>
            <td class="p-0 h-100 w-50 font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <select class="w-100 h-100 custom-control border-0"
                  style="outline: none;"
                  wire:model.defer="sale_invoice_payment_type_id">
                <option>---</option>

                @foreach ($saleInvoicePaymentTypes as $saleInvoicePaymentType)
                  <option value="{{ $saleInvoicePaymentType->sale_invoice_payment_type_id }}"
                      wire:key="{{ $saleInvoicePaymentType->sale_invoice_payment_type_id }}">
                    {{ $saleInvoicePaymentType->name }}
                  </option>
                @endforeach
              </select>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
    @else
    <div class="table-responsive mb-0" wire:key=" FOOBARAA ">
      <table class="table table-bordered mb-0">
        <tbody>
          @foreach ($multiPayments as $key => $val)
            <tr style="height: 50px;" wire:key="{{ $key }}">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold" style="font-size: calc(0.6rem + 0.2vw);">
                <span class="ml-4">
                  {{ $key }}
                </span>
              </td>
              <td class="p-0 h-100 w-50 bg-warning font-weight-bold" style="font-size: calc(0.6rem + 0.2vw);">
                <input type="text"
                    class="w-100 h-100 font-weight-bold" 
                    wire:model="multiPayments.{{ $key }}"
                    wire:keydown.enter="calculateTenderAmount"
                    wire:change="calculateTenderAmount"
                >
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="table-responsive mb-0" wire:key=" FCBAYERN ">
      <table class="table table-bordered mb-0">
        <tbody>
          <tr class="border-0" style="height: 50px;" wire:key="{{ $key }}">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(0.6rem + 0.2vw);">
              <span class="ml-4">
                Tender amount
              </span>
            </td>
            <td class="border-0" style="font-size: 2.5rem;">
              {{ $tender_amount }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    @endif
    </div>

    <div class="table-responsive mb-0" wire:key=" BIZCUP ">
      <table class="table table-bordered mb-0">
        <tbody>
          <tr class="border-0" style="height: 50px;" wire:key="abcdedfg">
            <td class="w-50 p-0 pt-2 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Return
              </span>
            </td>
            <td class="text-danger border-0" style="font-size: calc(1.2rem + 0.2vw);">
              @if ($modes['paid'])
                {{ $returnAmount }}
              @else
                &nbsp;
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="p-0 m-0">
      @if (! $modes['paid'])
      <button
          onclick="this.disabled=true;"
          class="btn
              {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              mr-3-rm w-100 py-3"
          wire:click="store"
          style="font-size: calc(1rem + 0.2vw);">
        <i class="fas fa-check-circle mr-3"></i>
        Confirm
      </button>
      @else
        <button
            onclick="this.disabled=true;"
            class="btn btn-lg btn-success"
            wire:click="finishPayment"
            style="font-size: 1.3rem;">
          FINISH
        </button>
        <button
            onclick="this.disabled=true;"
            class="btn btn-lg btn-warning-rm"
            wire:click="finishPayment"
            style="font-size: 1.3rem; background-color: orange">
          PRINT
        </button>
      @endif
    </div>
  </div>
</div>
