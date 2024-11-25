<div class="card bg-transparent border-0">
  <div class="card-header
      {{ config('app.oc_ascent_bg_color', 'bg-light') }}
      {{ config('app.oc_ascent_text_color', 'text-dark') }}
      p-0">
    <div class="d-flex justify-content-between py-1-rm my-2">
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
        @if (false && $modes['multiplePayments'])
          <button class="btn btn-sm mr-3 border-secondary" wire:click="exitMultiplePaymentsMode">
            Single payment
          </button>
        @else
          <button class="btn btn-sm mr-3
              {{ config('app.oc_ascent_text_color', 'text-white') }}"
              wire:click="enterMultiplePaymentsMode" style="font-size: calc(1rem + 0.2vw);">
            <i class="fas fa-ellipsis-h"></i>
          </button>
        @endif
      </div>
      @endif
    </div>
  </div>
  <div class="card-body p-0 border-0">

    <div class="table-responsive mb-0">
      <table class="table table-bordered-rm mb-0">
        <tbody>

          <tr style="height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 h-100 bg-info-rm font-weight-bold border-0 pt-2" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Subtotal
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm font-weight-bold pl-3 pt-2 border-0" style="font-size: calc(1rem + 0.2vw);">
              @php echo number_format( $this->sub_total, 2 ); @endphp
            </td>
          </tr>

          {{-- Todo: Only vat? Any other taxes? --}}
          @if ($has_vat)
          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 h-100 bg-info-rm font-weight-bold border-0 pt-2" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Taxable amount
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm font-weight-bold pl-3 pt-2 border-0" style="font-size: calc(1rem + 0.2vw);">
              @php echo number_format( $this->taxable_amount, 2 ); @endphp
            </td>
          </tr>
          @endif

          {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
          @foreach ($purchaseAdditions as $key => $val)

            {{-- Todo: Wont there be any other taxes other than vat? --}}
            @if (strtolower($key) != 'vat')
              @continue
            @else
            <tr style="height: 50px;" class="bg-info-rm border-bottom p-0">
              <td class="w-50 h-100 p-0 font-weight-bold border-0 bg-success-rm" style="font-size: calc(0.6rem + 0.2vw);">
                <div class="h-100 d-flex flex-column justify-content-center">
                  @if (strtolower($key) == 'vat')
                    <div class="ml-4">
                      {{ $key }} (13 %)
                    </div>
                  @else
                    <span class="ml-4">
                      {{ $key }}
                    </span>
                  @endif
                </div>
              </td>
              <td class="p-0 w-50 h-100 bg-info font-weight-bold border-0" style="font-size: calc(0.6rem + 0.2vw);">
                <input class="w-100 h-100 font-weight-bold border-0 pl-3"
                    type="text"
                    style="font-size: calc(1rem + 0.2vw); outline: none;"
                    wire:keydown.enter="updateNumbers"
                    wire:model.live.debounce.500ms="purchaseAdditions.{{ $key }}" />
              </td>
            </tr>
            @endif
          @endforeach

          @if ($has_vat)
          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 pt-2 bg-info-rm font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4 d-inline-block">
                Total
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm text-primary font-weight-bold pl-3 border-0" style="font-size: calc(1.3rem + 0.2vw);">
              @php echo number_format( $this->grand_total, 2 ); @endphp
            </td>
          </tr>
          @endif

        </tbody>
      </table>
    </div>

    <div>

    @if (! $modes['multiplePayments'])
    <div class="table-responsive mb-0" wire:key=" boomboom ">
      <table class="table table-bordered mb-0">
        <tbody>

          <tr style="height: 50px;" class="bg-light-rm border-bottom">
            <td class="w-50 p-0 pt-2 bg-white text-white-rm p-0 font-weight-bold border-0" style="font-size: calc(0.9rem + 0.2vw);">
              <span class="ml-4 d-inline-block mt-2 mb-3" style="font-size: 1rem;">
                @if (true)
                Paid Amount
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
                  wire:model="paid_amount" />
            </td>
          </tr>

          <tr style="height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 pt-2 bg-info-rm font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <span class="ml-4">
                Payment type
              </span>
            </td>
            <td class="p-0 h-100 w-50 font-weight-bold border-0" style="font-size: calc(0.8rem + 0.2vw);">
              <select class="w-100 h-100 custom-control border-0 bg-white"
                  style="outline: none;"
                  wire:model="purchase_payment_type_id">
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
                    wire:model.live="multiPayments.{{ $key }}"
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

    <div class="p-0 m-0 mt-2">
      @if (! $modes['paid'])
      <button
          onclick="this.disabled=true;"
          class="btn
              {{ config('app.oc_ascent_bg_color', 'bg-success') }}
              {{ config('app.oc_ascent_text_color', 'text-white') }}
          mr-3-rm w-100 py-3"
          wire:click="store"
          style="font-size: calc(1rem + 0.2vw);">
        <i class="fas fa-check-circle mr-3"></i>
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
