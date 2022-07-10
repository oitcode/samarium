<div class="card">
  <div class="card-header bg-md-success text-md-white">
    <h1 class="" style="font-size: 1.5rem;">
      Payment
    </h1>
  </div>
  <div class="card-body p-0">
    @if (true || $modes['customer'])
      <div class="table-responsive mb-0">
        <table class="table mb-0">
          <tbody>
            <tr style="font-size: 1.3rem; height: 50px;">
              <td class="w-50 p-0 pt-2 bg-info-rm font-weight-bold" style="font-size: calc(1rem + 0.2vw);">
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
    @else
      <div class="p-3">
        <button class="btn btn-success mr-3" wire:click="enterMode('customer')">
          Customer
        </button>

        <button wire:loading class="btn">
          <span class="spinner-border text-info mr-3" role="status">
          </span>
        </button>
      </div>
    @endif

    <div class="table-responsive mb-0">
      <table class="table table-bordered-rm mb-0 bg-danger">
        <tbody>


          <tr style="height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 h-100 bg-info-rm font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
              <span class="ml-4">
                Total
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
            <tr style="height: 50px;" class="bg-light border-0">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
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
              <td class="p-0 h-100 font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
                @if (strtolower($key) == 'vat')
                  <span class="ml-3">
                    {{ $val }}
                  </span>
                @else
                  <input class="w-100 h-90 font-weight-bold pl-3 border-0"
                      type="text" wire:model.debounce.500ms="saleInvoiceAdditions.{{ $key }}"
                      wire:keydown.enter="updateNumbers" wire:change="updateNumbers" />
                @endif
              </td>
            </tr>
            @endif
          @endforeach

          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 bg-info-rm font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
              <span class="ml-4 d-inline-block">
                Taxable amount
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm text-primary font-weight-bold pl-3 pt-2 border-0" style="font-size: calc(1rem + 0.2vw);">
              @php echo number_format( $this->taxable_amount ); @endphp
            </td>
          </tr>

          {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
          @foreach ($saleInvoiceAdditions as $key => $val)

            {{-- Todo: Wont there be any other taxes other than vat? --}}
            @if (strtolower($key) != 'vat')
              @continue
            @else
            <tr style="height: 50px;" class="bg-light border-0">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
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
              <td class="p-2 h-100 font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
                @php echo number_format( $val ); @endphp
              </td>
            </tr>
            @endif
          @endforeach

          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 bg-info-rm font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
              <span class="ml-4 d-inline-block">
                Grand total
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm text-primary font-weight-bold pl-3 pt-2 border-0" style="font-size: 2.5rem;">
              @php echo number_format( $this->grand_total ); @endphp
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="p-3">
      @if ($modes['multiplePayments'])
        <button class="btn btn-success-rm mr-3 border-secondary" wire:click="exitMultiplePaymentsMode">
          Single payment
        </button>
      @else
        <button class="btn btn-success-rm mr-3 border-secondary" wire:click="enterMultiplePaymentsMode">
          Multiple payments
        </button>
      @endif
    </div>

    <div>
    @if (! $modes['multiplePayments'])
    <div class="table-responsive mb-0" wire:key=" boomboom ">
      <table class="table table-bordered mb-0">
        <tbody>

          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light-rm border-0">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
              <span class="ml-4 d-inline-block">
                Tender Amount
              </span>
              @error('tender_amount')
              <div>
                <span class="text-danger">{{ $message }}</span>
              </div>
              @enderror
            </td>
            <td class="p-0 h-100 font-weight-bold border-0">
              <input class="w-100 h-100 font-weight-bold border-0"
                  type="text"
                  style="font-size: 2.5rem; background-color: #afa; outline: none;"
                  wire:model.defer="tender_amount" />
            </td>
          </tr>

          <tr style="height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 bg-info-rm font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
              <span class="ml-4">
                Payment type
              </span>
            </td>
            <td class="p-0 h-100 w-50 font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
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
            <tr style="font-size: 1.3rem; height: 50px;" wire:key="{{ $key }}">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold" style="font-size: calc(1rem + 0.2vw);">
                <span class="ml-4">
                  {{ $key }}
                </span>
              </td>
              <td class="p-0 h-100 w-50 bg-warning font-weight-bold" style="font-size: calc(1rem + 0.2vw);">
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
          <tr class="border-0" style="font-size: 1.3rem; height: 50px;" wire:key="{{ $key }}">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
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
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(1rem + 0.2vw);">
              <span class="ml-4">
                Return
              </span>
            </td>
            <td class="text-danger border-0" style="font-size: 2.5rem;">
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

    <div class="p-3 m-0">
      @if (! $modes['paid'])
      <button
          onclick="this.disabled=true;"
          class="btn btn btn-success mr-3"
          wire:click="store"
          style="font-size: 1.1rem;">
        Confirm
      </button>

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
      @else
        <button
            onclick="this.disabled=true;"
            class="btn btn-lg btn-success mr-3"
            wire:click="finishPayment"
            style="width: 120px; height: 70px; font-size: 1.3rem;">
          Finish
        </button>
        <button
            onclick="this.disabled=true;"
            class="btn btn-lg btn-warning-rm mr-3"
            wire:click="finishPayment"
            style="width: 120px; height: 70px; font-size: 1.3rem; background-color: orange">
          Print
        </button>
      @endif
    </div>
  </div>
</div>
