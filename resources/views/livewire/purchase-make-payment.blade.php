<div class="card">
  <div class="card-header bg-success-rm text-white-rm">
    <h1 class="h4">
      Payment
    </h1>
  </div>
  <div class="card-body p-0">

    <div class="table-responsive mb-0">
      <table class="table table-bordered-rm mb-0 bg-danger">
        <tbody>

          <tr style="height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 pt-2 h-100 bg-info-rm font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Total
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm font-weight-bold pl-4 pt-2 border-0" style="font-size: calc(0.8rem + 0.2vw);">
              @php echo number_format( $this->sub_total ); @endphp
            </td>
          </tr>

          {{-- Todo: Only vat? Any other taxes? --}}
          @if ($has_vat)
          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 bg-info-rm font-weight-bold border-0" style="font-size: calc(0.6rem + 0.2vw);">
              <span class="ml-4 d-inline-block">
                Taxable amount
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm text-primary font-weight-bold pl-3 pt-2 border-0" style="font-size: calc(0.6rem + 0.2vw);">
              @php echo number_format( $this->taxable_amount ); @endphp
            </td>
          </tr>
          @endif

          {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
          @foreach ($purchaseAdditions as $key => $val)

            {{-- Todo: Wont there be any other taxes other than vat? --}}
            @if (strtolower($key) != 'vat')
              @continue
            @else
            <tr style="height: 50px;" class="bg-light border-0">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(0.6rem + 0.2vw);">
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
                <input class="w-100 h-100 font-weight-bold border-0 pl-4"
                    type="text"
                    style="font-size: calc(1.2rem + 0.2vw); background-color: #afa; outline: none;"
                    wire:keydown.enter="updateNumbers"
                    wire:model.debounce.500ms="purchaseAdditions.{{ $key }}" />
              </td>
            </tr>
            @endif
          @endforeach

          @if ($has_vat)
          <tr style="height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 pt-2 h-100 bg-info-rm font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Total
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm font-weight-bold pl-4 pt-2 border-0" style="font-size: calc(0.8rem + 0.2vw);">
              @php echo number_format( $this->grand_total ); @endphp
            </td>
          </tr>
          @endif

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

          <tr style="height: 50px;" class="bg-light-rm border-0">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Paid Amount
              </span>
              @error('paid_amount')
              <div>
                <span class="text-danger">{{ $message }}</span>
              </div>
              @enderror
            </td>
            <td class="p-0 h-100 font-weight-bold border-0">
              <input class="w-100 h-100 font-weight-bold border-0"
                  type="text"
                  style="font-size: 2.5rem; background-color: #afa; outline: none;"
                  wire:model.defer="paid_amount" />
            </td>
          </tr>

          <tr style="height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 bg-info-rm font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Payment type
              </span>
            </td>
            <td class="p-0 h-100 w-50 font-weight-bold border-0">
              <select class="w-100 h-100 custom-control border-0"
                  style="outline: none;"
                  wire:model.defer="purchase_payment_type_id">
                <option>---</option>

                @foreach ($purchasePaymentTypes as $purchasePaymentType)
                  <option value="{{ $purchasePaymentType->purchase_payment_type_id }}"
                      wire:key="{{ $purchasePaymentType->purchase_payment_type_id }}">
                    {{ $purchasePaymentType->name }}
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
            <tr style="font-size: 1.3rem; height: 50px;" wire:key="inzaghi">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
                <span class="ml-4">
                  {{ $key }}
                </span>
              </td>
              <td class="p-0 h-100 w-50 bg-warning font-weight-bold">
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
          <tr class="border-0" style="font-size: 1.3rem; height: 50px;" wire:key="ronaldinho">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold border-0">
              <span class="ml-4">
                Paid amount
              </span>
            </td>
            <td class="border-0" style="font-size: 2.5rem;">
              {{ $paid_amount }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    @endif
    </div>

    <div class="p-3 m-0">
      @if (! $modes['paid'])
      <button
          onclick="this.disabled=true;"
          class="btn btn-lg btn-success mr-3"
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
          FINISH
        </button>
        <button
            onclick="this.disabled=true;"
            class="btn btn-lg btn-warning-rm mr-3"
            wire:click="finishPayment"
            style="width: 120px; height: 70px; font-size: 1.3rem; background-color: orange">
          PRINT
        </button>
      @endif
    </div>
  </div>
</div>
